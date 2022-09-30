@extends('frontend.layout.app')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sepetim</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th>Ürün</th>
                                <th>Fiyat</th>
                                <th>Adet</th>
                                <th>Toplam</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(Cart::instance('shopping')->content() as $cart)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="{{ route('urun', $cart->options->url) }}">
                                                <img src="{{ $cart->options->image }}" alt="{{ $cart->name }}">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a href="{{ route('urun', $cart->options->url) }}">{{ $cart->name }}</a>
                                        </h3>
                                    </div>
                                </td>
                                <td class="price-col">{{ money($cart->price)}}</td>
                                <td class="quantity-col">
                                   X {{ $cart->qty }}
                                </td>
                                <td class="total-col">{{ money($cart->qty * $cart->price)}}₺</td>

                                <td class="remove-col">
                                    <form action="{{ route('sepetcikar', $cart->rowId) }}" method="POST">
                                        @csrf
                                        <button class="btn-remove" type="submit"><i class="icon-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="Varsa İndirim Kupunu">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Sepet Toplam</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                <tr class="summary-subtotal">
                                    <td>Ara Toplam:</td>
                                    <td>{{ money(Cart::instance('shopping')->subtotal()) }}₺</td>
                                </tr>
                                <tr class="summary-shipping">
                                    <td>Kargo Ücreti:</td>
                                    <td>{{ cargo(Cart::instance('shopping')->total()) }}</td>
                                </tr>

                                <tr class="summary-total">
                                    <td>Toplam:</td>
                                    <td>{{cargoToplam(Cart::instance('shopping')->total())}}₺</td>
                                </tr>
                                </tbody>
                            </table>

                            <a href="{{ route('siparis') }}" class="btn btn-outline-primary-2 btn-order btn-block">ÖDEME SAYFASINA GİT</a>
                        </div>

                        <a href="{{ route('home') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>ALIŞVERİŞE DEVAM ET</span><i class="icon-refresh"></i></a>
                    </aside>

                </div>
            </div>
        </div>
    </div>
@endsection
