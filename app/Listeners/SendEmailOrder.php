<?php

namespace App\Listeners;

use App\Events\Order;
use App\Repositories\MailOrderInterface;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmailOrder 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public $mailer;
    function __construct(MailOrderInterface $mailer)
    {
     $this->mailer = $mailer;
    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Order $event)
    {
        $this->mailer->send($event -> to , $event->subject , $event->template , $event->data);
    }
  
}
