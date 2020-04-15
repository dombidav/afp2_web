<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeis', function ($expression) {
            return "&lt;?php if (fnmatch({$expression}, Route::currentRouteName())) : ?&gt;";
        });

        Blade::directive('endrouteis', function ($expression) {
            return '&lt;?php endif; ?&gt;';
        });

        Blade::directive('routeisnot', function ($expression) {
            return "&lt;?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?&gt;";
        });

        Blade::directive('nav_split', function ($expression) {
            return '<li class="nav-item nav-link"> | </li>';
        });

        Blade::directive('nav_item', function ($expression) {
            if(strpos($expression, ',') == false){
                $route = trim($expression, '\'" ');
                $name = ucfirst($route);
            }else{
                $ex = explode(',', $expression);
                $route = trim($ex[0], '\'" ');
                $name = trim($ex[1], '\'" ');
            }
            $active = \Route::currentRouteName() == $route ? 'active' : '';
            $mark = \Route::currentRouteName() == $route ? '&gt; ' : '';
            return '<li class="nav-item '. $active .'">
<a class="nav-link" href="'. route($route) .'">'. $mark . $name .'</a>
</li>';
        });

        Blade::directive('endrouteisnot', function ($expression) {
            return '&lt;?php endif; ?&gt;';
        });

    }
}
