<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        // Logged in as a user
        $this->app->singleton('user', function () {
            if ($user = optional(auth())->user())
                return $user;
            
            return null;
        });

        // Logged in as an admin
        $this->app->singleton('admin', function () {
            if ($admin = optional(auth("admin"))->user()) {

                return $admin;
            }

            return null;
        });


        // Basic monitoring for db queries to check the performance
        DB::listen(function ($query) {
            if ($query->time > 1000) {
                Log::warning("An Individual database Query exceeded 1 second. Sql: ".$query->sql);
            }
        });
    }
}
