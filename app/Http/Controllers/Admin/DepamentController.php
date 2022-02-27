<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepamentController extends Controller
{
    public function index()
    {
        try {
            $depts = Department::get();

            if ($depts) {
                return $depts;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create(DepartmentRequest $request)
    {
        try {
            $department = Department::where('name', $request->name)->first();
            if ($department) {
                return back()->with('failed', 'Department Already Exist');
            } else {
                $department = new Department();
                $department->name = $request->name;
                $department->save();
                return back()->with('success', 'Department Created Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(DepartmentRequest $request)
    {
        try {
            $department = Department::where('id', $request->id)->first();
            if ($department) {
                $department->name = $request->name;
                $department->save();
                return back()->with('success', 'Department Update Successfully.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
