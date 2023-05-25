<?php

namespace App\Jobs;

use App\Mail\OrdersMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendOrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $subject;
    public $options;
    public $ordered;
    public function __construct($subject = "",  $ordered, $options = [])
    {
        $this->subject = $subject;
        $this->ordered = $ordered;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new OrdersMail($this->subject,  $this->ordered, $this->options);
        Mail::to($this->ordered->email)->send($email);
    }
}
