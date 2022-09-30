@extends('frontend.layout.app')
@section('title', 'Siparişi Tamamla | '.config('app.name'))
@section('content')

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
                                    <input value="{{old('name')}}" type="text" class="form-control  @if($errors->has('name')) is-invalid @endif" name="name"  autocomplete="off">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label>Adınız Soyadınız *</label>
                                    <input value="{{old('surname')}}" type="text" class="form-control  @if($errors->has('surname')) is-invalid @endif" name="surname" autocomplete="off">
                                    @if($errors->has('surname'))
                                        <div class="invalid-feedback">{{$errors->first('surname')}}</div>
                                    @endif
                                </div>

                            </div>

                            <label>Firma Adı (Opsiyonel)</label>
                            <input type="text" class="form-control">


                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Telefon Numaranız * </label>
                                    <input value="{{old('phone')}}" type="text" class="form-control  @if($errors->has('phone')) is-invalid @endif" name="phone"  autocomplete="off">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label>E-Mail Adresiniz * </label>
                                    <input value="{{old('email')}}" type="text" class="form-control  @if($errors->has('email')) is-invalid @endif" name="email" autocomplete="off">
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                    @endif
                                </div>

                            </div>

                            <label>Açık Adres</label>
                            <textarea class="form-control  @if($errors->has('province')) is-invalid @endif" cols="30" rows="4" name="address" placeholder="Açık Adresinizi Yazınız..."></textarea>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">{{$errors->first('address')}}</div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>İl * </label>
                                    <input value="{{old('province')}}" type="text" class="form-control  @if($errors->has('province')) is-invalid @endif" name="province"  autocomplete="off">
                                    @if($errors->has('province'))
                                        <div class="invalid-feedback">{{$errors->first('province')}}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6">
                                    <label>İlçe * </label>
                                    <input value="{{old('city')}}" type="text" class="form-control  @if($errors->has('city')) is-invalid @endif" name="city" autocomplete="off">
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">{{$errors->first('city')}}</div>
                                    @endif
                                </div>

                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                <label class="custom-control-label" for="checkout-create-acc">Hesap Oluştur?</label>
                            </div>

                            <label>Sipariş Notunuz</label>
                            <textarea class="form-control" cols="30" name="note" rows="4" placeholder="Varsa sipariş ile ilgili notunuz"></textarea>
                        </div>
                        <aside class="col-lg-3 mt-3">
                            <div class="summary">
                                <h3 class="summary-title">Sepetiniz</h3>

                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>Ürün Adı</th>
                                        <th>Toplam</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach(Cart::instance('shopping')->content() as $cart)
                                    <tr>
                                        <td>   <a href="{{ route('urun', $cart->options->url) }}">{{ $cart->name }} X {{ $cart->qty }}</a></td>
                                        <td>{{ money($cart->qty * $cart->price)}}₺</td>
                                    </tr>
                                    @endforeach

                                    <tr class="summary-subtotal">
                                        <td>Ara Toplam:</td>
                                        <td>{{ money(Cart::instance('shopping')->subtotal()) }}₺</td>
                                    </tr>
                                    <tr>
                                        <td>Kargo Ücreti:</td>
                                        <td>{{ cargo(Cart::instance('shopping')->total()) }}</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{cargoToplam(Cart::instance('shopping')->total())}}</td>
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
                                        </div>
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ödemelerinizi IYZICO ödeme alt yapısı ile güvenli bir şekilde yapabilirsiniz.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Ödeme Yap</span>
                                    <span class="btn-hover-text">Ödeme Yap</span>
                                </button>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
