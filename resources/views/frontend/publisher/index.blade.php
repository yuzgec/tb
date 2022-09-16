@extends('frontend.layout.app')
@section('title', $Detay->title.' Yayın Evi | '.config('app.name'))
@section('content')


    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">{{ $Detay->title }}</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @foreach($PublisherBook as $item)
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

@endsection
