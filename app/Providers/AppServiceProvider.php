<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    
    public function boot()
    {
        Schema::defaultStringLength(191);
        //Carbon::setLocale(config('app.locale'));
	Carbon::setLocale('es');
	setlocale(LC_TIME,'es_ES');
        //setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
    }
}
