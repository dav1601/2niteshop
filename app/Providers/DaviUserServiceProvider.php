<?php 
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class DaviUserServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\UserInterface::class,
            \App\Repositories\DaviUser::class
        );
       
    }
}