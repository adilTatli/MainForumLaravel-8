<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        View::composer(['layouts.layout', 'layouts.category_layout'], function ($view) {
            $sections = Category::all();
            $view->with('sections', $sections);
        });

        View::composer(['layouts.sidebar'], function ($view) {
            if (Cache::has('cats')) {
                $cats = Cache::get('cats');
            } else {
                $cats = Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('cats', $cats, 30);
            }

            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get());

            $view->with('cats', $cats);
        });

        Paginator::useBootstrap();
    }
}
