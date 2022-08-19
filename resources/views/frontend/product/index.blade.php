@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $Detay->title }}</li>
            </ol>

            <nav class="product-pager ml-auto" aria-label="Product">
                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                    <i class="icon-angle-left"></i>
                    <span>Geri</span>
                </a>

                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                    <span>İleri</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav><!-- End .pager-nav -->
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb')}}" data-zoom-image="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'img')}}" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <a class="product-gallery-item active" href="#" data-image="assets/images/products/single/1.jpg" data-zoom-image="assets/images/products/single/1-big.jpg">
                                        <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="product side">
                                    </a>

                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/2.jpg" data-zoom-image="assets/images/products/single/2-big.jpg">
                                        <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="product side">
                                    </a>

                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/3.jpg" data-zoom-image="assets/images/products/single/3-big.jpg">
                                        <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="product side">
                                    </a>

                                    <a class="product-gallery-item" href="#" data-image="assets/images/products/single/4.jpg" data-zoom-image="assets/images/products/single/4-big.jpg">
                                        <img src="https://cdn.shopify.com/s/files/1/0406/2511/1196/products/AM-JKLVOy04pxFwITdjJ86ChQIZ69QG7S7RAr8b5I-xs4-yExiR-wM9jeXTFUqc7dqUmnkKklipzDIuOfLT2iGf96VhiQ1nquGIXA9gwq-Zatb1LxOAr2Ld-rNhM1SLsGRciReszl9mIdzjITvaOtZWDJ3uA8Q_s1000-no_900x.jpg?v=1650414603" alt="product side">
                                    </a>
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $Detay->title }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div>

                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Yorum )</a>
                            </div>

                            <div class="product-price">
                                {{ $Detay->price }}₺
                            </div>

                            <div class="product-content">
                                {{ $Detay->shortdesc }}
                            </div>
                            <form action="{{ route('sepeteekle') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $Detay->id }}">
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Adet:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <button type="submit"  class="btn-product btn-cart"><span>Sepete Ekle</span></button>

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Favorilere Ekle</span></a>
                                    <a href="#" class="btn-product btn-compare" title="Compare"><span>Tavsiye Et</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->
                            </form>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Kategori:</span>
                                    <a href="#">Türk Edebiyatı</a>,
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Paylaş:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

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
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Teslimat & İADE</h3>
                          </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
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
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

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
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">En Son Baktıklarınız</h2><!-- End .title text-center -->

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
