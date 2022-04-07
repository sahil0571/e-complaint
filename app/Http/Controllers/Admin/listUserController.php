<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use App\Models\Department;
use App\Models\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class listUserController extends Controller
{
    public function listAdmin(){
        $admin = User::where('role_id','1')->get();

        return view('pages.admin.users.listAdmin',['admin'=>$admin]);
    }

    public function listUser(){
        try {
            $users = User::with('department')->get();
            return view('pages.admin.users.listUser',['users' => $users]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editUser($id){
        $editUser = User::findOrFail($id);

        $userDept = Department::findOrFail($editUser->dept_id);
        $depts = Department::all();

        return view('pages.admin.users.editUser',['editUser'=> $editUser,'department'=> $depts,'userDept'=> $userDept]);
    }

    public function updateUser(UsersRequest $request){
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dept_id = $request->dept_id;
        $user->enrollment_no = $request->enrollment_no;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->verified = $request->verified;
        $user->save();

        return redirect(route('admin.listUsers'))->with('success', 'User Updated Successfully.');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $otps  = Otp::where('u_id',($user->id));
        if(isset($otps)){
            $otps->delete();
        }
        $user->delete();

        return redirect(route('admin.listUsers'))->with('success', 'User Deleted Successfully.');

    }

    public function updateStatus($id){
        $user = User::findOrFail($id);
        $status = $user->status;
        if($status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        return back()->with('Status Updated successfully !!');
    }
}

