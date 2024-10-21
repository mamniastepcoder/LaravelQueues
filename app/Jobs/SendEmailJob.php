<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mail;
use App\Mail\Questestmail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $data;
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (Mail::to($this->data['email'])->send(new Questestmail($this->data))) {
            
        } else {
   
    Log::error('Email sending failed for: ' . $this->data['email'] . ' - Error: ' . $errorMessage);
}

    }
}
