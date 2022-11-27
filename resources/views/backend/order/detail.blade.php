@extends('backend.layout.app')
@section('title', 'Siparişleri Listele')
@section('content')
    <div class="col-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sipariş Durumu - {{ $ShopCart->cart_id }}</h3>
            </div>
            <table class="table card-table table-vcenter">

                <tbody>
                <tr>
                    <td>Adı Soyadı</td>
                    <td>{{ $ShopCart->name.' '.$ShopCart->surname }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $ShopCart->email }}</td>
                </tr>

                <tr>
                    <td>Telefon</td>
                    <td>{{ $ShopCart->phone }}</td>
                </tr>

                <tr>
                    <td>Adres</td>
                    <td>{{ $ShopCart->address }}</td>
                </tr>

                <tr>
                    <td>İl-İlçe</td>
                    <td>{{ $ShopCart->province.' / '.$ShopCart->city }}</td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>

    <div class="col-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sipariş - {{ $ShopCart->basket_status }}</h3>
            </div>
            <table class="table card-table table-vcenter">

                <tbody>
                <tr>
                    <td>Sipariş Tarihi</td>
                    <td>{{ $ShopCart->created_at }}</td>
                </tr>
                <tr>
                    <td>Sipariş Toplamı</td>
                    <td>{{ $ShopCart->basket_total }}</td>
                </tr>
                <tr>
                    <td>Kargo</td>
                    <td>{{ $ShopCart->order_cargo }}</td>
                </tr>

                <tr>
                    <td>Sipariş Notu</td>
                    <td>{{ $ShopCart->note }}</td>
                </tr>

                <tr>
                    <td>Sipariş Durumu</td>
                    <td><span class="badge bg-blue">{{ $ShopCart->basket_status }}</span></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ürün Listesi</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Ürün ID</th>
                    <th>Ürün Adı</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                    <th>Toplam</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Order as $item)
                <tr>
                    <td><a href="{{ route('product.edit', $item->product_id) }}">{{ $item->product_id }}</a></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ money($item->price * $item->qty) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
