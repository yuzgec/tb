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

    <div class="bg-light-2 pt-6 pb-3 mb-3 mb-lg-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="title">{{ $Detay->title }}</h2>
                    {!!  $Detay->desc !!}
                </div>

                <div class="col-lg-4">
                    <div class="about-images">
                        <img src="{{ (!$Detay->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'thumb')}}" class="img-fluid mb-5">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">

    <div class="container" >
        <h6>{{ $Detay->title }} ait kitaplar</h6>

        <div class="row">
            @foreach($Books as $item)
                <div class="col-6 col-md-3">
                    <x-shop.product-item :item="$item"/>
                </div>
            @endforeach
        </div>
    </div>
    </div>

@endsection
