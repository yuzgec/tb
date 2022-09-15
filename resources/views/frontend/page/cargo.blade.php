@extends('frontend.layout.app')
@section('title', 'Detaylı Arama | '.config('app.name'))
@section('content')


    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">Kargo Sorgulama</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container">
        <iframe src="https://kargotakip.sendeo.com.tr/kargo-takip-popup" scrolling="no" width="110%" height="1500px" style="margin-top:-100px;border:0px"></iframe>
    </div>

@endsection
