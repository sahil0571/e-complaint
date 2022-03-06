<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPage(){
        // $users = User::where('role_id','2')->count();      // Count Users only
        $users = User::count();                            // Count All                 
        $departments = Department::count();
        // $complaints = Complaint::count();               //uncomment this after create complaint table
        return view('pages.admin.home',['totalDepartments'=>$departments,'totalUsers'=>$users]);
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
