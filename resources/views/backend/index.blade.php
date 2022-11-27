@extends('backend.layout.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-3">Kullanılan Alan <strong>276MB </strong>of 8 GB</p>
                <div class="progress progress-separated mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: 19%"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 9%"></div>
                </div>
                <div class="row">
                    <div class="col-auto d-flex align-items-center pe-2">
                        <span class="legend me-2 bg-primary"></span>
                        <span>Regular</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-info"></span>
                        <span>System</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-success"></span>
                        <span>Shared</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center ps-2">
                        <span class="legend me-2"></span>
                        <span>Free</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            ({{$Product}}) adet Ürün
                                        </div>
                                        <div class="text-muted">
                                            <a href="{{ route('product.index') }}">Ürünlere Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            ({{$Product_Categories}}) adet Kategori
                                        </div>
                                        <div class="text-muted">
                                            <a href="{{ route('product-categories.index') }}">Kategorilere Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            ({{$Author}}) adet Yazar
                                        </div>
                                        <div class="text-muted">
                                            <a href="{{ route('product-categories.index') }}">Yazarlara Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            ({{$Publisher}}) adet Yayınevi
                                        </div>
                                        <div class="text-muted">
                                            <a href="{{ route('publisher.index') }}">Yazarlara Git</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            (1) adet Onay Bekleyen Sipariş
                                        </div>
                                        <div class="text-muted">
                                            Onay Bekleyen Siparişlere Git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            (1) adet Bekleyen Sipariş
                                        </div>
                                        <div class="text-muted">
                                            Bekleyen Siparişlere Git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            (1) adet İptal Sipariş
                                        </div>
                                        <div class="text-muted">
                                            İptal Siparişlere Git
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Tüm Siparişler
                                </div>
                                <div class="text-muted">
                                    Raporlama Ekranına Git
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>

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
                        <td> {{ $item->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('order.orderDetails', $item->cart_id) }}"> İncele</a></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="col-12 col-md-9 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">En Çok Bakılan Kitaplar</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Kitap Adı</th>
                    <th colspan="2">Ziyaret Sayısı</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kitap Adı</td>
                        <td>3,550</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-12 col-md-3 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aranan Kelimeler</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Aranan Kelime</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Search as $item)
                <tr>
                    <td>{{ $item->key }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

