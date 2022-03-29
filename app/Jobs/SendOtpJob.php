<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $otp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$otp)
    {
        $this->email = $email;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [
            'otp' => $this->otp,
        ];

        Mail::send('emails.otpMail', ['data' => $data], function ($message) {
            $message->to($this->email, 'John Doe')->subject('E-Comlaint Verification');
            $message->from('ecomplaint100@gmail.com', 'E-Comlaint System');
        });
    }
}
