<?php

namespace App\Repositories;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\MailOrderInterface;
use Carbon\Carbon;

class OrderMailer implements MailOrderInterface
{
    public function send($to, $subject, $template, $data)
    {
        $when = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(1);
        Mail::to($to)->later($when, new OrderMail($subject, $template, $data));
    }
    public function send_code($to, $subject, $template, $data)
    {
        Mail::to($to)->send(new OrderMail($subject, $template, $data));
    }
}
