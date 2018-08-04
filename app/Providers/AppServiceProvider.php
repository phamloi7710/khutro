<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\KhuVuc;
use App\Model\Phong;
use Session;
use Auth;
use View;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(255);
    }
    public function register()
    {
        //
    }
}
