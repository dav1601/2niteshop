<?php

namespace App\Repositories;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\MailOrderInterface;

class OrderMailer implements MailOrderInterface
{
	public function send($to, $subject, $template, $data)
	{
		$when = now()->addMinutes(1);
		Mail::to($to)->later($when, new OrderMail($subject, $template, $data));
	}
}
