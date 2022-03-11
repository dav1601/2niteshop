<?php 
namespace App\Providers;
use App\Repositories\Customer;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\CustomerInterface::class,
            \App\Repositories\Customer::class
        );
       
    }
}