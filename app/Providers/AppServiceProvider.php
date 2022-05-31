<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrap();
        view()->composer('layouts.sidebar', function($view){
           $view->with('popularPosts', Post::orderBy('views','desc')->limit(3)->get());

//           if(Cache::has('sideCategories')){
//               $sideCategories = Cache::get('sideCategories');
//           } else {
//               $sideCategories = Category::withCount('posts')->orderBy('posts_count','desc')->get();
//               Cache::put('sideCategories', $sideCategories);
//           }
           $view->with('sideCategories', Category::withCount('posts')->orderBy('posts_count','desc')->get());
        });
    }
}
