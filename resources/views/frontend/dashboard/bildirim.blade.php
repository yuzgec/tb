@extends('frontend.layout.app')
@section('title', 'Bildirim Ayarları | '.config('app.name'))

@section('content')
    <div class="page-content mt-2  ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">
                    @include('frontend.layout.dashboardsidebar')

                    <div class="col-md-9" >
                        <div class="row">

                            <div class="col-lg-4 text-center">
                                <div class="m-1 bg-light">
                                    <i class="icon-user" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary" style="font-size:18px">
                                        <a href="{{route('home.account')}}" class="text-white" title="Hesabım">Hesabım</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-center">
                                <div class="m-1  bg-light">
                                    <i class="icon-map-marker" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        <a href="{{route('home.account')}}" class="text-white" title="Adreslerim">Adreslerim</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-center">
                                <div class="m-1  bg-light">
                                    <i class="icon-star-o" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        <a href="{{route('home.account')}}" class="text-white" title="Siparişlerim">Siparişlerim</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-center">
                                <div class="m-1  bg-light">
                                    <i class="icon-user" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        <a href="{{route('home.account')}}" class="text-white" title="Profil Düzenle">Profil Düzenle</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-center">
                                <div class="m-1  bg-light">
                                    <i class="icon-cog" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary " style="font-size:18px">
                                        <a href="{{route('home.account')}}"  class="text-white" title="Bildirim Ayarları">Bildirim Ayarları</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 text-center">
                                <div class="m-1  bg-light">
                                    <i class="icon-close" style="font-size:50px"></i>
                                    <div class="card-footer bg-primary text-white" style="font-size:18px">
                                        <form id="logout" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a class="text-white"  href="javascript:{}" onclick="document.getElementById('logout').submit()">Güvenli Çıkış</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
