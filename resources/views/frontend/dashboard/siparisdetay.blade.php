@extends('frontend.layout.app')
@section('title', 'Siparis Detayı | '. config('app.name'))

@section('content')
    <div class="page-content mt-2  ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">
                    @include('frontend.layout.dashboardsidebar')
                    <div class="col-md-9" >
                        <table class="table table-wishlist table-mobile">
                                <thead>
                                <tr>
                                    <th>Ürün Adı</th>
                                    <th>Adet</th>
                                    <th>Fiyat</th>
                                    <th>Toplam</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($detay as $item)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">

                                                <h3 class="product-title">
                                                    {{ $item->orderProductName }}
                                                </h3>

                                            </div>
                                        </td>
                                        <td class="price-col">{{$item->orderProductQty}}</td>
                                        <td class="price-col">{{ $item->orderProductPrice }}₺</td>
                                        <td class="price-col">{{ $item->orderProductPrice * $item->orderProductQty}}₺</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
