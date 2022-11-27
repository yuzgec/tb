@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    <div class="intro-slider-container">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": true}'>
            @foreach($Slider as $slider)
                @if($slider->getFirstMediaUrl('web'))
                <div class="intro-slide d-none d-sm-block">
                    <a href="{{ ($slider->button_link)  ?  $slider->button_link :  'javascrip:void()'}}" title="TB Kitap">
                        <img src="{{ $slider->getFirstMediaUrl('web') }}" alt="'2 el Kitap" class="img-fluid">
                    </a>
                </div>
                @endif

            @endforeach
        </div>
        <span class="slider-loader text-white"></span>
    </div>

    <div class="mb-3 mb-lg-5"></div>


    <div class="container">
        <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="products-featured-link" data-toggle="tab"
                   href="#products-featured-tab" role="tab"
                   aria-controls="products-featured-tab" aria-selected="true">Yeni Eklenenler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-sale-link" data-toggle="tab"
                   href="#products-sale-tab" role="tab"
                   aria-controls="products-sale-tab" aria-selected="false">Çok Satanlar</a>
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
                        @foreach($Product->take(16) as $item)
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
                        @foreach($Product->where('bestselling', 1)->take(16) as $item)
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
                        @foreach($Product as $item)
                            <x-shop.product-item :item="$item"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="blog-posts  mt-3">
        <div class="container">
            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                          "nav": false,
                          "dots": true,
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
                        <a href="https://www.tbkitap.com/kategori/turk-edebiyati?id=1">
                            <img src="/banner1.jpg" alt="{{ config('app.name') }}">
                        </a>
                    </figure>
                </article>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="https://www.tbkitap.com/kategori/sizin-icin?id=35">
                            <img src="/banner3.gif" alt="{{ config('app.name') }}">
                        </a>
                    </figure>
                </article>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="https://www.tbkitap.com/kategori/kitap-ile-kor-randevu?id=6">
                            <img src="/banner2.jpg"  alt="{{ config('app.name') }}">
                        </a>
                    </figure>
                </article>
            </div>

        </div>
    </div>

    <div class="deal-container" >
        <div class="container" >
            <div class="row">
                @foreach($Product->take(1) as $item)
                <div class="col-lg-9">
                    <div class="deal">
                        <div class="deal-content">
                            <h4>Günün Fırsatı</h4>
                            <h3 class="product-title">
                                <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
                                {{ $item->title }}
                            </h3>

                            <div class="product-price">
                                <span class="new-price">{{ money($item->price) }}₺</span>
                                @if($item->old_price)
                                    <span class="old-price">{{ money($item->old_price) }}₺</span>
                                    <p class="badge badge-warning ml-3" style="font-size:12px">
                                        %{{ abs(round( $item->price * 100 /$item->old_price - 100)) }} indirim
                                    </p>
                                @endif
                            </div>

                            <div class="deal-countdown" data-until="+1h"></div>


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
                <div class="col-md-3">
                    <a href="{{ route('kurumsal', 'kitap-sat') }}">
                        <img src="/ilan.gif" class="img-fluid" alt="İkinci El Kitaplarınız Alınır">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3" id="kitaplar">
        <div class="row">
            @foreach($Product as $item)
                <div class="col-6 col-md-3">
                    <x-shop.product-item :item="$item"/>
                </div>
            @endforeach
        </div>
        <div class="row ">
            <div class="col-12 d-flex align-items-center justify-content-center">
                {{ $Product->appends(['siralama' => 'kitap' ]) }}
            </div>
        </div>

    </div>

    <div class="blog-posts">
        <div class="container">
            <h2 class="title title-border ">Popüler Yayınevleri</h2>
            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                          "nav": false,
                          "dots": true,
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
                                 "items":5
                              }
                          }
                      }'>


                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{ route('home') }}">
                            <img src="/1.jpg" alt="Yayınevi">
                        </a>
                    </figure>
                </article>

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{ route('home') }}">
                            <img src="/2.jpg" alt="Yayınevi">
                        </a>
                    </figure>
                </article>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{ route('home') }}">
                            <img src="/5.jpg" alt="Yayınevi">
                        </a>
                    </figure>
                </article>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{ route('home') }}">
                            <img src="/4.jpg" alt="Yayınevi">
                        </a>
                    </figure>
                </article>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{ route('home') }}">
                            <img src="/3.jpg" alt="Yayınevi">
                        </a>
                    </figure>
                </article>

            </div>

        </div>
    </div>
    @if(Cart::instance('lastLook')->content()->count()) > 0)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title title-border">En Son Baktıklarınız</h2>
            </div>
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                 data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1
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
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                @foreach(Cart::instance('lastLook')->content() as $item)
                    <div class="product product-4 text-center">
                        <figure class="product-media">
                            <a href="{{ $item->options->slug }}" title="{{ $item->name }}">
                                <img class="img-fluid" src="{{ $item->options->image }}" alt="{{ $item->name }}">
                            </a>

                            <div class="product-action-vertical">
                                <a href="{{ route('favoriekle', ['id' => $item->id]) }}" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
                            </div>
                        </figure>

                        <div class="product-body">

                            <h3 class="product-title birsatir">
                                <a href="{{ $item->options->slug }}" title="{{ $item->name }}">
                                {{ $item->name }}
                            </h3>
                            <div class="product-price">
                                {{ money($item->price) }}₺
                            </div>
                        </div>
                        <div class="product-action">
                            <a href="{{ $item->options->slug}}"
                               title="{{ $item->name }}"
                               class="btn-product btn-cart">
                                <span>İncele</span>
                            </a>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection

