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
                                        <option value="rating">Düşük Fiyat</option>
                                        <option value="date">Yüksek Fiyat</option>
                                        <option value="date">Eser Adı A-Z</option>
                                        <option value="date">Eser Adı Z-A</option>
                                        <option value="date">Yazar Adı A-Z</option>
                                        <option value="date">Yazar Adı Z-A</option>
                                        <option value="date">Basım Tarihi Eski</option>
                                        <option value="date">Basım Tarihi Yeni</option>
                                        <option value="date">Yeni Gelenler</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="products mb-3">
                        <div class="row">
                            @foreach($ProductList as $item)
                            <div class="col-6 col-md-4">

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




                <aside class="col-lg-3 col-xl-5col order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-categories">

                            <div class="widget-body">
                                <div class="accordion" id="widget-cat-acc">
                                    @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                    <div class="acc-item">
                                        <h5>
                                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                {{ $item->title }}
                                            </a>
                                        </h5>
                                        @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                        <div id="collapse-1" class="collapse {{ (request()->segment(2) == $item->slug) ? 'show' : null  }}" data-parent="#widget-cat-acc">
                                            <div class="collapse-wrap">
                                                <ul>
                                                    @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)

                                                       <li>
                                                           <a href="{{ route('kategori',  [$item->slug, $itemm->slug,'id' => $itemm->id]) }}">
                                                               {{ $itemm->title }}
                                                           </a>
                                                       </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                    {{--                <div class="acc-item">
                                        <h5>
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                TV & Video
                                            </a>
                                        </h5>
                                        <div id="collapse-2" class="collapse" data-parent="#widget-cat-acc">
                                            <div class="collapse-wrap">
                                                <ul>
                                                    <li><a href="#">AV Receivers & Amplifiers</a></li>
                                                    <li><a href="#">Blu-ray Players & Recorders</a></li>
                                                    <li><a href="#">DVD Players & Recorders</a></li>
                                                    <li><a href="#">HD DVD Players</a></li>
                                                    <li><a href="#">Home Theater Systems</a></li>
                                                    <li><a href="#">Projection Screens</a></li>
                                                    <li><a href="#">Projectors</a></li>
                                                    <li><a href="#">Satellite Television</a></li>
                                                    <li><a href="#">Televisions</a></li>
                                                    <li><a href="#">TV-DVD Combos</a></li>
                                                    <li><a href="#">Streaming Media Players</a></li>
                                                </ul>
                                            </div><!-- End .collapse-wrap -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .acc-item -->
--}}

                                </div><!-- End .accordion -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Brands</h3><!-- End .widget-title -->

                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-1">
                                            <label class="custom-control-label" for="brand-1">Next</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-2">
                                            <label class="custom-control-label" for="brand-2">River Island</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-3">
                                            <label class="custom-control-label" for="brand-3">Geox</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-4">
                                            <label class="custom-control-label" for="brand-4">New Balance</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-5">
                                            <label class="custom-control-label" for="brand-5">UGG</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-6">
                                            <label class="custom-control-label" for="brand-6">F&F</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-7">
                                            <label class="custom-control-label" for="brand-7">Nike</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Price</h3><!-- End .widget-title -->

                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="price-1" name="filter-price">
                                            <label class="custom-control-label" for="price-1">Under $25</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="price-2" name="filter-price">
                                            <label class="custom-control-label" for="price-2">$25 to $50</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="price-3" name="filter-price">
                                            <label class="custom-control-label" for="price-3">$50 to $100</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="price-4" name="filter-price">
                                            <label class="custom-control-label" for="price-4">$100 to $200</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="price-5" name="filter-price">
                                            <label class="custom-control-label" for="price-5">$200 & Above</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Customer Rating</h3><!-- End .widget-title -->

                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cus-rating-1">
                                            <label class="custom-control-label" for="cus-rating-1">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 100%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 24 )</span>
                                                        </span><!-- End .rating-container -->
                                            </label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cus-rating-2">
                                            <label class="custom-control-label" for="cus-rating-2">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 80%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 8 )</span>
                                                        </span><!-- End .rating-container -->
                                            </label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cus-rating-3">
                                            <label class="custom-control-label" for="cus-rating-3">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 60%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 5 )</span>
                                                        </span><!-- End .rating-container -->
                                            </label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cus-rating-4">
                                            <label class="custom-control-label" for="cus-rating-4">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 40%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 1 )</span>
                                                        </span><!-- End .rating-container -->
                                            </label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cus-rating-5">
                                            <label class="custom-control-label" for="cus-rating-5">
                                                        <span class="ratings-container">
                                                            <span class="ratings">
                                                                <span class="ratings-val" style="width: 20%;"></span><!-- End .ratings-val -->
                                                            </span><!-- End .ratings -->
                                                            <span class="ratings-text">( 3 )</span>
                                                        </span><!-- End .rating-container -->
                                            </label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .widget -->



                        <div class="widget widget-banner-sidebar">
                            <div class="banner-sidebar-title">ad banner 218 x 430px</div><!-- End .ad-title -->

                            <div class="banner-sidebar banner-overlay">
                                <a href="#">
                                    <img src="assets/images/demos/demo-13/banners/banner-6.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner-ad -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div>
        </div>
    </div>
@endsection
