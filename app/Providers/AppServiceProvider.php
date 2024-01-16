<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer(['layouts.menu.user_desktop','layouts.menu.user_mobile'], function ($view) {
            $plans = Setting::where('name','sport_plans')->first()->value;
            if(auth()->check() && auth()->user()->activeSubscriptions->isNotEmpty() && 
                in_array(auth()->user()->activeSubscriptions->first()->plan_id,explode(',',$plans) ) 
            ){
                $show_sports = true;
            }else{ $show_sports = false;}
            $view->with('show_sports',$show_sports);
        });
    }
}
