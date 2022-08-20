@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
            <div class="intro-slide"
                 style="background-image: url(https://cdn.shopify.com/s/files/1/0406/2511/1196/files/2_22WK27_AGUB_Report_Desktop_1800x.jpg?v=1656957213);">
            </div>
            <div class="intro-slide"
                 style="background-image: url(https://cdn.shopify.com/s/files/1/0406/2511/1196/files/IMG_0248-EditB_19ef6f43-14ca-4719-9e6c-7a5707cb0b18_1800x.jpg?v=1631029184);">
            </div>
        </div>
        <span class="slider-loader text-white"></span>
    </div>

    <div class="mb-3 mb-lg-5"></div>


    <div class="container">
        <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="products-featured-link" data-toggle="tab"
                   href="#products-featured-tab" role="tab"
                   aria-controls="products-featured-tab" aria-selected="true">Yeni Eklenen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-sale-link" data-toggle="tab"
                   href="#products-sale-tab" role="tab"
                   aria-controls="products-sale-tab" aria-selected="false">Çok Satanlar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-top-link" data-toggle="tab"
                   href="#products-top-tab" role="tab"
                   aria-controls="products-top-tab" aria-selected="false">Favori Ürünler </a>
            </li>
        </ul>
    </div>
    <div class="display-row bg-light">

        <div class="container-fluid">
            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        @foreach($Products as $item)
                        <div class="product product-2 text-center">
                            <span class="product-label label-circle label-new">Yeni</span>

                            <figure class="product-media">
                                <a href="{{ route('urun' , $item->slug)}}">
                                    <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $item->title }}">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urun' , $item->slug)}}">{{ $item->title }}</a></h3>
                                <div class="product-price">
                                    {{ $item->price }}₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="{{ route('urun' , $item->slug)}}" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel" aria-labelledby="products-top-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                        <div class="product product-11 text-center">

                            <figure class="product-media">
                                <a href="{{ route('urunler')}}">
                                    <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                <div class="product-price">
                                    251,00₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="mb-5"></div>


    <div class="display-row bg-light">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-last">
                    <div class="banner banner-overlay">
                        <a href="#">
                            <img src="/frontend/assets/images/demos/demo-15/banners/banner-3.jpg" alt="Banner">
                        </a>

                        <div class="banner-content men">
                            <h2 class="banner-title text-white">03. Beautiful <br>dresses perfect <br>for any occasion.</h2>
                            <h3 class="banner-subtitle text-brightblack">IN THIS LOOK</h3><

                            <ul class="text-white">
                                <li>Botanical-Print Dress</li>
                                <li>Cece Shoulder Bag</li>
                                <li>Cunningham Leather Sandal</li>
                            </ul>

                            <div class="banner-text text-brightblack">130.00₺ - 358.00₺</div><!-- End .banner-text -->
                            <a href="#" class="btn btn-outline-primary-2"><span>Kategori İncele</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading ">
                        <h2 class="title text-center">Başlık Gelecek</h2>
                        <p class="title-desc">Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır</p><!-- End .title-desc -->
                        <p class="title-desc">Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır</p><!-- End .title-desc -->
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="product product-11 text-center">

                                <figure class="product-media">
                                    <a href="{{ route('urunler')}}">
                                        <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                    <div class="product-price">
                                        251,00₺
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="product product-11 text-center">

                                <figure class="product-media">
                                    <a href="{{ route('urunler')}}">
                                        <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                    <div class="product-price">
                                        251,00₺
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-4">
                            <div class="product product-11 text-center">

                                <figure class="product-media">
                                    <a href="{{ route('urunler')}}">
                                        <img src="/frontend/assets/images/demos/demo-2/products/product-1-1.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ route('urunler')}}">Kitap Adı Gelecek</a></h3>
                                    <div class="product-price">
                                        251,00₺
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="deal-container pt-5 pb-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="deal">
                        <div class="deal-content">
                            <h4>Kampanyalı Kitap</h4>
                            <h2>Günün Fırsatı</h2>

                            <h3 class="product-title"><a href="{{ route('urunler')}}">World Travel (Hardcover) by Anthony Bourdain</a></h3>

                            <div class="product-price">
                                <span class="new-price">149.00₺</span>
                                <span class="old-price">240.00₺</span>
                            </div>

                            <div class="deal-countdown" data-until="+10h"></div>

                            <a href="{{ route('urunler')}}" class="btn btn-primary">
                                <span>Ürünü İncele</span><i class="icon-long-arrow-right"></i>
                            </a>
                        </div>
                        <div class="deal-image">
                            <a href="{{ route('urunler')}}">
                                <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/ACtC-3cyvpQBvoTirf2vy5i2hc-xutdDlprRQpI0CK3Jh4gr819N9ZwrXCurr20AeTnjCo96cFI8AYfqlxEQ4hvIuxwqVQmKxC0Z7285B9koxs7SiiDG47547nBetr7dOsHvArzCSoMaIWJI4Y7XInfpy-SFpQ_s1024-no_900x.jpg?v=1619578820" alt="image">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="banner banner-overlay banner-overlay-light text-center d-none d-lg-block">
                        <a href="#">
                            <img src="/frontend/assets/images/demos/demo-2/banners/banner-5.jpg" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-top banner-content-center">
                            <h4 class="banner-subtitle">The Best Choice</h4>
                            <h3 class="banner-title">AGEN</h3>
                            <div class="banner-text text-primary">$49.99</div><!-- End .banner-text -->
                            <a href="#" class="btn btn-outline-gray banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End .bg-light -->

    <div class="mb-6"></div>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="product product-11 text-center">

                    <figure class="product-media">
                        <a href="{{ route('urunler')}}">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="Product image" class="product-image">
                            <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVI_b4iJ2q1INuCQQ743RPd0XskcmpkiP5lkHypiyuCkrve5G5dBaiHSASGtGq8Mgdow1Oc4vdETVbaClvlnTOOHhz8AJ5Zh_A0DV3FUFE5_XSpeA29YNgM3izV8zKAxd6NgGxT4Y5zEAeOHqL04QXxng_s956-no.jpg?v=1660233814" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{ route('urunler')}}">Pachinko (Trade) by Min Jin Lee
                            </a></h3>
                        <div class="product-price">
                            251,00₺
                        </div>
                    </div>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr class="mt-1 mb-6">
    </div>

    <div class="blog-posts">
        <div class="container">
            <h2 class="title text-center">Blog</h2>

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="/frontend/assets/images/demos/demo-2/blog/post-1.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body text-center">
                        <div class="entry-meta">
                            <a href="#">1 Eylül 2022</a>
                        </div>

                        <h3 class="entry-title">
                            <a href="#">Blog Haber Başlığı 1</a>
                        </h3>

                        <div class="entry-content">
                            <a href="single.html" class="read-more">Devamını Oku</a>
                        </div>
                    </div>
                </article>

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="/frontend/assets/images/demos/demo-2/blog/post-2.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body text-center">
                        <div class="entry-meta">
                            <a href="#">1 Eylül 2022</a>
                        </div>

                        <h3 class="entry-title">
                            <a href="#">Blog Haber Başlığı 1</a>
                        </h3>

                        <div class="entry-content">
                            <a href="single.html" class="read-more">Devamını Oku</a>
                        </div>
                    </div>
                </article>

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="/frontend/assets/images/demos/demo-2/blog/post-3.jpg" alt="image desc">
                        </a>
                    </figure>

                    <div class="entry-body text-center">
                        <div class="entry-meta">
                            <a href="#">1 Eylül 2022</a>
                        </div>

                        <h3 class="entry-title">
                            <a href="#">Blog Haber Başlığı 1</a>
                        </h3>

                        <div class="entry-content">
                            <a href="single.html" class="read-more">Devamını Oku</a>
                        </div>
                    </div>
                </article>
            </div>

            <div class="more-container text-center mt-2">
                <a href="#" class="btn btn-outline-darker btn-more"><span>Bütün Yazıları İncele</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
   {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="/frontend/assets/images/tblogo.jpg" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Kısa Açıklama Yazısı Gelecek</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Email Adresinizi Yazınız" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>gönder</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Bir daha gösterme</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="/frontend/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

@endsection

