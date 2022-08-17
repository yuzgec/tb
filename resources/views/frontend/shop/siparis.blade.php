@extends('frontend.layout.app')
@section('title', 'Siparişi Tamamla | '.config('app.name'))
@section('content')

    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Siparişi Tamamla</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
            <form action="{{ route('kaydet') }}" method="POST">
                @csrf()
                <div class="row">
                    <div class="col-lg-7">
                        <div class="pb-2 mb-2">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">İletişim <b>Bilgileri</b></h3>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Adınız
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input value="{{old('name')}}" type="text" class="form-control  @if($errors->has('name')) is-invalid @endif" name="name" placeholder="Adınız" autocomplete="off">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Soyadınız
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input value="{{old('surname')}}" type="text" class="form-control @if($errors->has('surname')) is-invalid @endif" name="surname" placeholder="Soyadınız" autocomplete="off">
                                        @if($errors->has('surname'))
                                            <div class="invalid-feedback">{{$errors->first('surname')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Email Adresiniz
                                        </label>
                                        <input value="{{old('email')}}" type="text" class="form-control @if($errors->has('email')) is-invalid @endif"  name="email" placeholder="Email. Zorunlu Değildir">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Telefon Numaranız <span class="text-danger">*</span>
                                        </label>
                                        <input value="{{old('phone')}}" type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone" placeholder="Telefon Numaranız">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Açık Adresiniz<span class="text-danger">*</span>
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5 @if($errors->has('address')) is-invalid @endif" rows="4" name="address" placeholder="Açık Adresinizi Yazınız">{{old('address')}}</textarea>
                                            @if($errors->has('address'))
                                                <div class="invalid-feedback">{{$errors->first('address')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            İl
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control @if($errors->has('province')) is-invalid @endif" name="province">
                                            <option value="">İl Seçiniz</option>
                                            @foreach($Province as $item)
                                                <option value="{{ $item->sehir_title }}" {{ (old('province') == $item->sehir_title) ? 'selected' : null }} }}>{{ $item->sehir_title }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('province'))
                                            <div class="invalid-feedback">{{$errors->first('province')}}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            İlçe <span class="text-danger">*</span>
                                        </label>
                                        <input value="{{old('city')}}" type="text" class="form-control @if($errors->has('city')) is-invalid @endif"  name="city" placeholder="İlçe">
                                        @if($errors->has('city'))
                                            <div class="invalid-feedback">{{$errors->first('city')}}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="js-form-message mb-3">
                                        <label class="form-label">
                                            Sipariş Notu
                                        </label>
                                        <div class="input-group">
                                            <textarea  class="form-control p-5" rows="4" name="note" placeholder=" Varsa Sipariş ile ilgili notunuz"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 mb-7 mb-lg-0">
                        <div class="pl-lg-3 ">
                            <div class="bg-gray-1 rounded-lg">
                                <div class="p-4 mb-4 checkout-table">
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title mb-0 pb-2 font-size-25">Sepetiniz</h3>
                                    </div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Ürün Adı</th>
                                            <th class="product-total">Fiyatı</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::content() as $cart)
                                            <tr class="cart_item">
                                                <td>{{ $cart->name }} <strong class="product-quantity">× {{ $cart->qty }}</strong></td>
                                                <td>{{ money($cart->qty *  $cart->price)  }}₺</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Ara Toplam</th>
                                            <td>{{money(Cart::subtotal())}}₺</td>
                                        </tr>
                                        <tr>
                                            <th>Kargo</th>
                                            <td>{{ cargo(Cart::total()) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Toplam</th>
                                            <td><strong>{{cargoToplam(Cart::total())}}₺</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                        <div id="basicsAccordion1">
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="stylishRadio1" name="stylishRadio" checked>
                                                        <label class="custom-control-label form-label" for="stylishRadio1"
                                                               data-toggle="collapse"
                                                               data-target="#basicsCollapseOnee"
                                                               aria-expanded="true"
                                                               aria-controls="basicsCollapseOnee">
                                                            Kapıda Ödeme
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                     aria-labelledby="basicsHeadingOne"
                                                     data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Siparişinizin ödemesini kapıda nakit olarak kolayca ve güvenli bir şekilde yapabilirsiniz.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Siparişi Tamamla</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <div class="col">
                <ul class="row list-unstyled products-group no-gutters">
                    @foreach($Product as $item)
                        <li class="col-6 col-md-3 product-item p-1">
                            <div class="js-slide products-group">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3 border border-width-1 border-purple borders-radius-5">
                                        <div class="product-item__body pb-xl-2">
                                            <h5 class="mb-1 product-item__title">
                                                <a href="{{ route('urun', $item->slug) }}" class="text-gray-60  font-weight-bold" title="{{ $item->title }}"> {{ $item->title }}</a>
                                            </h5>
                                            <div class="mb-2">
                                                <a href="{{ route('urun', $item->slug) }}" class="d-block text-center" title="{{ $item->title }}">
                                                    <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/frontend/resimyok.jpg': $item->getFirstMediaUrl('page', 'thumb')}}" alt="{{ $item->title }}">
                                                </a>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mb-1 text-center">
                                                <div class="prodcut-priceflex-wrap position-relative text-center">
                                                    <div class="text-center">
                                                        <ins class="font-size-20 text-black text-decoration-none mr-2 font-weight-bold text-center">
                                                            {{ money($item->price) }}₺ -
                                                            <del class="font-size-1">
                                                                {{ money($item->old_price) }}
                                                            </del>
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item__footer">
                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                <a  class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Süper Hızlı Gönderi</a>
                                                <a  class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Ücretsiz Kargo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
    </div>
@endsection
