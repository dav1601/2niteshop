<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $template;
    public $data;
    public function __construct($subject , $template , $data)
    {
        $this->subject = $subject;
        $this->template = $template;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->template)
                    ->from('vaone6v2@gmail.com' , '2NITE SHOP')
                    ->subject($this->subject)
                    ->with($this->data);
    }
}
