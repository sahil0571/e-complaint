<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities($stateName){
        $cities = City::where('city_state' , $stateName)->get();
        return $cities;
    }
}
