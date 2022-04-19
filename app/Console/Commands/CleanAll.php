<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class CleanAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean History + Debubar';

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
        $file = new Filesystem;
        if ($file->cleanDirectory('storage/debugbar')){
         if ($file->cleanDirectory('.history'))
         return $this->info('Cleaned All');
         return $this->error('Cleaned Fail History');
        }
        return $this->error('Cleaned Fail');

    }
}
