<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class StatusChangeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $data;
    public $complaint;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$data,$complaint)
    {
        $this->email = $email;
        $this->data = $data;
        $this->complaint = $complaint;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::send('emails.statusChangemail', ['data' => $this->data , 'complaint' => $this->complaint], function ($message) {
            $message->to($this->email, 'User')->subject('E-Comlaint Recipt');
            $message->from('estatus100@gmail.com', 'E-Comlaint System');
        });
    }
}
