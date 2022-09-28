@extends('frontend.layout.app')
@section('title', 'Siparişlerim | '.config('app.name'))

@section('content')
    <div class="page-content mt-2   ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">



                    @include('frontend.layout.dashboardsidebar')

                    <div class="col-md-9 pl-2">
                        <table class="table table-wishlist table-mobile">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Tarihi</th>
                                    <th class="text-center">Toplam</th>
                                    <th>Sipariş Durumu</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($all as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <h3 class="product-title">
                                                {{ $item->basketId }}
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="price-col">{{$item->created_at}}</td>
                                    <td class="price-col text-center">{{$item->basketTotal}}₺</td>
                                    <td class="price-col">{{ $item->basketStatus }}</td>
                                    <td class="action-col">
                                        <a class="btn btn-primary" href="{{ route('home.siparisdetay', $item->basketId) }}">
                                            <i class="icon-list-alt"></i>İncele
                                        </a>
                                    </td>
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
