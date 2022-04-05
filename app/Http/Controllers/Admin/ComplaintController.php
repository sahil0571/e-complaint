<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\MakeReciptJob;
use App\Jobs\StatusChangeEmail;
use App\Models\Complaint;
use App\Models\ComplaintType;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        try {

            $complaints = Complaint::with('department', 'type')->paginate(10);
            // return $complaints;
            return view('pages.admin.complaint.listComplaints', ['complaints' => $complaints]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    public function SolvedComplaints()
    {
        try {

            $complaints = Complaint::with('department', 'type')->where('status',2)->paginate(10);
            // return $complaints;
            return view('pages.admin.complaint.listSolvedComplaints', ['complaints' => $complaints]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteComplaint($id)
    {
        $complaint = Complaint::find($id);

        if ($complaint) {
            // $complaint->delete();
            return redirect()->back()->with('success', 'Complaint deleted sucessfully.');
        } else {
            return redirect()->back()->with('failed', 'Something went wrong.');
        }
    }

    public function changeStatus($id, $status)
    {
        try {

            $complaint = Complaint::find($id);
            if ($complaint) {
                $complaint->status = $status;
                $complaint->save();

                $complaint = Complaint::with('user')->find($id);
                // dd($complaint);
                $data = [];

                $data['title_sentece'] = 'Status of your complaint <span style="color: blue"> #' . $complaint->invoice_number . '</span> Has been changed.';

                if($status == 0){
                    $data['desc'] = "Dear,  " . $complaint->user->name . '. Complaint number <span style="color: blue"> #' . $complaint->invoice_number . '</span>\'s has been putted in pending complaint, Contact admin for more details. Please print recipt from the below button.';
                }else if($status == 1){
                    $data['desc'] = "Dear,  " . $complaint->user->name . '. Complaint number <span style="color: blue"> #' . $complaint->invoice_number . '</span>\'s is under review please wait until next action. Please print recipt from the below button.';
                }else if($status == 2){
                    $data['desc'] = "Dear,  " . $complaint->user->name . '. Complaint number <span style="color: blue"> #' . $complaint->invoice_number . '</span>\'s has been solved. Please print recipt from the below button.';
                }else{
                    $data['desc'] = "Dear,  " . $complaint->user->name . '. Complaint number <span style="color: blue"> #' . $complaint->invoice_number . '</span>\'s has been rejected, Contact admin for more details. Please print recipt from the below button.';
                }

                // return view('emails.statusChangemail', ['complaint' => $complaint, 'data' => $data]);

                dispatch(new StatusChangeEmail($complaint->user->email, $data , $complaint));

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
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

    public function complaintTypeDelete($id){
        $type = ComplaintType::findOrFail($id);
        $type->delete();

        return back()->with('success','Deleted Successfully !!');
    }
}
