<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Favorite;
use App\Models\Language;
use App\Models\Page;
use App\Models\PageCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Publisher;
use App\Models\Setting;
use App\Models\Translator;
use App\Models\Years;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewShareProvider extends ServiceProvider
{
    public function boot()
    {

        if (! app()->runningInConsole()) {
            Paginator::useBootstrap();
            config()->set('settings', Setting::pluck('value','item')->all());
            $Product = Cache::remember('product',now()->addHour(10), function () {
                return Product::with('getCategory')
                    ->select('id', 'title', 'price', 'old_price', 'slug','bestselling','status', 'condition','year', 'language')
                    ->where('status',1)
                    ->paginate(30)
                    ->fragment('kitaplar');
            });

            $Product_Categories = Cache::remember('product_categories',now()->addHour(10), function () {
                return ProductCategory::with('cat')->where('status', 1)->get()->toFlatTree();
            });
            $Page_Categories = Cache::remember('page_categories',now()->addHour(10), function () {
                return PageCategory::all();
            });
            $Pages = Cache::remember('pages',now()->addHour(10), function () {
                return Page::with('getCategory')->get();
            });
            $Language = Cache::remember('language',now()->addHour(10), function () {
                return Language::select('id', 'title')->get();
            });
            $Publisher = Cache::remember('publisher',now()->addHour(10), function () {
                return Publisher::select('id', 'title')->orderBy('title', 'asc')->get();
            });
            $Translator = Cache::remember('translator',now()->addHour(10), function () {
                return Translator::select('id', 'title')->orderBy('title', 'asc')->get();
            });
            $Author = Cache::remember('author',now()->addHour(10), function () {
                return Author::select('id', 'title')->orderBy('title', 'asc')->get();
            });
            $Years = Cache::remember('years',now()->addHour(10), function () {
                return Years::select('id', 'title')->get();
            });

            View::share([
                'Pages' => $Pages,
                'Page_Categories' => $Page_Categories,
                'Product_Categories' => $Product_Categories,
                'Product' => $Product,
                'Years' => $Years,
                'Author' => $Author,
                'Translator' => $Translator,
                'Publisher' => $Publisher,
                'Language' => $Language
            ]);
        }

    }
}
