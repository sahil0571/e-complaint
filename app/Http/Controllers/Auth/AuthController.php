<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Jobs\SendOtpJob;
use App\Mail\RegisterOtpMail;
use App\Models\Department;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{

    public function loginPage()
    {
        return view('pages.auth.login');
    }
    public function registerPage()
    {
        $dept = Department::all();

        return view('pages.auth.register', ['department' => $dept]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function create(UsersRequest $request)
    {
        try {

            $check = User::where('email', $request->email)->first();
            if ($check) {
                if ($check->verified == 1) {
                    return redirect('/login')->with('fail', 'Account already exist you can login here.');
                } else {

                    $check->name = $request->name;
                    $check->email = $request->email;
                    $image = $request->file('photo');
                    $imagename = $image->hashName();
                    $uploadFile = $image->storeAs('public/userImages', $imagename);
                    if ($uploadFile) {
                        $check->photo = $imagename;
                    }
                    $check->dept_id = $request->dept_id;
                    $check->enrollment_no = $request->dept_id;
                    $check->role_id = 2;
                    $check->verified = 0;
                    $check->status = 1;
                    $check->password = Hash::make($request->password);

                    if ($check->save()) {
                        $otpCheck = Otp::where('u_id', $check->id)->get('id');
                        if ($otpCheck) {
                            Otp::destroy($otpCheck);
                        }

                        $code = rand(111111, 999999);
                        $otp = new Otp();
                        $otp->otp_no = $code;
                        $otp->u_id = $check->id;
                        $otp->status = 1;

                        if ($otp->save()) {
                            // Email
                            dispatch(new SendOtpJob($check->email , $code));

                            // Redirect to verify
                            return redirect('/verify-otp/' . $check->id);
                        }
                    }
                }
            } else {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $image = $request->file('photo');
                $imagename = $image->hashName();
                $uploadFile = $image->storeAs('public/userImages', $imagename);
                if ($uploadFile) {
                    $user->photo = $imagename;
                }
                $user->dept_id = $request->dept_id;
                $user->enrollment_no = $request->enrollment_no;
                $user->role_id = 2;
                $user->verified = 0;
                $user->status = 1;
                $user->password = Hash::make($request->password);

                if ($user->save()) {
                    $code = rand(111111, 999999);
                    $otp = new Otp();
                    $otp->otp_no = $code;
                    $otp->u_id = $user->id;
                    $otp->status = 1;

                    if ($otp->save()) {
                        // Email
                        dispatch(new SendOtpJob($user->email , $code));

                        // Redirect to verify
                        return redirect('/verify-otp/' . $user->id);
                    }
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function login(UsersRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->where('verified' , 1)->first();
            if ($user) {
                $check = Hash::check($request->password, $user->password);
                if ($check) {
                    Auth::login($user);
                    if ($user->role_id == 1) {
                        return redirect('/admin');
                    } else {
                        return redirect('/');
                    }
                } else {
                    return back()->with('fail', 'Password is wrong');
                }
            } else {
                return back()->with('fail', 'User does not exist.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function verifyOtp($u_id)
    {
        try {
            $user = User::findOrFail($u_id);
            if ($user) {
                if ($user->verified == 0) {
                    $otp = Otp::where('u_id', $u_id)->first();
                    if ($otp) {
                        return view('pages.auth.verify', ['u_id' => $u_id]);
                    } else {
                        return redirect('/register')->with('fail', 'Something went wrong please register.');
                    }
                } else {
                    return redirect('/');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function verifyOtpPost($u_id, Request $request)
    {
        try {
            $user = User::findOrFail($u_id);

            if ($user) {
                $otp = Otp::where('u_id', $u_id)->where('otp_no', $request->otp)->where('status', 1)->first();
                if ($otp) {

                    $from_time = Carbon::parse($otp->created_at);
                    $diff = $from_time->diffInMinutes();

                    if ($diff > 10) {
                        $otp->status = 0;
                        $otp->save();
                        return redirect()->back()->with('fail', 'Otp expired please resend it.');
                    } else {
                        $otp->delete();
                        $user->verified = 1;
                        $user->save();
                        return redirect('/login')->with('success', 'User Verified successfully.');
                    }
                } else {
                    return redirect()->back()->with('fail', 'Otp doesnt exist please enter a valid otp');
                }
            } else {
                return redirect('/register')->with('fail', 'User does not exist.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function forgetPassword(Request $request){
        try {
        $user = User::where('email',$request->email)->first();
        if($user){
                $code = rand(111111, 999999);
                $otp = new Otp();
                $otp->otp_no = $code;
                $otp->u_id = $user->id;
                $otp->status = 1;

                if ($otp->save()) {
                    // Email
                    dispatch(new SendOtpJob($user->email , $code));

                    // Redirect to verify
                    return redirect('/forget-password-otp/' . $user->id);
                }
        }else{
            return back()->with('fail',"Student doesn't exists.");
        }
        }catch (\Throwable $th){
            throw $th;
        }
    }

    public function forgetPasswordOtp($u_id)    {
        try {
            $user = User::findOrFail($u_id);
            if ($user) {
                    $otp = Otp::where('u_id', $u_id)->orderBy('id','desc')->first();
                    if ($otp) {
                        return view('pages.auth.forgetPasswordVerify', ['u_id' => $u_id]);
                    } else {
                        return redirect('/login')->with('fail', 'Something went wrong please register.');
                    }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function forgetPasswordOtpPost($u_id, Request $request)
    {
        try {
            $user = User::findOrFail($u_id);

            if ($user) {
                $otp = Otp::where('u_id', $u_id)->where('otp_no', $request->otp)->where('status', 1)->first();
                if ($otp) {

                    $from_time = Carbon::parse($otp->created_at);
                    $diff = $from_time->diffInMinutes();

                    if ($diff > 10) {
                        $otp->status = 0;
                        $otp->save();
                        return redirect()->back()->with('fail', 'Otp expired please resend it.');
                    } else {
                        $otp->delete();
                        return view('pages.auth.reset-password',['id'=>$user->id])->with('success', 'User Verified successfully.');
                    }
                } else {
                    return redirect()->back()->with('fail', 'Otp doesnt exist please enter a valid otp');
                }
            } else {
                return redirect('/register')->with('fail', 'User does not exist.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function resetPassword(Request $req){
        $user  = User::findOrFail($req->id);
        if($req->password == $req->confirmPassword){
                $user->password = Hash::make($req->password);
                $user->save();
                return redirect('/login')->with('success','password reset successfully');
        }else{
            return view('pages.auth.reset-password',['id'=>$user->id])->with('fail','Make sure to the type the same password');
        }
    }
}
