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
                <div class="col-md-3 2 col-6">
                    <x-shop.product-item :item="$item"/>
                </div>
            @endforeach
        </div>
    </div>

@endsection
