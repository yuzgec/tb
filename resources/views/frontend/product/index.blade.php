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
            <div class="product-details-top">
                <div class="row">

                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-separated">
                            <span class="product-label label-sale">Sale</span>
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
                        <div class="product-details sticky-content">
                            <h1 class="product-title">{{ $Detay->title }}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>

                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Yorum )</a>
                            </div>

                            <div class="product-price">
                                <span class="new-price">{{ money($Detay->price) }}₺</span>
                                <span class="old-price">{{ money($Detay->old_price) }}₺</span>
                                <p class="badge badge-warning ml-3" style="font-size:12px">
                                    %{{ abs(round( $Detay->price * 100 /$Detay->old_price - 100)) }} indirim
                                </p>
                            </div>

                            <div class="product-content">
                                {!! $Detay->short  !!}
                            </div>

                            <form action="{{ route('sepeteekle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $Detay->id }}">
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Adet:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div>
                                </div>

                                <div class="product-details-action">
                                    <button type="submit"  class="btn-product btn-cart"><span>Sepete Ekle</span></button>
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Favorilere Ekle</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Tavsiye Et</span></a>
                                    </div>
                                </div>
                            </form>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Kategori:</span>
                                    <a href="#">Türk Edebiyatı</a>,
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

                            <div class="accordion accordion-plus product-details-accordion" id="product-accordion">
                                <div class="card card-box card-sm">
                                    <div class="card-header" id="product-desc-heading">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-desc" aria-expanded="false" aria-controls="product-accordion-desc">
                                                Ürün Açıklaması
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="product-accordion-desc" class="collapse" aria-labelledby="product-desc-heading" data-parent="#product-accordion">
                                        <div class="card-body">
                                            <div class="product-desc-content">
                                                {!!  $Detay->desc !!}
                                            </div><!-- End .product-desc-content -->
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card card-box card-sm">
                                    <div class="card-header" id="product-shipping-heading">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-shipping" aria-expanded="false" aria-controls="product-accordion-shipping">
                                                Teslimat & İADE
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="product-accordion-shipping" class="collapse" aria-labelledby="product-shipping-heading" data-parent="#product-accordion">
                                        <div class="card-body">
                                            <div class="product-desc-content">

                                            </div><!-- End .product-desc-content -->
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card card-box card-sm">
                                    <div class="card-header" id="product-review-heading">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#product-accordion-review" aria-expanded="false" aria-controls="product-accordion-review">
                                                Yourumlar (1)
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="product-accordion-review" class="collapse" aria-labelledby="product-review-heading" data-parent="#product-accordion">
                                        <div class="card-body">
                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="row no-gutters">
                                                        <div class="col-auto">
                                                            <h4><a href="#">Ahmet A.</a></h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 1000%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->
                                                            <span class="review-date">1 Hafta Önce</span>
                                                        </div><!-- End .col -->
                                                        <div class="col">
                                                            <h4>Hızlı bir şekilde elime ulaştı</h4>

                                                            <div class="review-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                            </div><!-- End .review-content -->


                                                        </div><!-- End .col-auto -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .review -->


                                            </div><!-- End .reviews -->
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->
                            </div><!-- End .accordion -->

                        </div>
                    </div>
                </div>
            </div>
{{--
            <div class="product-details-tab">
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
