@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                   @foreach($Category->where('parent_id', 0) as $item)
                        <li class="breadcrumb-item">
                            <a href="{{ route('kategori', [$item->slug, 'id' => $item->id]) }}">{{ $item->title }}</a>
                        </li>
                        @foreach($Category->where('parent_id', $item->id) as $itemm)
                        <li class="breadcrumb-item">
                            <a href="{{ route('kategori', [$item->slug, $itemm->slug,'id' => $item->id]) }}">{{ $itemm->title }}</a>
                        </li>
                        @endforeach
                    @endforeach
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
                                            <td style="width:30%"><b  class="ml-3">Yazar</b></td>
                                            <td><a href="{{ route('yazar', $item->slug) }}" class="ml-3" title="{{ $item->title }}"> {{ $item->title }}</a></td>
                                        </tr>
                                        @endforeach
                                        @if($Detay->getTranslator)
                                        <tr>
                                            <td style="width:30%"><b  class="ml-3">Çevirmen</b></td>
                                            <td><span class="ml-3">{{ $Detay->getTranslator->title }}</span></td>
                                        </tr>
                                        @endif
                                        @if($Detay->getLanguage)
                                        <tr>
                                            <td style="width:30%"><b  class="ml-3">Dili</b></td>
                                            <td><span class="ml-3">{{ $Detay->getLanguage->title }}</span></td>
                                        </tr>
                                        @endif
                                        @if($Detay->getPublisher)
                                            <tr>
                                                <td style="width:30%"><b  class="ml-3">Yayınevi</b></td>
                                                <td><a href="{{ route('yayinevi', $Detay->getPublisher->slug) }}" class="ml-3"
                                                       title="({{$Detay->get_publisher_count}}) adet kitap bulunmaktadır.">
                                                        {{ $Detay->getPublisher->title }} ({{$Detay->get_publisher_count}})
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td style="width:30%"><b  class="ml-3">Kitap Kodu</b></td>
                                            <td><span class="ml-3">{{ $Detay->sku }}</span></td>
                                        </tr>
                                    </tbody>
                                </table>

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
                                <i class="icon-truck"></i> Bugün <b>({{$Count}})</b> kişi baktı<br>
                                <i class="icon-eye"></i> Aynı gün kargoda<br>
                                <i class="icon-info-circle"></i> Güvenli Ödeme
                            </div>

                            <div class="product-content">
                                {!! $Detay->short  !!}
                            </div>


                            @if($Detay->status != 0 )
                            <form action="{{ route('sepeteekle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $Detay->id }}">
                                <button type="submit" class="btn btn-primary btn-rounded btn-shadow btn-block">
                                    <span><i class="icon-shopping-cart"></i> Sepete Ekle</span>
                                </button>
                            </form>
                            <div class="product-details-action">

                                    <div class="row d-flex justify-content-between align-items-center">
                                        <form action="{{ route('hizlisatinal') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $Detay->id }}">
                                            <div class="">
                                                <button type="submit" class="btn btn-outline-dark-1">
                                                    <span class="text-center"><i class="icon-shopping-cart"></i> Şimdi Satın Al</span>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="">
                                            <form action="{{ route('favoriekle') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $Detay->id }}">
                                                <button type="submit" class="btn btn-outline-dark-1" title="Favori">
                                                    <span class="text-center"><i class="icon-heart-o"></i> Favorilere Ekle</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <div class="product-details-footer">
                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                            @endif
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
                                        <div class="p-1">
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
                            <span class="product-label label-circle label-new">Yeni</span>
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
