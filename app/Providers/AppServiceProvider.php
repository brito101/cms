<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();

        /** Menu */
        $basePath = env('APP_URL');
        $frontMenu = [$basePath => 'Home'];
        $pages = Page::all('title', 'slug');
        foreach ($pages as $page) {
            $frontMenu[$basePath . '/' . $page->slug] = $page->title;
        }
        /** Settings */
        $frontSettings = [];
        $settings = Setting::all('name', 'content');
        foreach ($settings as $setting) {
            $frontSettings[$setting->name] = $setting->content;
        }
        View::share([
            'frontMenu' => $frontMenu,
            'frontSettings' => $frontSettings
        ]);
    }
}
