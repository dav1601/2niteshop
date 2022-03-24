<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ClearDebugbar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debugbar:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Stroge Debugbar';

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
        if ($file->cleanDirectory('storage/debugbar'))
        return $this->info('Cleaned Stroge Debugbar');
        return $this->error('Cleaned Fail Stroge Debugbar');
    }
}
