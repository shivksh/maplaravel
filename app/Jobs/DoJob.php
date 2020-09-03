<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $register;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($register)
    {
        $this->register = $register;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $detail['Email'] = $this->register->email;
            $detail['Name'] = $this->register->name; 
            $detail['subject'] = "Checking Mail";
            
            //This will send mail to the latest registered user
            Mail::send('mail.mail-page',$detail,function($message) use ($detail){
               $message ->to($detail['Email'],$detail['Name'] )
               ->subject($detail['subject']);
           });
    }
}
