<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Notificacion;

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
        //
        Schema::defaultStringLength(191);

         $notificaciones=Notificacion::orderBy('created_at','desc')->get();
         $nnoti=Notificacion::count();
         view()->share(['notificaciones'=>$notificaciones,'nnoti'=>$nnoti]);
    }
}
