<?php

namespace App\Http\Controllers\Admin;

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
            $users = User::get();
            return view('pages.admin.users.listUser',['users' => $users]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
