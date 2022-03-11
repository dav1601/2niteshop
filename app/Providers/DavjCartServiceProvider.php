<?php 
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class DavjCartServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\DavjCartInterface::class,
            \App\Repositories\DavjCart::class
        );
       
    }
}