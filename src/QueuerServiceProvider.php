<?php


namespace Cblink\Queuer;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class QueuerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerRoutes();
        $this->registerResources();
    }

    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'queuer',
            'namespace' => 'Cblink\Queuer\Http\Controllers',
            'middleware' => 'web',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'queue');
    }

}