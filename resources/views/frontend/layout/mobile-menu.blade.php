<aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvokerMenu">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset pb-0">
                <!-- Toggle Button -->
                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                    <button type="button" class="close ml-auto"
                            aria-controls="sidebarHeader"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-unfold-event="click"
                            data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarHeader1"
                            data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInLeft"
                            data-unfold-animation-out="fadeOutLeft"
                            data-unfold-duration="500">
                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                    </button>
                </div>

                <div class="js-scrollbar u-sidebar__body">
                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                        <!-- Logo -->
                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="{{ route('home') }}" aria-label="{{ config('app.name') }}">
                            <img src="/frontend/assets/img/logo1.png" class="img-fluid"  alt="{{ config('app.name') }}" width="300px"/>
                        </a>

                        <ul class="u-header-collapse__nav">
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link font-size-16 font-weight-bold" href="{{ route('home') }}">
                                    Anasayfa
                                </a>
                            </li>
                            @foreach($Product_Categories as $item)
                                <li class="u-has-submenu u-header-collapse__submenu ml-2">
                                    <a class="u-header-collapse__nav-link font-size-16 font-weight-bold" href="{{ route('kategori', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link font-size-16 font-weight-bold" href="{{ route('home') }}">
                                    Hakkımızda
                                </a>
                            </li>
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link font-size-16 font-weight-bold" href="{{ route('home') }}">
                                    İletişim
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
