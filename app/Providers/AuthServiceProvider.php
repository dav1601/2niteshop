<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonth(120));
        Passport::refreshTokensExpireIn(Carbon::now()->addMonth(121));
        Gate::define('admin-action' , function ($user){
           return $user->role_id == 1;
        });
        Gate::define('setting-profile' , function ($user , $id){
            return $user->id == $id;
        });
        Gate::define('edit-blog' , function ($user , $blog){
            return $user->id == $blog->user_id;
        });
        Gate::define('edit-page' , function ($user , $page){
            return $user->id == $page->users_id;
        });
        Gate::define('delete-page' , function ($user , $page){
            return $user->id == $page->users_id;
        });
        Gate::define('edit-product' , function ($user , $product){
            return $user->id == $product->author_id;
        });
        Gate::define('group-admin' , function ($user){
            if ($user-> role_id > 3 ) {
                return false;
            }
            return true;
         });
        Gate::define('group-4' , function ($user){
           if ($user-> role_id > 2 ) {
               return false;
           }
           return true;
        });
        Gate::define('check-api-token' , function ($user){
            if ($user -> token_api == NULL ) {
                return false;
            }
            return true;
         });
    }
}
