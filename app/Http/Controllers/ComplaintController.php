<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Models\ComplaintType;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
    }


    public function makeComplaint()
    {
        try {

            $depts = Department::where('status', 1)->get();
            $types = ComplaintType::get();

            return view('pages.user.make-complaint', ['depts' => $depts, 'types' => $types]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function makeReciept($id)
    {
        try {

            $complaint = Complaint::with('department','type','user')->find($id);
            $dept = Department::find($complaint->user->dept_id);
            // dd($complaint);
            if($complaint){
                if($complaint->status == 5){
                    $complaint->status = 0;
                    $complaint->save();
                }
                return view('recipt.complaint', ['complaint' => $complaint, 'dept' => $dept]);
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addComplaint(ComplaintRequest $request)
    {
        try {

            $complaint = new Complaint();
            $complaint->title = $request->title;
            $complaint->desc = $request->desc;

            $photoes = [];
            if ($request->file('photoes')) {
                foreach ($request->file('photoes') as $imagefile) {
                    $imagename = $imagefile->hashName();
                    $uploadFile = $imagefile->storeAs('public/images/complaints', $imagename);
                    if ($uploadFile) {
                        $photoes[] = $imagename;
                    }
                }
            }

            $complaint->photoes = json_encode($photoes);
            $complaint->status = 5;
            $complaint->u_id = Auth::user()->id;
            $complaint->ct_id = $request->ct_id;
            $complaint->dept_id = $request->dept_id;



            if ($complaint->save()) {
                return back()->with('success', 'Complaint created succesfully. Please confirm your complaint via a link sent to your registred email address. You ca download reciept with the same link.');
            } else {
                return back()->with('failed', 'Something went wrong.');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(ComplaintRequest $request)
    {
        try {

            $complaint = new Complaint();
            $complaint->title = $request->title;
            $complaint->desc = $request->desc;
            $complaint->status = 0;
            $complaint->u_id = Auth::user()->id;
            $complaint->dept_id = $request->dept_id;
            $complaint->save();
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
