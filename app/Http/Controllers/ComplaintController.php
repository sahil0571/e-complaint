<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index(){
        
    }

    
    public function makeComplaint()
    {
        try {

            $depts = Department::where('status',1)->get();

            return view('pages.user.make-complaint' , ['depts' => $depts]);
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function addComplaint(ComplaintRequest $request){
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

    public function update(ComplaintRequest $request){
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

    public function Complaints(){
        return "hello from Complaints";
    }


    public function SolvedComplaints(){
        return "hello from Solved Complaints";
    }


}
