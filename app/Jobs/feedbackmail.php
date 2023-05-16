<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
// use App\Mail\SendmailAuthor;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
class feedbackmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $emails;
    /**
     * Create a new job instance.
     */
    public function __construct($emails)
    {
        $this->emails = $emails;
        // dd($emails);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        Mail::to($this->emails)->send(new SendMail());

        // Mail::send('feedbackMail', ['data' => $this->emails], function ($message) {
        //     $message->to($this->emails['email'])->subject($this->emails['title']);
        // });
    }
}
