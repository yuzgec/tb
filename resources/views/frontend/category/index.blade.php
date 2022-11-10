@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')
    @if(request('filtre') != 1)
    <div class="page-header text-center" style="background-image: url('/frontend/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">
                {{ $Detay->title }}
                <span>TB Kitap - 2.El Kitap Klübü</span>
            </h1>
        </div>
    </div>
    @endif

    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9" >
                    <div class="toolbox" >
                        @if(request('filtre') != 1)
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                ({{$ProductList->count()}}) adet ürün listelenmiştir.
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sıralama:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control" onchange="location = this.options[this.selectedIndex].value">
                                        <option value="yenieklenen">Yeni Eklenenler</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&fiyat=asc" {{ (request('fiyat') == 'asc') ? 'selected' : null }}>Düşük Fiyat</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&fiyat=desc" {{ (request('fiyat') == 'desc') ? 'selected' : null }}>Yüksek Fiyat</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&ad=asc" {{ (request('ad') == 'asc') ? 'selected' : null }}>Eser Adı A-Z</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&ad=desc" {{ (request('ad') == 'desc') ? 'selected' : null }}>Eser Adı Z-A</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&basimtarihi=asc" {{ (request('basimtarihi') == 'asc') ? 'selected' : null }}>Basım Tarihi Eski</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&basimtarihi=desc" {{ (request('basimtarihi') == 'desc') ? 'selected' : null }}>Basım Tarihi Yeni</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                            @if(request('filtre') == 1)
                                <div class="d-flex">
                                    @if($request->filled('dil'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil=&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1={{ request('yil1') }}&yil2={{ request('yil2') }}"
                                           class="btn btn-primary btn-block d-flex flex-column  justify-content-between m-1 rounded" style="font-size:13px"> <small>Dil</small>
                                            <div> @foreach($Language->where('id', $request->dil) as $item) {{ $item->title }}  @endforeach</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                    @if($request->filled('yazar'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar=&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1={{ request('yil1') }}&yil2={{ request('yil2') }}"
                                           class="btn btn-primary btn-block d-flex flex-column justify-content-between m-1 rounded" style="font-size:13px"> <small>Yazar</small>
                                            <div> @foreach($Author->where('id', $request->yazar) as $item) {{ $item->title }}  @endforeach</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                    @if($request->filled('cevirmen'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen=&yayinevi={{ request('yayinevi') }}&yil1={{ request('yil1') }}&yil2={{ request('yil2') }}"
                                           class="btn btn-primary btn-block d-flex flex-column justify-content-between m-1 rounded" style="font-size:13px"><small>Çevirmen</small>
                                            <div> @foreach($Translator->where('id', $request->cevirmen) as $item) {{ $item->title }}  @endforeach</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                    @if($request->filled('yayinevi'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi=&yil1={{ request('yil1') }}&yil2={{ request('yil2') }}"
                                           class="btn btn-primary btn-block d-flex flex-column justify-content-between m-1 rounded" style="font-size:13px"><small>Yayınevi</small>
                                            <div> @foreach($Publisher->where('id', $request->yayinevi) as $item) {{ $item->title }}  @endforeach</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                    @if($request->filled('yil1'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1=&yil2={{ request('yil2') }}"
                                           class="btn btn-primary  d-flex justify-content-between flex-column m-1 rounded"  style="font-size:13px"> <small>Basim Tarihi</small>
                                            <div> {{ request('yil1') }}</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                    @if($request->filled('yil2'))
                                        <a href="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1={{ request('yil1') }}&yil2="
                                           class="btn btn-primary  d-flex justify-content-between flex-column m-1 rounded"  style="font-size:13px"> <small>Basim Tarihi</small>
                                            <div> {{ request('yil2') }}</div>
                                            <div> <i class="icon-close"></i> </div>
                                        </a>
                                    @endif
                                </div>
                            @endif
                    </div>

                    <div class="products mb-3">
                        <div class="row">
                            @foreach($ProductList as $item)
                            <div class="col-6 col-md-4">
                                <x-shop.product-item :item="$item"/>
                            </div>
                            @endforeach
                        </div>

                        <div class="row ">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                {{ $ProductList->appends(['id'=>$Detay->id , 'siralama' => 'urunler' ]) }}
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="col-lg-3 col-xl-5col order-lg-first p-3"
                       style="border:2px solid #f4f4f4;border-radius: 5px">
                    <div class="sidebar sidebar-shop" >
                        <div class="widget widget-categories" >

                            <div class="widget-body">
                                <div class="accordion mt-2" id="widget-cat-acc">
                                    @foreach($Product_Categories->where('slug' , request()->segment(2)) as $item)
                                    <div class="acc-item">
                                        <h5>
                                            <a role="button"  href="{{route('kategori', [$item->slug,  'id' => $item->id])}}" >
                                                {{ $item->title }}
                                            </a>
                                        </h5>
                                        @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                        <div id="{{$item->slug}}" class="collapse {{ (request()->segment(2) == $item->slug) ? 'show' : null  }}" data-parent="#widget-cat-acc">
                                            <div class="collapse-wrap">
                                                <ul>
                                                    @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)

                                                       <li>
                                                           <a href="{{ route('kategori',  [$item->slug, $itemm->slug,'id' => $itemm->id]) }}">
                                                               {{ $itemm->title }}
                                                           </a>
                                                       </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

               {{--         <form method="get" >
                            <input type="hidden" name="id"  value="{{ $Detay->id }}">
                            <input type="hidden" name="filtre"  value="1">--}}


                            <div class="widget">

                                <h3 class="widget-title">Dİl</h3>

                                <div class="widget-body">

                                    <select class="form-control single" data-placeholder="Dİl Seçiniz" name="dil" onchange="location = this.options[this.selectedIndex].value;">
                                        <option value="">Dİl Seçiniz</option>
                                        @foreach($Language as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ $item->id }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1=1800&yil2=2022">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Yazar</h3>
                                <div class="widget-body">
                                    <select class="form-control single" data-placeholder="Yazar Seçiniz" name="yazar" onchange="location = this.options[this.selectedIndex].value;">
                                        <option value="">Yazar Seçiniz</option>
                                        @foreach($Author as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ $item->id }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1=1800&yil2=2022">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Çevirmen</h3>
                                <div class="widget-body">

                                    <select class="form-control single" data-placeholder="Çevirmen Seçiniz" name="cevirmen" onchange="location = this.options[this.selectedIndex].value;">
                                        <option value="">Çevirmen Seçiniz</option>
                                        @foreach($Translator as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ $item->id }}&yayinevi={{ request('yayinevi') }}&yil1=1800&yil2=2022">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Yayınevi</h3>
                                <div class="widget-body">
                                    <select class="form-control single" data-placeholder="Yayınevi Seçiniz" name="yayinevi" onchange="location = this.options[this.selectedIndex].value;">
                                        <option value="">Yayınevi Seçiniz</option>
                                        @foreach($Publisher as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ $item->id }}&yil1=1800&yil2=2022">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Basım Yılı</h3>
                                <div class="widget-body">
                                    <select class="form-control single" data-placeholder="Yıl Seçiniz" name="yil1" onchange="location = this.options[this.selectedIndex].value;">
                                        @foreach($Years as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1={{ $item->title }}&yil2=2022">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select class="form-control single" data-placeholder="Yıl Seçiniz" name="yil2" onchange="location = this.options[this.selectedIndex].value;">
                                        @foreach($Years->sortbyDesc('id') as $item)
                                            <option value="?id={{ $Detay->id }}&filtre=1&dil={{ request('dil') }}&yazar={{ request('yazar') }}&cevirmen={{ request('cevirmen') }}&yayinevi={{ request('yayinevi') }}&yil1={{ (request('yil1')) ?  request('yil1') : 1800 }}&yil2={{ $item->title }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Kondisyon</h3>

                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="cus-rating-1" name="kondisyon" value="5" @if (request('kondisyon') === 5) ? checked : null @endif">
                                                <label class="custom-control-label" for="cus-rating-1">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 100%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="cus-rating-2" name="kondisyon" value="4" {{ (request('kondisyon') === 4) ? checked : null }}">
                                                <label class="custom-control-label" for="cus-rating-2">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 80%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="cus-rating-3" name="kondisyon" value="3">
                                                <label class="custom-control-label" for="cus-rating-3">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 60%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="cus-rating-4" name="kondisyon" value="2">
                                                <label class="custom-control-label" for="cus-rating-4">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 40%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="cus-rating-5" name="kondisyon" value="1">
                                                <label class="custom-control-label" for="cus-rating-5">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 20%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mb-1 btn-block">Filtrele</button>
                                        <a href="{{ url()->current() }}?id={{$Detay->id}}" class="btn btn-primary btn-block" id="reset">Reset</a>

                                    </div>
                                </div>
                            </div>
                    {{--    </form>--}}
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/frontend/assets/css/select2.css" rel="stylesheet" />
@endsection
@section('customJS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.single').select2({
                theme: "bootstrap"
            });
        });

        document.getElementById('reset').reset();

    </script>
@endsection


