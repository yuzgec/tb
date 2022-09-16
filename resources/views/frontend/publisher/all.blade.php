@extends('frontend.layout.app')
@section('title', 'Yayınevi Listesi | '.config('app.name'))
@section('content')


    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">Yazarlar</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="bg-light-2 pt-2 pb-7 mb-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3 text-center">
                    @foreach($Alfabe as  $abc)
                        <button class="" style="width: 35px">{{ $abc }}</button>
                    @endforeach
                </div>
                @foreach($All as $item)
                    <div class="col-6 col-md-2">
                        <div class="member member-2 text-center">
                            <figure class="member-media">
                                <a href="{{ route('yazar', $item->slug) }}" title="{{ $item->title }}">
                                    <img
                                        src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb')}}"
                                        alt="{{ $item->title }}">
                                </a>
                            </figure>
                            <div class="member-content">
                                <div><a href="{{ route('yazar', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a><div>
                                        ({{$item->get_book_count_count}}) Adet Kitap</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>

@endsection
