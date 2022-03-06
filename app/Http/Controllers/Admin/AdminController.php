<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPage(){
        return view('pages.admin.department.home');
    }
    
    public function makeDepartment(){
        return view('pages.admin.department.addDepartment');
    }

    public function editDepartment($id){

        $dept = Department::where('id',$id)->first();

        if($dept){
            return view('pages.admin.department.editDepartment',['dept' => $dept]);
        }
        
    }
}
