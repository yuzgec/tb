<?php

use App\Models\Product;
use App\Models\ProductCategoryPivot;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profilim', 'HomeController@profilim')->name('home.account');


    Route::get('/kategori/{url}/{sub?}', 'HomeController@kategori')->name('kategori');
    Route::get('/kargosorgulama', 'HomeController@kargosorgulama')->name('kargosorgulama');
    Route::get('/sepet', 'HomeController@sepet')->name('sepet');
    Route::get('/siparis', 'HomeController@siparis')->name('siparis');
    Route::get('/kitap/{path}', 'HomeController@urun')->where('path', '.*')->name('urun');
    Route::get('/iletisim', 'HomeController@iletisim')->name('iletisim');
    Route::get('/arama', 'HomeController@search')->name('search');
    Route::get('/detayli-arama', 'HomeController@detayliarama')->name('detayliarama');
    Route::post('/bulten', 'HomeController@mailsubcribes')->name('mailsubcribes');
    Route::post('/sepete-ekle', 'HomeController@addtocart')->name('sepeteekle');
    Route::post('/hizli-satin-al', 'HomeController@hizlisatinal')->name('hizlisatinal');
    Route::post('/sepet-cikar/{rowId}', 'HomeController@cartdelete')->name('sepetcikar');
    Route::post('/sepet-bosalt}', 'HomeController@cartdestroy')->name('sepetbosalt');
    Route::get('/kurumsal/{url}', 'HomeController@kurumsal')->name('kurumsal');
    Route::get('/yazar/{url}', 'HomeController@yazar')->name('yazar');
    Route::get('/yazarlar', 'HomeController@yazarlar')->name('yazarlar');
    Route::get('/yayinevi/{url}', 'HomeController@yayinevi')->name('yayinevi');

    Route::post('/odeme', 'HomeController@odeme')->name('odeme');
    Route::post('/siparis/kaydet', 'HomeController@kaydet')->name('kaydet');
    Route::get('/siparis/sonuc', 'HomeController@sonuc')->name('sonuc');

    Route::get('/mail', function (){
       return view('frontend.mail.siparis');
    });

    Route::group(["prefix"=>"go", 'middleware' => ['auth', 'admin']],function() {
        Route::get('/', 'DashboardController@index')->name('go');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::auto('/page', PageController::class);
        Route::auto('/page-categories', PageCategoryController::class);
        Route::auto('/blog', BlogController::class);
        Route::auto('/blog-categories', BlogCategoryController::class);
        Route::auto('/banner', BannerController::class);
        Route::auto('/banner-area', BannerAreaController::class);
        Route::auto('/faq', FaqController::class);
        Route::auto('/faq-categories', FaqCategoryController::class);
        Route::auto('/gallery', GalleryController::class);
        Route::auto('/gallery-categories', GalleryCategoryController::class);
        Route::auto('/slider', SliderController::class);
        Route::auto('/video', VideoController::class);
        Route::auto('/video-categories', VideoCategoryController::class);
        Route::auto('/settings', SettingController::class);
        Route::auto('/contact', ContactController::class);
        Route::auto('/product', ProductController::class);
        Route::auto('/product-categories', ProductCategoryController::class);
        Route::auto('/campagin', CampaginController::class);
        Route::auto('/comment', CommentController::class);
        Route::auto('/author', AuthorController::class);
        Route::auto('/publisher', PublisherController::class);
        Route::auto('/language', LanguageController::class);
        Route::auto('/translator', TranslatorController::class);
    });
