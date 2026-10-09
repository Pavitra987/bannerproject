<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('dashboard',function($user){
            return $user->role=='admin'
            ||$user->role=='editor';
        });

         Gate::define('banner-create',function($user){
            return $user->role=='admin';
        });

         Gate::define('banner-edit',function($user){
            return $user->role=='admin'
            ||$user->role=='editor';
        });

         Gate::define('banner-delete',function($user){
            return $user->role=='admin';
        });
    }
}
