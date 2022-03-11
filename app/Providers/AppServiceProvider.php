<?php

namespace App\Providers;

use App\Repositories\DaviUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Repositories\FileRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Repositories\CustomerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if ($this->app->isLocal()) {
        //     $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(DaviUser $daviUser, FileRepository $file)
    {
        Paginator::useTailwind();
        View::share('carbon', new Carbon());
        View::share('daviUser', $daviUser);
        View::share('file', $file);
        if (config('app.env') == "production") {
            \Debugbar::disable();
            URL::forceScheme('https');
        } else {
            \Debugbar::enable();
        }
    }
}
