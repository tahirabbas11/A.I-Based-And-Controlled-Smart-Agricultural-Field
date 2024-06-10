<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view) {
            $favicon = DB::table('configs')->where('id', 1)->first();
            $logo = DB::table('configs')->where('id', 2)->first();
            $footer_logo = DB::table('configs')->where('id', 3)->first();
            $view->with('favicon', $favicon->flag_value); 
            $view->with('logo', $logo->flag_value);
            $view->with('footer_logo', $logo->flag_value);
        });
    }
}
