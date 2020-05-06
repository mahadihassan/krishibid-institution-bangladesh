<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\ServiceType;
use App\Slider;

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
        $slider =Slider::where('status', 1)->get();
        $servicetype =ServiceType::where('status', 1)->get();
        $setting = Setting::find(1)->first();
        view()->share(['setting' => $setting]);
        view()->share(['servicetype' => $servicetype]);
        view()->share(['slider' => $slider]);
        Schema::defaultStringLength(191);
    }
}
