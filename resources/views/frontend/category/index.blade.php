@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ $Detay->title }}<span>TB Kitap</span></h1>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                ({{$ProductList->count()}}) adet ürün listelenmiştir.
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sıralama:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Yeni Eklenenler</option>
                                        <option value="rating">Fiyat Artan</option>
                                        <option value="date">Fiyat Azalan</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($ProductList as $item)
                            <div class="col-6">

                                    <div class="product product-11 text-center">
                                        <span class="product-label label-circle label-new">Yeni</span>

                                        <figure class="product-media">
                                            <a href="{{ route('urun' , $item->slug)}}">
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
                                            <a href="{{ route('urun' , $item->slug)}}" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                    Kategoriler
                            </h3>
                            <div class="mobile-menu-light">

                            <nav class="mobile-nav">
                                <ul class="mobile-menu">

                                    @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                        <li>
                                            <a href="{{ route('kategori', $item->slug) }}"
                                               class="text-dark"><i class="icon-angle-right"></i>{{ $item->title }}
                                            </a>
                                            @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                                <ul style="display: none;">
                                                    @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)
                                                        <li>
                                                            <a href="{{ route('kategori', [$item->slug, $itemm->slug]) }}"
                                                               class="text-dark">{{ $itemm->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach

                                </ul>
                            </nav>
                            </div>

                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
