@extends('frontend.layout.app')
@section('title', 'Detaylı Arama | '.config('app.name'))
@section('content')


    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><b class="mr-2">Detaylı Arama</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    <div class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-9" style="border: #eeeeee 1px solid">
                   <form>
                       @csrf
                       <div class="row">
                           <div class="col-12">
                                <h3 class="card-title text-center mt-2 mb-3">Detaylı Kitap Arama</h3>
                           </div>


                          <div class="col-md-6 col-12">
                              <label>Kitap Adı</label>
                              <input class="form-control" name="" type="" placeholder="">

                              <label>Yazar</label>
                              <input class="form-control" name="" type="" placeholder="">

                              <label>Çeviren</label>
                              <input class="form-control" name="" type="" placeholder="">
                          </div>

                          <div class="col-md-6 col-12">
                                  <label>Kategori</label>
                                  <select class="form-control" data-placeholder="Kategori Seçiniz" name="category[]">
                                      @foreach($Product_Categories as $item)
                                          <option value="{{ $item->id }}">
                                              {{ ($item->parent_id == 0 ) ? $item->title : '-- '.$item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label>Yayınevi</label>
                                  <select class="form-control" data-placeholder="Kategori Seçiniz" name="category[]">
                                      @foreach($Publisher as $item)
                                          <option value="{{ $item->id }}">
                                              {{ ($item->parent_id == 0 ) ? $item->title : '-- '.$item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label>Dil</label>
                                  <select class="form-control" data-placeholder="Kategori Seçiniz" name="category[]">
                                      @foreach($Language as $item)
                                          <option value="{{ $item->id }}">
                                              {{ ($item->parent_id == 0 ) ? $item->title : '-- '.$item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label>Çeviren</label>
                                  <input class="form-control" name="" type="" placeholder="">
                              </div>
                           <div class="col-12 text-center">
                               <button class="btn btn-primary mb-4">Ara</button>
                           </div>
                       </div>
                   </form>

                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                Kategoriler
                            </h3>
                            <div class="mobile-menu-light">

                                <nav class="mobile-nav">
                                    <ul class="mobile-menu">

                                        @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                            <li>
                                                <a href="{{ route('kategori', $item->slug) }}" class="text-dark">
                                                    <i class="icon-angle-right"></i>{{ $item->title }}
                                                </a>
                                                @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                                    <ul style="display: none;">
                                                        @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)
                                                            <li>
                                                                <a href="{{ route('kategori', [$item->slug, $itemm->slug]) }}"
                                                                   class="text-dark">{{ $itemm->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

                                    </ul>
                                </nav>
                            </div>

                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>

@endsection
