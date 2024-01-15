<?php

namespace App\Providers;

use App\Models\Category;
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
            $categories = Category::all();
            if(auth()->check() && auth()->user()->activeSubscriptions->isNotEmpty() && in_array(auth()->user()->activeSubscriptions->first()->plan_id,$categories->pluck('plan_id')->toArray())){
                $show_sports = true;
            }else{ $show_sports = false;}
            $view->with('show_sports',$show_sports);
        });
    }
}
