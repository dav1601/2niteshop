<?php 
namespace App\Providers;
use OrderMailer;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\MailOrderInterface::class,
            \App\Repositories\OrderMailer::class
        );
       
    }
}