<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Mail\RegisterOtpMail;
use App\Models\Department;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function create(Request $request)
    {
        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;

            // $image = $request->file('photo');
            // $imagename = $image->hashName();
            // $uploadFile = $image->storeAs('public/userImages', $imagename);
            // if($uploadFile){
            //     $user->photo = $imagename;
            // }
            $user->dept_id = $request->dept_id;
            $user->role_id = 2;
            $user->verified = 0;
            $user->status = 1;
            $user->password = Hash::make($request->password);

            // $user->save();

            $code = rand(111111, 999999);
            $otp = new Otp();
            $otp->otp_no = $code;
            $otp->u_id = $user->id;
            $otp->status = 0;
            // $otp->save();

            $data = [
                'otp' => $code,
            ];

            // Mail::to($request->email)->send(new RegisterOtpMail($data));

            Mail::send('emails.otpMail', ['data' => $data], function ($message) use ($request) {
                $message->to($request->email, 'John Doe')->subject('E-Comlaint Verification');
                $message->from('ecomplaint100@gmail.com', 'E-Comlaint System');
            });
            dd('mail sent at ' . $request->email);
            // Mail::send('emails.otpMail', ['data',$data], function ($message) use ($request) {
            //     $message->from('ecomplaint100@gmail.com', 'John Doe');
            //     $message->to($request->email, $request->name);
            //     $message->subject('E-Comlaint Verification');
            // });

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function login(UsersRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
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
}
