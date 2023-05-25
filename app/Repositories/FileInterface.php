<?php

namespace App\Repositories;

interface FileInterface
{
    public function import_css($file);
    public function import_js($file);
    public function ver($file = "");
    public function ver_img($file = "");
    public function ver_img_local($file = "");
    public function main_banner();
    public function storeFileImg($file, $path);
    public function deleteFile($path);
    public function noImage();
}
