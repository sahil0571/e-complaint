<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintType;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        try {

            $complaints = Complaint::with('department','type')->paginate(10);
            return $complaints;
            return view('pages.admin.complaint.listComplaints', ['complaints' => $complaints]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function Complaints()
    {
        return "hello from Complaints";
    }


    public function SolvedComplaints()
    {
        return "hello from Solved Complaints";
    }

    // Complaint Types

    public function complaintTypes()
    {
        try {
            $types = ComplaintType::get();
            return view('pages.admin.complaint.types', ['types' => $types]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function complaintTypeAdd(Request $request)
    {
        try {

            $this->validate(
                $request,
                [
                    'type_name' => 'required|unique:complaint_types,name',
                ],
                [
                    'type_name.required' => 'Type Name is required.',
                    'type_name.unique' => 'Type Name already exist.',
                ]
            );

            $type = new ComplaintType();
            $type->name = $request->type_name;

            if ($type->save()) {
                return back()->with('success', 'Type Added Successfuly.');
            } else {
                return back()->with('failed', 'Something went wrong.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function complaintTypeUpdate(Request $request)
    {
        try {

            $this->validate(
                $request,
                [
                    'id' => 'required',
                    'type_name' => 'required|unique:complaint_types,name,' . $request->id . '',
                ],
                [
                    'type_name.required' => 'Type Name is required.',
                    'type_name.unique' => 'Type Name already exist.',
                ]
            );

            $type = ComplaintType::find($request->id);
            $type->name = $request->type_name;

            if ($type->save()) {
                return back()->with('success', 'Type number <h4 class="fw-bold text-success d-inline">' . $type->id . '</h4> Updated Successfuly.');
            } else {
                return back()->with('failed', 'Something went wrong.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
