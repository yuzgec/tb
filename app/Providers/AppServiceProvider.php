<?php

namespace App\Providers;

use App\View\Components\Form\Date;
use App\View\Components\Form\InputEmail;
use App\View\Components\Form\InputFile;
use App\View\Components\Form\InputPassword;
use App\View\Components\Form\InputText;
use App\View\Components\Form\SelectBox;
use App\View\Components\Form\TextArea;
use App\View\Components\Index\Add;
use App\View\Components\Index\Back;
use App\View\Components\Index\CategoryDeleteModal;
use App\View\Components\Index\DeleteModal;
use App\View\Components\Index\Modal;
use App\View\Components\Index\Save;
use App\View\Components\Product;
use App\View\Components\Shop\ProductItem;
use App\View\Components\Shop\ProductList;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {

        Paginator::useBootstrap();
        Carbon::setLocale(config('app.locale'));
            URL::forceScheme('https');
            Blade::component('form-inputtext', InputText::class);
            Blade::component('form-password', InputPassword::class);
            Blade::component('form-email', InputEMail::class);
            Blade::component('form-date', Date::class);
            Blade::component('form-select', SelectBox::class);
            Blade::component('form-textarea', TextArea::class);
            Blade::component('form-file', InputFile::class);
            Blade::component('modal', Modal::class);
            Blade::component('delete-modal', DeleteModal::class);
            Blade::component('delete-cat-modal', CategoryDeleteModal::class);
            Blade::component('back', Back::class);
            Blade::component('save', Save::class);
            Blade::component('add', Add::class);
            Blade::component('product-item', ProductItem::class);
    }
}
