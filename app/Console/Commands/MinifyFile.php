<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MatthiasMullie\Minify\JS;
use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\Minify;

class MinifyFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'davi:minify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Minify file JS + CSS ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file_js = [
            'app',
            'blog',
            'cart',
            'home',
            'product',
            'scrollReval',
            'slide',
            'user',
            'helper'
        ];
        $file_css = [
            '_component',
            '_footer',
            '_layout',
            '_naviteam',
            '_responsive',
            '_variables',
            'app'
        ];
        foreach ($file_js as $js) {
            $minifier = new JS();
            $minifier->add('public/client/app/js/' . $js . '.js');
            $minifier->minify('public/client/production/js/' . $js . '.js');
            unset($minifier);
        }
        foreach ($file_css as $css) {
            $minifier_css = new CSS();
            $minifier_css->add('public/client/app/css/' . $css . '.css');
            $minifier_css->minify('public/client/production/css/' . $css . '.css');
            unset($minifier_css);
        }
        return $this->info("Đã Minify Tất Cả File CSS và JS");
    }
}
