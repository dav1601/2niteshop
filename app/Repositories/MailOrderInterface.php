<?php 
namespace App\Repositories;
interface MailOrderInterface {
    public function send($to , $subject, $template, $data);
}