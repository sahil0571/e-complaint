<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('pages.login');
    }

    public function registerPage()
    {
        $states = [];
        $cities = City::get();

        foreach ($cities as $city) {
            $states[] = $city->city_state;
        }

        $states = array_unique($states);

        return view('pages.register', compact('states', 'cities'));
    }

    public function register(UserRequest $request)
    {

        if ($request->photo) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            $image = $request->photo;
            $imagename = $image->hashName();
            $store = $image->storeAs('/profile/', $imagename);
            
            $user->photo = $imagename;
            
            $user->role_id = 2;

            $user->city_id = $request->city_id;
            $user->address = $request->address;
            $user->post_code = $request->post_code;
            $user->password = $request->password;
            $user->save();

            return redirect('/login')->with('success' , 'User Registered Successfully.');

        }
    }
}
