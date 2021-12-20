<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact;

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
        View::composer('layouts.app', function ($view) {
            $contact = Contact::first();
            $view->with('contact',$contact);
        });
        View::composer('layouts.app', function ($view) {
            $theme = \Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light') {
                $theme = 'light';
            }

            $view->with('theme', $theme);
        });
        View::composer('layouts.app', function ($view) {
            $FontSize = \Cookie::get('FontSize');
            if( $FontSize != 'fontA' && $FontSize != 'fontAA' && $FontSize != 'fontAAA') {
                $FontSize = 'fontA';
            }

            $view->with('FontSize', $FontSize);
        });
    }
}
