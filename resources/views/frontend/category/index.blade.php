@extends('frontend.layout.app')
@section('content')
    @include('backend.layout.alert')

    <div class="page-header text-center" style="background-image: url('/frontend/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">
                {{ $Detay->title }}
                <span>TB Kitap - 2.El Kitap Klübü</span>
            </h1>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9" >
                    <div class="toolbox" >
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                ({{$ProductList->total()}}) adet ürün listelenmiştir.
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sıralama:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control" onchange="location = this.options[this.selectedIndex].value">
                                        <option value="yenieklenen">Yeni Eklenenler</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&fiyat=asc" {{ (request('fiyat') == 'asc') ? 'selected' : null }}>Düşük Fiyat</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&fiyat=desc" {{ (request('fiyat') == 'asc') ? 'selected' : null }}>Yüksek Fiyat</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&ad=asc" {{ (request('ad') == 'asc') ? 'selected' : null }}>Eser Adı A-Z</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&ad=desc" {{ (request('ad') == 'desc') ? 'selected' : null }}>Eser Adı Z-A</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&basimtarihi=asc" {{ (request('basimtarihi') == 'asc') ? 'selected' : null }}>Basım Tarihi Eski</option>
                                        <option value="{{ url()->current() }}?id={{ $Detay->id }}&basimtarihi=desc" {{ (request('basimtarihi') == 'desc') ? 'selected' : null }}>Basım Tarihi Yeni</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                       style="border:1px solid #f4f4f4;border-radius: 5px">
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
                        <form method="get" >
                            @csrf
                            <div class="widget">
                                <h3 class="widget-title">Dİl</h3>

                                <div class="widget-body">

                                    <select class="form-control single" data-placeholder="Dİl Seçiniz" name="dil">
                                        <option value="">Dİl Seçiniz</option>
                                        @foreach($Language as $item)
                                            <option value="{{ $item->id }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Yazar</h3>
                                <div class="widget-body">

                                    <select class="form-control single" data-placeholder="Yazar Seçiniz" name="yazar">
                                        <option value="">Yazar Seçiniz</option>
                                        @foreach($Author as $item)
                                            <option value="{{ $item->id }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Çevirmen</h3>
                                <div class="widget-body">

                                    <select class="form-control single" data-placeholder="Çevirmen Seçiniz" name="cevirmen">
                                        <option value="">Çevirmen Seçiniz</option>
                                        @foreach($Translator as $item)
                                            <option value="{{ $item->id }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Yayınevi</h3>
                                <div class="widget-body">
                                    <select class="form-control single" data-placeholder="Yayınevi Seçiniz" name="yayinevi">
                                        <option value="">Yayınevi Seçiniz</option>
                                        @foreach($Publisher as $item)
                                            <option value="{{ $item->id }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="widget">
                                <h3 class="widget-title">Basım Yılı</h3>
                                <div class="widget-body">
                                    <select class="form-control single" data-placeholder="Yıl Seçiniz" name="yil1">
                                        @foreach($Years as $item)
                                            <option value="{{ $item->id }}">
                                                {{  $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select class="form-control single" data-placeholder="Yıl Seçiniz" name="yil2">
                                        @foreach($Years->sortbyDesc('id') as $item)
                                            <option value="{{ $item->id }}">
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
                                                <input type="checkbox" class="custom-control-input" id="cus-rating-1" name="kondisyon">
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
                                                <input type="checkbox" class="custom-control-input" id="cus-rating-2" name="kondisyon">
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
                                                <input type="checkbox" class="custom-control-input" id="cus-rating-3" name="kondisyon">
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
                                                <input type="checkbox" class="custom-control-input" id="cus-rating-4" name="kondisyon">
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
                                                <input type="checkbox" class="custom-control-input" id="cus-rating-5" name="kondisyon">
                                                <label class="custom-control-label" for="cus-rating-5">
                                                    <span class="ratings-container">
                                                        <span class="ratings">
                                                            <span class="ratings-val" style="width: 20%;"></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Filtrele</button>

                                    </div>
                                </div>
                            </div>
                        </form>
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
    </script>
@endsection


