@extends('frontend.layout.app')
@section('title', 'İletişim Bilgileri - TB Kitap')
@section('content')

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">İletişim</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <hr class="mt-1 mb-3 mt-md-1">

            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Adresimiz</h3>
                        <address>{{ config('settings.adres1') }}</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Telefon/Email</h3>

                        <div><a href="mailto:#">{{ config('settings.email1') }}</a></div>
                        <div><a href="tel:{{ config('settings.telefon1') }}">{{ config('settings.telefon1') }}</a></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Sosyal Medya</h3>

                        <div class="social-icons social-icons-color justify-content-center">
                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mb-3 mt-1">
            <div class="touch-container row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                        <h2 class="title mb-1">Bize Ulaşın</h2>
                    </div>

                    <form action="#" class="contact-form mb-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Adınız Soyadınız</label>
                                <input type="text" class="form-control" id="cname" placeholder="Adınız Soyadınız" required>
                            </div>


                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Telefon Numaranız</label>
                                <input type="tel" class="form-control" id="cphone" placeholder="Telefon Numaranız">
                            </div>
                        </div>

                        <label for="csubject" class="sr-only">Email Adresiniz</label>
                        <input type="text" class="form-control" id="csubject" placeholder="Email Adresiniz">

                        <label for="csubject" class="sr-only">Konu</label>
                        <input type="text" class="form-control" id="csubject" placeholder="Konu">

                        <label for="cmessage" class="sr-only">Mesajınız</label>
                        <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Mesajınız *"></textarea>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>GÖNDER</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
