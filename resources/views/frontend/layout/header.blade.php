<header class="header header-2 header-intro-clearance">

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="/" class="logo">
                    <img src="{{asset('/frontend/assets/images/tblogo.jpg')}}" width="150px">
                </a>
            </div>

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Arama</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Ürün Ara ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="header-right">
                <div class="account">
                    <a href="/" title="My account">
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                        <p>Hesabım</p>
                    </a>
                </div>

                <div class="wishlist">
                    <a href="/" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">3</span>
                        </div>
                        <p>Favori</p>
                    </a>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">2</span>
                        </div>
                        <p>Sepetim</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="{{ route('urunler')}}">Ürün Adı</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x 76.00₺
                                    </span>
                                </div>

                                <figure class="product-image-container">
                                    <a href="{{ route('urunler')}}" class="product-image">
                                        <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Toplam</span>
                            <span class="cart-total-price">76.00₺</span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="/" class="btn btn-primary">Sepetim</a>
                            <a href="/" class="btn btn-outline-primary-2"><span>Ödeme</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="col-12">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="/" class="sf-with-ul">Türk Edebiyatı</a>

                            <ul>
                                <li><a href="/">Roman</a></li>
                                <li><a href="/">Hikaye</a></li>
                                <li><a href="/">Şiir</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/" class="sf-with-ul">Dünya Edebiyatı</a>

                            <ul>
                                <li><a href="/">Roman</a></li>
                                <li><a href="/">Hikaye</a></li>
                                <li><a href="/">Şiir</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/" class="sf-with-ul">İlk Baskılar</a>

                            <ul>
                                <li><a href="/">Roman</a></li>
                                <li><a href="/">Hikaye</a></li>
                                <li><a href="/">Şiir</a></li>
                            </ul>
                        </li>
                        <li><a href="/" class="">İmzalılar</a></li>
                        <li><a href="/" class="">Yabancı Dil</a></li>
                        <li><a href="/" class="">Baskısı Olmayanlar</a></li>
                        <li><a href="/" class="">Özel Baskılar</a></li>
                        <li><a href="/" class="">Sanat</a></li>
                        <li><a href="/" class="">Plak</a></li>
                        <li><a href="/" class="">Dini Kitaplar</a></li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
            </div><!-- End .header-left -->


        </div><!-- End .container -->
    </div><!-- End .header-bottom -->

</header>
