
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-status-bottom bg-primary"></div>
                    <div class="card-body p-2 text-center ">
                        <div class="demo-icon-preview">
                            <div data-icon-preview-icon="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                            </div>
                        </div>
                        <div class="text-h3 m-0 font-weight-bold">[{{ $Pages->count() }}] Sayfa</div>
                        <div class="text-muted mb-3">
                            <a href="{{route('page.index')}}" title="Sayfa Yönetimi" class="btn btn-outline-tabler btn-sm ">
                                Sayfa Yönetimi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-status-bottom bg-primary"></div>
                    <div class="card-body p-2 text-center ">
                        <div class="demo-icon-preview">
                            <div data-icon-preview-icon="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="7" width="18" height="13" rx="2" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><line x1="12" y1="12" x2="12" y2="12.01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                            </div>
                        </div>
                        <div class="text-h3 m-0 font-weight-bold">[{{ $Product->count() }}] Ürün</div>
                        <div class="text-muted mb-3">
                            <a href="{{route('product.index')}}" title="Ürün Yönetimi" class="btn btn-outline-tabler btn-sm ">
                                Ürün Yönetimi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-status-bottom bg-primary"></div>
                    <div class="card-body p-2 text-center ">
                        <div class="demo-icon-preview">
                            <div data-icon-preview-icon="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="9" x2="10" y2="9" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="9" y1="17" x2="15" y2="17" /></svg>
                            </div>
                        </div>
                        <div class="text-h3 m-0 font-weight-bold">[{{ $Product_Categories->count() }}] Kategori</div>
                        <div class="text-muted mb-3">
                            <a href="{{route('product-categories.index')}}" title="Blog Yönetimi" class="btn btn-outline-tabler btn-sm ">
                                Ürün Kategori Yönetimi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-status-bottom bg-primary"></div>
                    <div class="card-body p-2 text-center ">
                        <div class="demo-icon-preview">
                            <div data-icon-preview-icon="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="13 3 13 10 19 10 11 21 11 14 5 14 13 3" /></svg>
                            </div>
                        </div>
                        <div class="text-h3 m-0 font-weight-bold">[{{ $Project}}] Proje</div>
                        <div class="text-muted mb-3">
                            <a href="{{route('project.index')}}" title="Proje Yönetimi" class="btn btn-outline-tabler btn-sm ">
                                Proje Yönetimi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="card mt-2" style="height: calc(24rem + 10px)">

            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <h4 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" /><path d="M3 6l9 6l9 -6" /><path d="M15 18h6" /><path d="M18 15l3 3l-3 3" /></svg>
                    İletişim Formu [{{$Activity->count()}}]
                    <br>
                    <small style="font-size: 10px" class="badge bg-azure text-capitalize">Okunmamış Mesajlarınız Var</small>
                </h4>
                <div class="divide-y">
                    @foreach($Activity as $item)
                    <div>
                        <div class="row">
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Jeffie Lewzey</strong> commented on your post.
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="text-muted">12 Saat Önce</div>
                                    <div class="text-muted badge text-black">İletişim</div>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-success"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
