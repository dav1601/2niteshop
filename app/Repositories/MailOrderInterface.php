<?php
namespace App\Repositories;
interface MailOrderInterface {
    public function send($to , $subject, $template, $data);
    public function send_code($to , $subject, $template, $data);
}
