<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(['middleware' => ['auth:api']]);
        Broadcast::routes();
        // Broadcast::routes(['middleware' => ['auth', 'web']]);
        require base_path('routes/channels.php');
    }
}
