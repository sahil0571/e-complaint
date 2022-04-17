<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Department;
use App\Models\Feed;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {

            $feed = Feed::where('dept_id',1)->orderBy('id','desc')->take(2)->get();
            return view('pages.user.home',['feeds'=>$feed]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function profile(){
       $user = User::find(Auth::user()->id);
       $userDept = Department::find($user->dept_id);
       $department = Department::all();

       return view('pages.user.editUser',['editUser'=>$user,'userDept'=>$userDept,'department'=>$department]);
    }

    public function update(UsersRequest $request){
        $user = User::find(Auth::user()->id);
        $input = $request->all();
        if($request->password){
            if(Hash::check($request->currentPassword,$user->password)){
                $user->password = Hash::make($request->password);
            }else{
                return back()->with('failed',"Please enter valid Current Password !!");
            }
        }
        $user->name = $request->name;
        if($user->email == $request->email){
            $user->status = 1 ;
        }else{
            $user->status = 0 ;
        }
        $user->email = $request->email;
        if($request->file('photo')){
            $image = $request->file('photo');
            $imagename = $image->hashName();
            $uploadFile = $image->storeAs('public/userImages', $imagename);
            if ($uploadFile) {
                $user->photo = $imagename;
            }
        }

        $user->dept_id = $request->dept_id;
        $user->save();

        return redirect(route('user.profile'))->with('success','Profile Updated Successfully !!' );

    }
}
