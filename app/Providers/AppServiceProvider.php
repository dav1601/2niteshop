<?php

namespace App\Providers;

use App\Repositories\DaviUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Repositories\FileRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Repositories\CustomerInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') == "local") {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->singleton(
            \App\Repositories\AdminPrdInterface::class,
            \App\Repositories\AdminPrdRepo::class
        );
        $this->app->singleton(
            \App\Repositories\ModelInterface::class,
            \App\Repositories\ModelRepo::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(DaviUser $daviUser, FileRepository $file)
    {
        Storage::extend('google', function ($app, $config) {
            $options = [];

            if (!empty($config['teamDriveId'] ?? null)) {
                $options['teamDriveId'] = $config['teamDriveId'];
            }

            $client = new \Google\Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);

            $service = new \Google\Service\Drive($client);
            $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, $config['folder'] ?? '/', $options);
            $driver = new \League\Flysystem\Filesystem($adapter);

            return new \Illuminate\Filesystem\FilesystemAdapter($driver, $adapter);
        });
        Paginator::useTailwind();
        View::share('carbon', new Carbon());
        View::share('daviUser', $daviUser);
        View::share('file', $file);
        if (env('FORCUS_HTTPS')) {
            URL::forceScheme('https');
        }
    }
}
