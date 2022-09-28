@extends('frontend.layout.app')
@section('title', 'Profil Ayarları | '.config('app.name'))

@section('content')
    <div class="page-content mt-2  ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">
                    @include('frontend.dashboard.dashboardsidebar')

                    <div class="col-md-9" >
                        <div class="row">
                            <div class="col-md-12" >
                                <form action="#">
                                    <label>Adınız Soyadınız*</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                    <small class="form-text">Adınız hesap bölümünde ve incelemelerde bu şekilde görüntülenecektir.</small>
                                    <label>Email Adresiniz *</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                    <label>Geçerli şifre (değiştirmeden bırakmak için boş bırakın)</label>
                                    <input type="password" class="form-control">
                                    <label>Yeni şifre (değiştirmeden bırakmak için boş bırakın)</label>
                                    <input type="password" class="form-control">
                                    <label>Yeni Parolanız</label>
                                    <input type="password" class="form-control mb-2">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Değişiklikleri Kaydet</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
