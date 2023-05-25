<?php

namespace App\Repositories;

interface MailOrderInterface
{
    public function send_mail_order($ordered);
    public function send_code($to, $subject, $template, $data);
}
