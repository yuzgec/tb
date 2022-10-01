@extends('frontend.layout.app')
@section('title', Auth::user()->name.' | Yönetim Anasayfa')
@section('content')


    <div class="page-content mt-5">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link"
                                   data-toggle="tab" href="#tab-dashboard" role="tab"
                                   aria-controls="tab-dashboard" aria-selected="true">Profilim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab"
                                   href="#tab-orders" role="tab" aria-controls="tab-orders"
                                   aria-selected="false">Siparişlerim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab"
                                   href="#tab-downloads" role="tab" aria-controls="tab-downloads"
                                   aria-selected="false">Favorilerim</a>
                            </li>
                            <li class="nav-item">
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="nav-link"  href="javascript:{}" onclick="document.getElementById('logout').submit()">
                                         Güvenli Çıkış</a>
                                </form>
                            </li>
                        </ul>
                    </aside>

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" required="">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" required="">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Display Name *</label>
                                    <input type="text" class="form-control" required="">
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required="">

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>No order has been made yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
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
                                                            <span><i class="icon-shopping-cart"></i> Ekle</span>
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

                            </div><!-- .End .tab-pane -->

                           </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->

@endsection
