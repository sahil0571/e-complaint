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
            if (Auth::check()) {
                // if (Auth::user()->role_id == 1) {
                //     return redirect('/admin');
                // } else {
                    // dd('dsksnd');
                    return view('pages.home');
                // }
            }else{
                return redirect('/login');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
