<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        Gate::define('create-post',function (User $user){
           return $user->type == "writer";
        });
        Gate::define('admin-control',function (User $user){
            return $user->type == "admin";
        });
        Gate::define('update-post',function (User $user ,Post $post){
            return $user->id == $post->user_id ;
        });



    }


    public function boot(): void
    {
            Paginator::useBootstrapFive();
            $setting = Setting::first();
             View::share('setting', $setting);
    }
}
