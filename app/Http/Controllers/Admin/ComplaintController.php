<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
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

}
