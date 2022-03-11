<?php
namespace App\Repositories;
interface FileInterface {
    public function import_css($file="" , $forder="app/");
    public function import_js($file="" , $forder="app/");
    public function ver($file="");
    public function ver_img($file="");
    public function main_banner();
}
