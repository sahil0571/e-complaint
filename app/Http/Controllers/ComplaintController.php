<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Jobs\MakeReciptJob;
use App\Mail\RecieptMail;
use App\Models\Complaint;
use App\Models\ComplaintType;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        try {

            $complaints = Complaint::with('department','type')->where('u_id',Auth::user()->id)->paginate(5);
            // return($complaints);
            return view('pages.user.listComplaints', ['complaints' => $complaints]);
        } catch (\Throwable $th) {
            throw $th;
        }
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
    
    public function printReciept($id)
    {
        try {

            $complaint = Complaint::with('department','type','user')->whereIn('status',[0,1,2,3])->where('invoice_number' , $id)->first();
            if($complaint){
                $dept = Department::find($complaint->user->dept_id);
                if($complaint->status == 5){
                    $complaint->status = 0;
                    $complaint->save();
                }
                return view('recipt.complaint', ['complaint' => $complaint, 'dept' => $dept]);
            }else{
                return redirect('/');
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function makeReciept($id)
    {
        try {

            $complaint = Complaint::with('department','type','user')->where('invoice_number' , $id)->first();
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
            $complaint->invoice_number = uniqid();



            if ($complaint->save()) {
                $email = Auth::user()->email;
                dispatch(new MakeReciptJob($email , $complaint));

                return back()->with('success', 'Complaint created succesfully. Please confirm your complaint via a link sent to your registred email address. You ca download reciept with the same link.');
            } else {
                return back()->with('failed', 'Something went wrong.');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    

    

    public function deleteComplaint($id){
        $complaint = Complaint::find($id);

        if($complaint){
            // $complaint->delete();
            return redirect()->back()->with('success' , 'Complaint deleted sucessfully.');
        }else{
            return redirect()->back()->with('failed' , 'Something went wrong.');
        }

    }

}
