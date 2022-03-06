<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index(){
        
    }

    public function create(ComplaintRequest $request){
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
