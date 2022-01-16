<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){

        $user = User::find(Auth::user()->id);
        // dd($user);
        $states = [];
        $cities = City::get();

        foreach ($cities as $city) {
            $states[] = $city->city_state;
        }

        $states = array_unique($states);

        return view('pages.home', compact('user','states', 'cities'));

    }

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


    public function login(UserRequest $request)
    {

        $user = User::where('email' ,$request->email)->first();
        if($user){

            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                return redirect('/');
            }else{
                return redirect()->back()->with('fail','Passwor wrong');
            }

        }else {
            return redirect()->back()->with('fail','User Does not exist');
        }
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
            $store = $image->storeAs('/public/profile/', $imagename);

            $user->photo = $imagename;

            $user->role_id = 2;

            $user->city_id = $request->city_id;
            $user->address = $request->address;
            $user->post_code = $request->post_code;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/login')->with('success', 'User Registered Successfully.');
        }
    }

    // Update User Api
    public function editUser(Request $request){
        // Code here
        
    }

    public function listUsers(Request $request){
        
        $users = User::with('cities')->with('roles')->get();

        return view('pages.users' , compact('users'));

    }

}
