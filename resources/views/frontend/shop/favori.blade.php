@extends('frontend.layout.app')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Favori Kitaplarım</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if($FavoriteBooks->count() > 0)
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th>Kitap</th>
                                <th>Fiyat</th>
                                <th>Stok</th>
                                <th>Sepete Ekle</th>
                                <th class="float-right">Sİl</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($FavoriteBooks as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('urun', $item->slug) }}">
                                                    <img src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb') }}" alt="{{ $item->title }}">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{ route('urun', $item->slug) }}">{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="price-col">{{ money($item->price)}}₺</td>

                                    <td class="price-col">
                                        <span class="badge {{ ($item->status == 1 ) ? 'badge-success' :  'badge-danger'}}">
                                            {{ ($item->status == 1 ) ? 'Stokta Var' :  'Stokta Yok'}}
                                        </span>
                                    </td>

                                    <td class="total-col">
                                        <form action="{{ route('sepeteekle') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="btn btn-primary btn-rounded btn-shadow ">
                                                <span><i class="icon-shopping-cart"></i> Sepete Ekle</span>
                                            </button>
                                        </form>
                                    </td>

                                    <td class="remove-col">
                                        <form action="{{ route('favoricikar', $item->id) }}" method="POST">
                                            @csrf
                                            <button class="btn-remove" type="submit"><i class="icon-close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-warning">Henüz Kitap eklenmemiş</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
