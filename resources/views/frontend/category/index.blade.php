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
                            <div class="toolbox-layout">
                                <a href="category-list.html" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="category-2cols.html" class="btn-layout active">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="category.html" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="category-4cols.html" class="btn-layout">
                                    <svg width="22" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="18" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                        <rect x="18" y="6" width="4" height="4" />
                                    </svg>
                                </a>
                            </div><!-- End .toolbox-layout -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

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

                            </div><!-- End .col-sm-6 -->

                            @endforeach

                        </div>
                    </div><!-- End .products -->

                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filtrele:</label>
                            <a href="#" class="sidebar-filter-clear">Temizle</a>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Kategoriler
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                                            <nav class="mobile-nav">
                                                <ul class="mobile-menu">
                                                    <li class="active">
                                                        <a href="{{ route('home') }}">Anasayfa</a>
                                                    </li>

                                                    @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                                        <li><a href="{{ route('kategori', $item->slug) }}" class="">{{ $item->title }}</a>
                                                            @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                                                <ul style="display: none;">
                                                                    @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)
                                                                        <li><a href="{{ route('kategori', [$item->slug, $itemm->slug]) }}">{{ $itemm->title }}</a></li>
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
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
