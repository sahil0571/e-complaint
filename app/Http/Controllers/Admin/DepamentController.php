<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepamentController extends Controller
{
    public function listDepartments()
    {
        try {
            $depts = Department::get();

            if ($depts) {
                // return $depts;
                return view('pages.admin.department.allDepartments',['depts' => $depts]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createDepartment(DepartmentRequest $request)
    {
        try {
            // dd($request->deptName);
            $department = Department::where('name', $request->deptName)->first();
            if ($department) {
                return back()->with('failed', 'Department Already Exist');
            } else {
                $department = new Department();
                $department->name = $request->deptName;
                $department->s_name = $request->s_name;
                $department->description = $request->deptDesc;
                $department->status = (integer)$request->deptStatus;
                $department->save();

                return back()->with('success', 'Department Created Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateDepartment(DepartmentRequest $request)
    {
        try {
            $department = Department::where('id', $request->id)->first();
            if ($department) {
                $department->name = $request->name;
                $department->name = $request->deptName;
                $department->s_name = $request->s_name;
                $department->description = $request->deptDesc;
                $department->status = (integer)$request->deptStatus;
                $department->save();
                return back()->with('success', 'Department Update Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteDepartment($id){
        try {
            $dept = Department::find($id);
            if($dept){
                $dept->delete();
            }
            return back()->with('success' , 'Department deleted successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
