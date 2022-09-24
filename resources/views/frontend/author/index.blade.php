@extends('frontend.layout.app')
@section('title', $Detay->title.' | Yazarlar | '.config('app.name'))
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('yazarlar') }}">Yazar Listesi</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">{{ $Detay->title }}</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="title">{{ $Detay->title }}</h2>
                    {!!  $Detay->desc !!}
                </div>

                <div class="col-lg-4">
                    <div class="about-images">
                        <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}"
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-15" >
        <h6 class="">{{ $Detay->title }} ait kitaplar</h6>

        <div class="row">
            @foreach($Books as $item)
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

@endsection
