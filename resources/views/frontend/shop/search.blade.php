@extends('frontend.layout.app')
@section('title', 'Arama Sonuçları | '.config('app.name'))
@section('content')


    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">{{ request('q') }}</b>  arama sonuçları</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-8">
            <div class="col-md-12 col-wd-12gdot5">
                @if($Result->total() ==  0 )
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">Üzgünüz!</h4>
                        <p>Aramanızla eşleşen ürün bulunamadı.</p>
                    </div>
                @endif

                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                           aria-controls="sidebarContent1"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent1"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInLeft"
                           data-unfold-animation-out="fadeOutLeft"
                           data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filtrele</span>
                        </a>
                    </div>

                    <div class="px-3 d-none d-xl-block">
                        <p class="font-size-14 text-gray-90 mb-0"><b>{{$Result->count()}}</b> adet ürün listelendi</p>
                    </div>
                    <div class="d-flex">
                        <form method="get">
                            <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="" selected>Sıralama</option>
                                <option value="two">Artan Fiyata Göre Sırala</option>
                                <option value="three">Azalan Fiyata Göre Sırala</option>
                                <option value="four">Son Ekleme Tarihine Göre Sırala</option>
                            </select>
                        </form>
                        <form method="POST" class="ml-2 d-none d-xl-block">
                            <select class="js-select selectpicker dropdown-select max-width-200"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="one" selected>20 Ürün Göster</option>
                                <option value="two">40 Ürün Göster</option>
                                <option value="three">Hepsini Göster</option>
                            </select>
                        </form>
                    </div>
                    <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex align-items-center align-items-center">
                        <div class="pt-3">
                            {{ $Result->appends(['sirala' => 'arama'])->links() }}
                        </div>
                    </nav>
                </div>


                    <div class="container">
                        <div class="row">

                            @foreach($Result as $item)
                                <div class="col-6 col-md-3">
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
                                            <h3 class="product-title"><a href="{{ route('urun' , $item->slug)}}">{{ $item->title }}</a></h3>
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
                                </div>
                            @endforeach


                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection
