@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": true}'>
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
                        @foreach($Products->take(8) as $item)
                            <x-shop.product-item :item="$item"/>
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
                        @foreach($Products->take(8,16) as $item)
                            <x-shop.product-item :item="$item"/>
                        @endforeach

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
                        @foreach($Products->take(16,28) as $item)
                            <x-shop.product-item :item="$item"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>


{{--

    <div class="block mt-5">
        <div class="block-wrapper ">
            <div class="container">
                <div class="heading heading-flex">
                    <div class="heading-left">
                        <h2 class="title">Türk Edebiyatı</h2>
                    </div>

                    <div class="heading-right">
                        <a href="category.html" class="title-link">Hepsini Görüntüle <i class="icon-long-arrow-right"></i></a>
                    </div>
                </div>

                <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl"
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
                                    "1440": {
                                        "items":6
                                    }
                                }
                            }'>
                    @foreach($Products->take(8) as $item)
                        <div class="product product-2 text-center">
                            <span class="product-label label-circle label-new">Yeni</span>
                            <figure class="product-media">
                                <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
                                    <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $item->title }}">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <h3 class="product-title">
                                    <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </h3>
                                <div class="product-price">
                                    {{ $item->price }}₺
                                </div>
                            </div>
                            <div class="product-action">
                                <a href="{{ route('urun' , $item->slug)}}"
                                   title="{{ $item->title }}"
                                   class="btn-product btn-cart">
                                    <span>Sepete Ekle</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5"></div>




    <div class="bestseller-products bg-light pt-5 pb-5 mb-5">
        <div class="block">
            <div class="block-wrapper ">
                <div class="container">
                    <div class="heading heading-flex">
                        <div class="heading-left">
                            <h2 class="title">Çok Bakılanlar</h2>
                        </div>

                        <div class="heading-right">
                            <a href="category.html" class="title-link">Hepsini Görüntüle <i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>


                    <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl"
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
                                    "1440": {
                                        "items":6
                                    }
                                }
                            }'>
                        @foreach($Products->take(8) as $item)

                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="/frontend/assets/images/demos/demo-19/products/product-1.jpg" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to Wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">Shooter</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">Call of Duty <br>WWII - Gold Edition</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">$24.00</span>
                                        <span class="old-price">Was $59.99</span>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </div>
                        @endforeach
                    </div>
                </div><!-- End .container -->
            </div><!-- End .block-wrapper -->
        </div><!-- End .block -->
    </div><!-- End .bg-light pt-4 pb-4 -->


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
--}}

    <div class="deal-container pt-5 pb-3 mb-5">
        <div class="container">
            <div class="row">
                @foreach($Products->take(1) as $item)
                <div class="col-lg-12">
                    <div class="deal">
                        <div class="deal-content">
                            <h4>Kampanyalı Kitap</h4>
                            <h2>Günün Fırsatı</h2>

                            <h3 class="product-title">
                                <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
                                {{ $item->title }}
                            </h3>

                            <div class="product-price">
                                {{ $item->price }}₺
                            </div>
                            <div class="deal-countdown" data-until="+10h"></div>

                            <a href="{{ route('urun' , $item->slug)}}" class="btn btn-primary">
                                <span>Ürünü İncele</span><i class="icon-long-arrow-right"></i>
                            </a>
                        </div>
                        <div class="deal-image">
                            <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
                                <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'img')}}" alt="{{ $item->title }}">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="mb-6"></div>
    <div class="container">
        <div class="row">

            @foreach($Products as $item)
                <div class="col-6 col-md-3">
                    <x-shop.product-item :item="$item"/>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container">
        <hr class="mt-1 mb-6">
    </div>

    {{--  <div class="blog-posts">
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
                  <a href="#" class="btn btn-outliarker btn-more"><span>Bütün Yazıları İncele</span>
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

