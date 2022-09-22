@extends('frontend.layout.app')
@section('title', 'Siparişi Tamamla | '.config('app.name'))
@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Ödeme<span>TB Kitap</span></h1>
        </div>
    </div>

    <div class="page-content">
        <div class="checkout">
            <div class="container">

                <form action="{{ route('odeme') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">İletişim Bilgileri</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Adınız Soyadınız *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="col-sm-6">
                                    <label>Telefon Numaranız *</label>
                                    <input type="text" class="form-control" name="surname">
                                </div>
                            </div>

                            <label>Firma Adı (Opsiyonel)</label>
                            <input type="text" class="form-control">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Telefon Numaranız</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>

                                <div class="col-sm-6">
                                    <label>E-Mail Adresiniz</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <label>Açık Adres</label>
                            <textarea class="form-control" cols="30" rows="4" name="address" placeholder="Açık Adresinizi Yazınız..."></textarea>


                            <div class="row">
                                <div class="col-sm-6">
                                    <label>İl</label>
                                    <input type="text" class="form-control" >
                                </div>

                                <div class="col-sm-6">
                                    <label>İlçe</label>
                                    <input type="text" class="form-control" >
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                <label class="custom-control-label" for="checkout-create-acc">Hesap Oluştur?</label>
                            </div>

                            <label>Sipariş Notunuz</label>
                            <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                        <aside class="col-lg-3 mt-3">
                            <div class="summary">
                                <h3 class="summary-title">Sepetiniz</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Toplam</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach(Cart::content() as $cart)
                                    <tr>
                                        <td>   <a href="{{ route('urun', $cart->options->url) }}">{{ $cart->name }} X {{ $cart->qty }}</a></td>
                                        <td>{{ money($cart->qty * $cart->price)}}₺</td>
                                    </tr>
                                    @endforeach

                                    <tr class="summary-subtotal">
                                        <td>Ara Toplam:</td>
                                        <td>{{ money(Cart::subtotal()) }}₺</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>Kargo Ücreti:</td>
                                        <td>{{ cargo(Cart::total()) }}</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{cargoToplam(Cart::total())}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Kredi Kartı İle Ödeme
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ödemelerinizi IYZICO ödeme alt yapısı ile güvenli bir şekilde yapabilirsiniz.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Ödeme Yap</span>
                                    <span class="btn-hover-text">Ödeme Yap</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
