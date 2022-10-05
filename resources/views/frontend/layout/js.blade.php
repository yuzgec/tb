<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
<div class="mobile-menu-overlay"></div>
<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Arama</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Ürün Ara..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>
        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="{{ route('home') }}">Anasayfa</a>
                        </li>
                        @foreach($Product_Categories->where('parent_id' , 0) as $item)
                            <li><a href="{{ route('kategori', [$item->slug, 'id' => $item->id]) }}" class="">{{ $item->title }}</a>
                                @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                    <ul style="display: none;">
                                        @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)
                                            <li><a href="{{ route('kategori', [$item->slug, $itemm->slug,'id' => $itemm->id]) }}">{{ $itemm->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>

        </div>

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div>
    </div>
</div>

<script src="/frontend/assets/js/jquery.min.js"></script>
<script src="/frontend/assets/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/assets/js/jquery.hoverIntent.min.js"></script>
<script src="/frontend/assets/js/jquery.waypoints.min.js"></script>
<script src="/frontend/assets/js/superfish.min.js"></script>
<script src="/frontend/assets/js/owl.carousel.min.js"></script>
<script src="/frontend/assets/js/jquery.plugin.min.js"></script>
<script src="/frontend/assets/js/jquery.elevateZoom.min.js"></script>
<script src="/frontend/assets/js/bootstrap-input-spinner.js"></script>
<script src="/frontend/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/frontend/assets/js/jquery.countdown.min.js"></script>
<script src="/frontend/assets/js/main.js"></script>
<script src="/frontend/assets/js/demos/demo-2.js"></script>
<livewire:scripts />

