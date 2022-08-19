<footer class="footer footer-2">

    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
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

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Ücretsiz Kargo</h3>
                            <p>99₺ ve üzeri</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Ücretsiz Kargo</h3>
                            <p>99₺ ve üzeri</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title"> Ücretsiz Kargo</h3>
                            <p>99₺ ve üzeri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-newsletter bg-image" style="background-image: url(/frontend/assets/images/backgrounds/bg-2.jpg)">
        <div class="container">
            <div class="heading text-center">
                <h3 class="title">Haber Bülteminize Katılın</h3><!-- End .title -->
                <p class="title-desc">Sitemize yüklenen kitap ve ürünlerden ilk siz haberdar olun</p><!-- End .title-desc -->
            </div>

            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <form action="#">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email Adresinizi Giriniz" aria-label="Email Adress" aria-describedby="newsletter-btn" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="newsletter-btn"><span>Abone Ol</span><i class="icon-long-arrow-right"></i></button>
                            </div>
                        </div>
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
                                <div class="col-sm-12 col-12">
                                    <span class="widget-about-title">Müşteri Hizmetleri</span>
                                    <a href="tel:123456789">0 212 222 22 22</a>
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
                            <li><a href="">Hakkımızda</a></li>
                            <li><a href="#">S.S.S</a></li>
                            <li><a href="">İletişim</a></li>
                            <li><a href="">Giriş Yap</a></li>
                            <li><a href="">Kayıt Ol</a></li>
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
                            <li><a href="#">Giriş Yap</a></li>
                            <li><a href="cart.html">Sepetim</a></li>
                            <li><a href="#">Favorilerim</a></li>
                            <li><a href="#">Kargo Takip</a></li>
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
                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
            </div>
        </div>
    </div>
</footer>
