
<footer class="footer footer-2">

    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Ücretsiz Kargo</h3>
                            <p>99₺ ve üzeri</p>
                        </div>
                    </div>
                </div>

              {{--  <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> İade Garantisi</h3>
                            <p>15 gün içerisinde</p>
                        </div>
                    </div>
                </div>--}}

                <div class="col-sm-6 col-md-4">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Güvenli Ödeme</h3>
                            <p>256 Bit SSL Sertifikası</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Müşteri Hizmetleri</h3>
                            <p>Online Destek Sistemi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-newsletter bg-image" style="background-image: url(/frontend/assets/images/backgrounds/bg-2.jpg)">
        <div class="container">
            <div class="heading text-center">
                <h3 class="title">Haber Bülteminize Katılın</h3>
                <p class="title-desc">Sitemize yüklenen kitap ve ürünlerden ilk siz haberdar olun</p>
            </div>

            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <form action="{{ route('mailsubcribes') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input value="{{old('email_address')}}"
                                   name="email"
                                   class="form-control"
                                   placeholder="Email Adresinizi Giriniz">

                            <div class="input-group-append">
                                <button class="btn btn-primary"
                                        type="submit"
                                        id="newsletter-btn">
                                    <span>Abone Ol</span><i class="icon-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        @if($errors->has('email_address'))
                            <div class="invalid-feedback"
                                 style="display: block;color:white">
                                {{$errors->first('email_address')}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="widget widget-about">
                        <p>Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır </p>
                        <div class="widget-about-info">
                            <div class="row">
                                <div class="col-sm-12 col-12 d-flex">
                                    <div>
                                        <span class="widget-about-title">Müşteri Hizmetleri</span>
                                        <a href="tel:905350141875">0 535 014 18 75</a>
                                    </div>
                                    <div>
                                        <a href="https://kargotakip.sendeo.com.tr/kargo-takip-popup" target="_blank" title="Kargo Sorgulama">
                                            <img src="https://www.sendeo.com.tr/Assets/image/header/sendeo_logo_full.svg" alt="sendeo_logo_full"  width="200px">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-12 mt-3">
                                    <figure class="footer-payments">
                                        <img src="/frontend/assets/images/iyzico.png" alt="İyzico" >
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Bilgi Sayfaları</h4>
                        <ul class="widget-list">
                            <li><a href="#">Hakkımızda</a></li>
                            <li><a href="#">S.S.S</a></li>
                            <li><a href="{{ route('iletisim') }}">İletişim</a></li>
                            <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                            <li><a href="{{ route('register') }}">Kayıt Ol</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Müşteri Hizmetleri</h4>
                        <ul class="widget-list">
                            @foreach($Pages->where('category', 2) as $item)
                            <li><a href="{{ route('kurumsal', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Hesabım</h4>
                        <ul class="widget-list">
                            <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                            <li><a href="{{ route('sepet') }}">Sepetim</a></li>
                            <li><a href="#">Favorilerim</a></li>
                            <li><a href="https://kargotakip.sendeo.com.tr/kargo-takip-popup" target="_blank">Kargo Takip</a></li>
                            <li><a href="#">Yardım</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2022 Kitap Store. Tüm Hakları Saklıdır.</p>
            <ul class="footer-menu">
                <li><a href="#">Kvkk Bilgilendirme Metni</a></li>
                <li><a href="#">Gizlilik Politası</a></li>
            </ul>

            <div class="social-icons social-icons-color">
                <span class="social-label">Sosyal Medya</span>
                <a href="https://www.facebook.com/tbkitap" class="social-icon social-facebook" title="Facebook" target="_blank">
                    <i class="icon-facebook-f"></i></a>
                <a href="https://www.twitter.com/tbkitap" class="social-icon social-twitter" title="Twitter" target="_blank">
                    <i class="icon-twitter"></i></a>
                <a href="https://www.instagram.com/tbkitap" class="social-icon social-instagram" title="Instagram" target="_blank">
                    <i class="icon-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
