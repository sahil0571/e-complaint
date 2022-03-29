<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MakeReciptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $complaint;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$complaint)
    {
        $this->email = $email;
        $this->complaint = $complaint;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [
            'complaint' => $this->complaint,
        ];

        Mail::send('emails.recieptEmail', ['data' => $data], function ($message) {
            $message->to($this->email, 'User')->subject('E-Comlaint Recipt');
            $message->from('ecomplaint100@gmail.com', 'E-Comlaint System');
        });
    }
}
