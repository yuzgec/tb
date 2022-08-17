<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        //dd(time());
        if (! app()->runningInConsole()) {
            Paginator::useBootstrap();
            config()->set('settings', Setting::pluck('value','item')->all());
            $Pages = Cache::remember('pages',now()->addHour(10), function () {return Page::with('getCategory')->get();});
            $Page_Categories = Cache::remember('page_categories',now()->addHour(10), function () {return PageCategory::all(); });
            $Product_Categories = Cache::remember('product_categories',now()->addHour(10), function () { return ProductCategory::with('cat')->where('status', 1)->get();});
            $Product = Cache::remember('product',now()->addHour(10), function () { return Product::with('getCategory')->where('status', 1)->orderBy('rank','ASC')->get();});
            //dd($Product->getCategory);
            View::share([
                'Pages' => $Pages,
                'Page_Categories' => $Page_Categories,
                'Product_Categories' => $Product_Categories,
                'Product' => $Product
            ]);
        }

    }
}
