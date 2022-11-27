@extends('backend.layout.app')
@section('title', 'Siparişleri Listele')
@section('content')
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Siparişler</h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                        <th class="w-1">No.
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
                        </th>
                        <th>İsim </th>
                        <th>Telefon</th>
                        <th>İl-İlçe</th>
                        <th>Durumu</th>
                        <th>Fiyat</th>
                        <th>Kargo</th>
                        <th>Ürün Sayısı</th>
                        <th>Tarih</th>
                        <th>Eylemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Order as $item)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                            <td><span class="text-muted">{{ $item->cart_id }}</span></td>
                            <td>{{ $item->name }}</td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->province.' - '.$item->city }}
                            </td>
                            <td>
                                <span class="badge bg-success me-1"></span> Sipariş Hazırlanıyor
                            </td>
                            <td>
                                {{ money($item->basket_total) }}₺
                            </td>

                            <td>{{ money($item->order_cargo) }}₺</td>
                            <td><span class="badge bg-success">{{ $item->get_order_count }} Ürün</span></td>
                            <td> {{ $item->created_at}}</td>
                            <td><a href="{{ route('order.orderDetails', $item->cart_id) }}"> İncele</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
