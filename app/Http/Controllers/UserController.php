<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
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
            // if(Auth::user()->role_id == 1){
            //     return redirect('/admin');
            // }else{
                return view('pages.home');
            // }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
