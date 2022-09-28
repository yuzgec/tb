@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                {{--
                   @foreach($Category as $item)
                        <li class="breadcrumb-item">
                            <a href="{{ route('kategori', [$item->slug, 'id' => $item->id]) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                --}}
                <li class="breadcrumb-item active" aria-current="page">{{ $Detay->title }}</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        <figure class="product-main-image">
                                            <span class="product-label label-sale">İndirim</span>
                                            <img id="product-zoom" src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" data-zoom-image="{{$Detay->getFirstMediaUrl('page', 'img')}}" alt="{{ $Detay->title }}">
                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>
                                        <div id="product-zoom-gallery" class="product-image-gallery max-col-6">
                                            <a class="product-gallery-item active" href="#" data-image="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" data-zoom-image="{{$Detay->getFirstMediaUrl('page', 'img')}}">
                                                <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $Detay->title }} - TB Kitap">
                                            </a>
                                            @foreach($Detay->getMedia('gallery') as $item)
                                                <a class="product-gallery-item" href="#" data-image="{{ $item->getUrl('thumb') }}" data-zoom-image="{{ $item->getUrl('img') }}">
                                                    <img src="{{ $item->getUrl('small') }}" alt="{{ $Detay->title }} - TB Kitap">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="product-details ">
                                    <h1 class="product-title">{{ $Detay->title }}</h1>
                                    <div class="product-price">
                                        <span class="new-price">{{ money($Detay->price) }}₺</span>
                                        @if($Detay->old_price)
                                        <span class="old-price">{{ money($Detay->old_price) }}₺</span>
                                        <p class="badge badge-warning ml-3" style="font-size:12px">
                                            %{{ abs(round( $Detay->price * 100 /$Detay->old_price - 100)) }} indirim
                                        </p>
                                        @endif
                                    </div>
                                <div class="product-content" >
                                    <table class="table table-striped table-hover table-sm table-bordered">
                                        <tbody>
                                            @foreach($Author as $item)
                                            <tr>
                                                <td style="width:25%"><b  class="ml-3">Yazar</b></td>
                                                <td><a href="{{ route('yazar', $item->slug) }}" class="ml-3" title="{{ $item->title }}"> {{ $item->title }}</a></td>
                                            </tr>
                                            @endforeach
                                            @if($Detay->getTranslator)
                                            <tr>
                                                <td><b>Çevirmen</b></td>
                                                <td><span class="ml-3">{{ $Detay->getTranslator->title }}</span></td>
                                            </tr>
                                            @endif
                                            @if($Detay->getLanguage)
                                            <tr>
                                                <td style="width:25%"><b  class="ml-3">Dili</b></td>
                                                <td><span class="ml-3">{{ $Detay->getLanguage->title }}</span></td>
                                            </tr>
                                            @endif
                                            @if($Detay->getPublisher)
                                                <tr>
                                                    <td style="width:25%"><b  class="ml-3">Yayınevi</b></td>
                                                    <td><a href="{{ route('yayinevi', $Detay->getPublisher->slug) }}" class="ml-3"
                                                           title="({{$Detay->get_publisher_count}}) adet kitap bulunmaktadır.">
                                                            {{ $Detay->getPublisher->title }} ({{$Detay->get_publisher_count}})
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td style="width:25%"><b  class="ml-3">Kitap Kodu</b></td>
                                                <td><span class="ml-3">{{ $Detay->sku }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                   {{-- <div>
                                        @foreach($Author as $item)
                                            Yazar Adı :<a href="{{ route('yazar', $item->slug) }}" title="{{ $item->title }}"> {{ $item->title }}</a><br>
                                        @endforeach
                                    </div>
                                    @if($Detay->getTranslator)
                                    <div>Çevirmen : {{ $Detay->getTranslator->title }} </div>
                                    @endif
                                    @if($Detay->getLanguage)
                                    <div>Dili :  {{ $Detay->getLanguage->title }}</div>
                                    @endif
                                    @if($Detay->getPublisher)
                                    <div>Yayınevi :
                                        <a href="{{ route('yayinevi', $Detay->getPublisher->slug) }}" title="({{$Detay->get_publisher_count}}) adet kitap bulunmaktadır.">
                                            {{ $Detay->getPublisher->title }} ({{$Detay->get_publisher_count}})</a>
                                    </div>
                                    @endif--}}
                                    @if($Detay->condition)
                                    <div class="d-flex" style="margin-top:-10px">
                                        <div>Kondisyon : </div>
                                          <div class="ratings-container align-items-center justify-content-center"
                                               style="margin-top:5px">
                                            <div class="ratings d-flex">
                                                <div class="ratings-val"
                                                     style="width: {{ condition($Detay->condition) }}%"
                                                     title="{{ conditionText($Detay->condition) }}">
                                                </div>
                                                <h6 class="kondisyon">{{ conditionText($Detay->condition) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div style="margin-top:-30px">
                                    <i class="icon-truck"></i> Bugün <b>({{$Count+1}})</b> kişi baktı<br>
                                    <i class="icon-eye"></i> Aynı gün kargoda<br>
                                    <i class="icon-info-circle"></i> Güvenli Ödeme
                                </div>

                                <div class="product-content">
                                    {!! $Detay->short  !!}
                                </div>

                                <form action="{{ route('sepeteekle') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $Detay->id }}">
                                    <input type="hidden" name="qty" value="1">

                                    <div class="product-details-action">
                                        <button type="submit" class="btn btn-primary btn-rounded btn-shadow btn-block">
                                            <span><i class="icon-shopping-cart"></i> Sepete Ekle</span>
                                        </button>
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="">
                                                <a href="{{ route('siparis') }}" class="btn btn-outline-dark-1">
                                                    <span class="text-center"> Şimdi Satın Al</span>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="#" class="btn-product btn-wishlist" title="Favori">
                                                    <span>Favorilere Ekle</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                                <div class="product-details-footer">
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div>

                            </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">İlgili Kitaplar</h4>

                                <div class="products">
                                    @foreach($Productssss->take(5) as $item)
                                    <div class="product product-sm">
                                        <figure class="product-media">
                                            <a href="{{ route('urun' , $item->slug)}}">
                                                <img src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'small')}}" alt="{{ $item->title }} - TB Kitap" class="product-image">
                                            </a>
                                        </figure>

                                        <div class="product-body">
                                            <h5 class="product-title"><a href="{{ route('urun' , $item->slug)}}">{{ $item->title }}</a></h5>
                                            <div class="product-price">
                                                <span class="new-price">{{ money($item->price) }}₺</span>
                                                @if($item->old_price)
                                                <span class="old-price">{{ money($item->old_price) }}₺</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <a href="{{ route('kategori', [$OtherCategory->slug, 'id' => $OtherCategory->id]) }}" class="btn btn-outline-dark-3"><span>Diğer Ürünler</span><i class="icon-long-arrow-right"></i></a>
                            </div>

                           {{-- <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">2. El Kitaplarımı Satmak İstiyorum</div>

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="/frontend/assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->--}}
                        </div>
                    </aside>

                <div class="col-12">
                    <div class="accordion accordion-plus product-details-accordion" id="product-accordion">
                        <div class="card card-box card-sm">
                            <div class="card-header" id="product-desc-heading">
                                <h2 class="card-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#aciklama" aria-expanded="false" aria-controls="product-accordion-desc">
                                        Ürün Açıklaması
                                    </a>
                                </h2>
                            </div>
                            <div id="aciklama" class="collapse show" aria-labelledby="product-desc-heading" data-parent="#product-accordion">
                                <div class="card-body">
                                    <div class="product-desc-content">
                                        {!!  $Detay->desc !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-box card-sm">
                            <div class="card-header" id="product-shipping-heading">
                                <h2 class="card-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#teslimat-iade" aria-expanded="true" aria-controls="product-accordion-shipping">
                                        Teslimat & İADE
                                    </a>
                                </h2>
                            </div>
                            <div id="teslimat-iade" class="collapse show" aria-labelledby="product-shipping-heading" data-parent="#product-accordion">
                                <div class="card-body">
                                    <div class="product-desc-content">
                                        <div class="p-5">
                                            <p>İade süresi teslimat tarihinden itibaren 15 gündür.</p>
                                            <br><h5><b>Sipariş İade Süreci</b></h5>
                                            <p>Siparişinizdeki ürün veya ürünler elinize ulaştıktan sonra sebep veya mazeret belirterek iade talep oluşturabilirsiniz. İade talep edilebilmesi için ürün özelliklerinin Sitede belirtilen özelliklerden farklı olması veya hasarlı olduğunun kargo tutanağı ile kayıt altına alınmış olması şartı aranır.</p>
                                            <br>
                                            <p>İade etmek istediğiniz ürünler için iade talebi oluşturduktan sonra talebiniz şirketimizin onayı için iletilir. Sistem tarafından verilen kargo koduyla ürünler müşteri tarafından kargoya verilir. Şirketimiz, ürünlerin kendisine ulaşması sonrasında iade talebini onaylar veya gerekçenin geçerli olmaması durumunda bunu reddeder. Onay halinde para iadesi gerçekleştirilir.</p>
                                            <br><p>Para İadesi: Kredi Kartı, Banka Kartı veya Puanla Yapılan Ödemelerin İadesi</p>
                                            <p>Kredi kartı veya banka kartı ile yapılan ödemelerin iadesi ödemenin yapıldığı karta gerçekleştirilir. Alışverişin yapıldığı aynı gün içerisinde yapılan iadeler bazı bankalar tarafından hesap ekstresine yansıtılmayarak alışveriş kaydı doğrudan iptal edilebilmektedir. Ayrıca para iadelerinin hesap ekstrelerine veya hesaba yansıtılması bankadan bankaya değişmekte ve 1-15 gün arasında sürebilmektedir. Hesap ekstrenizde göremediğiniz iptal-iade işlemleriniz için öncelikle bankanıza danışmalısınız.</p>
                                            TBKİTAP
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($Author as $item)
                        <div class="card card-box card-sm">
                            <div class="card-header" id="product-shipping-heading">
                                <h2 class="card-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#{{$item->slug}}" aria-expanded="true" aria-controls="product-accordion-shipping">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                            </div>
                            <div id="{{$item->slug}}" class="collapse show" aria-labelledby="product-shipping-heading" data-parent="#product-accordion">
                                <div class="card-body">
                                    <div class="product-desc-content">
                                        {!! $item->desc !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>


                </div>
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
            <div class="container">
                <div class="row">
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
                        @foreach($Productssss as $item)
                            <x-shop.product-item :item="$item"/>
                        @endforeach
                    </div>


                </div>
            </div>
            </div>
    </div>

    <div class="sticky-bar">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <figure class="product-media">
                        <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $Detay->title }}">
                    </figure>
                    <h4 class="product-title"><a href="">{{ $Detay->title }}</a></h4>
                </div>

                <div class="col-6 justify-content-end">
                    <div class="product-price">
                        {{ money($Detay->price)}}₺
                    </div>
                    <form action="{{ route('sepeteekle') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Detay->id }}">
                        <input type="hidden" name="qty" value="1">

                        <div class="product-details-action">
                            <button type="submit" class="btn-product btn-cart"><span>Sepete Ekle</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="https://api.whatsapp.com/send?phone=905350141875&text={{ $Detay->title }} isimli kitabı satın almak istiyorum. {{ route('urun', $Detay->slug) }}" class="whatsapp" target="_blank">
        <i class="icon-whatsapp my-float"></i>
    </a>
@endsection
@section('customCSS')
 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-633404bacda422b4"></script>
@endsection
