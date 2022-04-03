<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintType;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPage(){
        $users = User::where('role_id','2')->count();      // Count Users only
        $departments = Department::count();
        $complaints = Complaint::whereIn('status',[0,1,2,3])->count();    //uncomment this after create complaint table
        $solvedComplaints = Complaint::whereIn('status',[2,3])->count();    //uncomment this after create complaint table

        $depts = Department::WithCount('complaint')->latest('complaint_count')->take(5)->get();
        $ctypes = ComplaintType::WithCount('complaint')->latest('complaint_count')->take(5)->get();

        // return($depts);

        $data = [
            'usersCount' => $users,
            'departmentsCount' => $departments,
            'complaintsCount' => $complaints,
            'solvedComplaints' => $solvedComplaints,
            'completedComplaints' => number_format((float)(($solvedComplaints/$complaints) * 100), 2, '.', ''),
            'topDepts' => $depts,
            'topTypes' => $ctypes
        ];

        return view('pages.admin.home',['data'=>$data]);
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
