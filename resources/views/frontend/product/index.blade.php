@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}l">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $Detay->title }}</li>
            </ol>

         {{--   <nav class="product-pager ml-auto" aria-label="Product">
                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                    <i class="icon-angle-left"></i>
                    <span>Geri</span>
                </a>

                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                    <span>İleri</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav>--}}
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="product-gallery product-gallery-separated">
                                        <span class="product-label label-sale">İn</span>
                                        <figure class="product-separated-item">
                                            <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" data-zoom-image="{{ (!$Detay->getFirstMediaUrl('page', 'img')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $Detay->title }}">

                                            <a href="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'img')}}" id="btn-separated-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>
                                        @foreach($Detay->getMedia('gallery') as $item)
                                        <figure class="product-separated-item">
                                            {{ $item }}
                                        </figure>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="product-details ">
                                    <h1 class="product-title">{{ $Detay->title }}</h1>

                                    <div class="product-price">
                                        <span class="new-price">{{ money($Detay->price) }}₺</span>
                                        <span class="old-price">{{ money($Detay->old_price) }}₺</span>
                                        <p class="badge badge-warning ml-3" style="font-size:12px">
                                            %{{ abs(round( $Detay->price * 100 /$Detay->old_price - 100)) }} indirim
                                        </p>

                                    </div>

                                <div class="product-content">
                                    Kitap Adı :  <br>
                                    Yazar Adı :  <br>
                                    Çevirmen :  <br>
                                    Dili :  <br>
                                    Yayınevi :  <br>
                                    Kondisyon :  <br>
                                </div>

                                <div class="product-content">
                                    {!! $Detay->short  !!}
                                </div>

                                <form action="{{ route('sepeteekle') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Detay->id }}">
                                    <input type="hidden" name="qty" value="1">

                                    <div class="product-details-action">
                                        <button type="submit" class="btn btn-warning mr-2">
                                            <span>Sepete Ekle</span>
                                        </button>
                                        <a href="#" class="btn btn-success">
                                            <span>Şimdi Satın Al</span>
                                        </a>

                                    </div>

                                    <div class="product-details-action">

                                        <div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Favorilere Ekle</span></a>
                                            <a href="#" class="btn-product btn-compare" title="Compare"><span>Tavsiye Et</span></a>
                                        </div>
                                    </div>
                                </form>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Kategori:</span>
                                        <a href="#">Türk Edebiyatı</a>
                                    </div>

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Paylaş:</span>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('urun', $Detay->slug) }}" class="social-icon" title="Facebook" target="_blank">
                                            <i class="icon-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/share?url={{ route('urun', $Detay->slug) }}&text={{ $Detay->title }}" class="social-icon" title="Twitter" target="_blank">
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="http://pinterest.com/pin/create/button/?url={{ route('urun', $Detay->slug) }}&media={{$Detay->getFirstMediaUrl('page', 'thumb')}}&description={{ $Detay->title }}" class="social-icon" title="Pinterest" target="_blank">
                                            <i class="icon-pinterest"></i>
                                        </a>
                                    </div>
                                </div>




                            </div>
                                </div>
                            </div>
                        </div>


                        <div class="product-details-tab">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-desc-link"
                                       data-toggle="tab" href="#product-desc-tab"
                                       role="tab" aria-controls="product-desc-tab" aria-selected="true">Açıklama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-info-link"
                                       data-toggle="tab" href="#product-info-tab"
                                       role="tab" aria-controls="product-info-tab"
                                       aria-selected="false">Teslimat & İADE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-shipping-link"
                                       data-toggle="tab" href="#product-shipping-tab"
                                       role="tab" aria-controls="product-shipping-tab" aria-selected="false">Yazar Bilgi</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                     aria-labelledby="product-desc-link">
                                    <div class="product-desc-content">
                                        <h3>Ürün Açıklaması</h3>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                                     aria-labelledby="product-info-link">
                                    <div class="product-desc-content">
                                        <h3>Teslimat & İADE Koşulları</h3>
                                        <p>İade süresi teslimat tarihinden itibaren 15 gündür.
                                            Sipariş İade Süreci
                                            Siparişinizdeki ürün veya ürünler elinize ulaştıktan sonra sebep veya mazeret belirterek iade talep oluşturabilirsiniz. İade talep edilebilmesi için ürün özelliklerinin Sitede belirtilen özelliklerden farklı olması veya hasarlı olduğunun kargo tutanağı ile kayıt altına alınmış olması şartı aranır.
                                            İade etmek istediğiniz ürünler için iade talebi oluşturduktan sonra talebiniz şirketimizin onayı için iletilir. Sistem tarafından verilen kargo koduyla ürünler müşteri tarafından kargoya verilir. Şirketimiz, ürünlerin kendisine ulaşması sonrasında iade talebini onaylar veya gerekçenin geçerli olmaması durumunda bunu reddeder. Onay halinde para iadesi gerçekleştirilir.
                                            Para İadesi: Kredi Kartı, Banka Kartı veya Puanla Yapılan Ödemelerin İadesi
                                            Kredi kartı veya banka kartı ile yapılan ödemelerin iadesi ödemenin yapıldığı karta gerçekleştirilir. Alışverişin yapıldığı aynı gün içerisinde yapılan iadeler bazı bankalar tarafından hesap ekstresine yansıtılmayarak alışveriş kaydı doğrudan iptal edilebilmektedir. Ayrıca para iadelerinin hesap ekstrelerine veya hesaba yansıtılması bankadan bankaya değişmekte ve 1-15 gün arasında sürebilmektedir. Hesap ekstrenizde göremediğiniz iptal-iade işlemleriniz için öncelikle bankanıza danışmalısınız.
                                            TBKİTAP</p>

                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                     aria-labelledby="product-shipping-link">
                                    <div class="product-desc-content">
                                        <h3>Orhan Veli</h3>
                                        </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div>

                    </div>

                    <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">Türk Edebiyatı</h4>

                                <div class="products">
                                    @foreach($Productssss->take(5) as $item)
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="{{ route('urun' , $item->slug)}}">
                                                <img src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'small')}}" alt="Product image" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="{{ route('urun' , $item->slug)}}">{{ $item->title }}</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">{{ money($Detay->price) }}₺</span>
                                                <span class="old-price">{{ money($Detay->old_price) }}₺</span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div>
                                    @endforeach
                                </div>

                                <a href="{{ route('home') }}" class="btn btn-outline-dark-3"><span>Diğer Ürünler</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .widget widget-products -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-product -->
                    </aside><!-- End .col-lg-3 -->
                </div>

        </div>

            </div>
{{--            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab"
                           aria-controls="product-desc-tab" aria-selected="true">Ürün Açıklaması</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                           href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Teslimat & İADE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab"
                           href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Yorumlar (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Ürün Açıklaması</h3>
                            {!!  $Detay->desc !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Teslimat & İADE</h3>
                          </div>
                    </div>
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Yorumlar (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div>
                                        </div>
                                        <span class="review-date">6 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div>

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div>

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <h2 class="title text-center mb-4">En Son Baktıklarınız</h2>

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
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
@section('custumJS')
    <script src="/frontend/assets/js/jquery.sticky-kit.min.js"></script>

@endsection
