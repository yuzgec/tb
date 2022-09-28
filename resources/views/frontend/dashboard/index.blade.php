@extends('frontend.layout.app')
@section('title', Auth::user()->name.' | Yönetim Anasayfa')
@section('content')
    <div class="page-content mt-2  ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">
                    @if(auth()->user()->isAdmin ==2)
                        <div class="col-md-12 pl-2">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a  href="javascript:{}" onclick="document.getElementById('logout').submit()">
                                    <div class="m-1  bg-light">
                                        <i class="icon-close" style="font-size:50px"></i>
                                        <div class="card-footer bg-primary text-white" style="font-size:18px">
                                            Güvenli Çıkış
                                        </div>
                                    </div>
                                </a>
                            </form>
                            <table class="table table-wishlist table-mobile">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Fiyat</th>
                                    <th>Kampanya</th>
                                    <th>Mecra</th>
                                    <th>Sipariş Tarihi</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($infOrder as $item)
                                    <tr>
                                        <td class="price-col">{{$item->basketId}}</td>
                                        <td class="price-col">{{$item->basketTotal}}</td>
                                        <td class="price-col">{{$item->orderCampaign}}</td>
                                        <td class="price-col">{{$item->orderMedium}}</td>
                                        <td class="price-col">{{$item->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                   @include('frontend.layout.dashboardsidebar')
                    <div class="col-md-9" >
                        <div class="row">

                            <div class="col-lg-4 text-center">
                                <a href="{{route('home.profilim')}}" title="Hesabım">
                                <div class="m-1 bg-light">
                                    <i class="icon-user" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        Hesabım
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-lg-4 text-center">
                                <a href="{{route('adres.index')}}" title="Adreslerim">
                                    <div class="m-1  bg-light">
                                        <i class="icon-map-marker" style="font-size:50px"></i>
                                        <div class="card-footer bg-primary text-white" style="font-size:18px">
                                            Adreslerim
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 text-center">
                                <a href="{{route('home.siparislerim')}}" title="Siparişlerim">
                                    <div class="m-1  bg-light">
                                        <i class="icon-star-o" style="font-size:50px"></i>
                                        <div class="card-footer bg-primary text-white" style="font-size:18px">
                                            Siparişlerim
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 text-center">
                                <a href="{{route('home.account')}}"  title="Profil Düzenle">
                                    <div class="m-1  bg-light">
                                        <i class="icon-user" style="font-size:50px"></i>
                                        <div class="card-footer bg-primary text-white" style="font-size:18px">
                                            Profil Düzenle
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 text-center">
                                <a href="{{route('home.account')}}" title="Bildirim Ayarları">
                                <div class="m-1  bg-light">
                                    <i class="icon-cog" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        Bildirim Ayarları
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-lg-4 text-center">
                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a  href="javascript:{}" onclick="document.getElementById('logout').submit()">
                                        <div class="m-1  bg-light">
                                            <i class="icon-close" style="font-size:50px"></i>
                                            <div class="card-footer bg-primary text-white" style="font-size:18px">
                                                Güvenli Çıkış
                                            </div>
                                        </div>
                                    </a>
                                </form>
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
