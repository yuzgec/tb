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
                   <form action="{{ route('detayliaramasonuc') }}" method="get">

                       <div class="row">
                           <div class="col-12">
                                <h3 class="card-title text-center mt-2 mb-3">Detaylı Kitap Arama</h3>
                           </div>


                          <div class="col-md-6 col-12">
                              <label>Kitap Adı</label>
                              <input class="form-control" name="ad" type="text" placeholder="Kitap Adı">

                              <label>Yazar</label>
                              <select class="form-control single" data-placeholder="Yazar Seçiniz" name="yazar">
                                  <option value="">Yazar Seçiniz</option>
                                  @foreach($Author as $item)
                                      <option value="{{ $item->id }}">
                                          {{  $item->title }}
                                      </option>
                                  @endforeach
                              </select>

                              <label  class="mt-2">Çeviren</label>
                              <select class="form-control single" data-placeholder="Çeviren Seçiniz" name="ceviren">
                                  <option value="">Çeviren Seçiniz</option>
                                  @foreach($Translator as $item)
                                      <option value="{{ $item->id }}">
                                          {{  $item->title }}
                                      </option>
                                  @endforeach
                              </select>
                              <div class="row mt-2">
                                  <div class="col-md-6 col-12">
                                      <label>Basım Tarihi</label>
                                      <select class="form-control single" data-placeholder="Yıl Seçiniz" name="basimtarihi1">
                                          <option value="">Yıl Seçiniz</option>
                                          @foreach($Years as $item)

                                              <option  @if($loop->first) {{ 'selected' }}  @endif value="{{ $item->title }}">
                                                  {{  $item->title }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <label>&nbsp;</label>
                                      <select class="form-control single" data-placeholder="Yıl Seçiniz" name="basimtarihi2">
                                          <option value="">Yıl Seçiniz</option>
                                          @foreach($Years as $item)
                                              <option @if($loop->last) {{ 'selected' }}  @endif value="{{ $item->title }}">
                                                  {{  $item->title }}
                                              </option>
                                      @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6 col-12">
                                  <label>Kategori</label>
                                  <select class="form-control single" data-placeholder="Kategori Seçiniz" name="kategori">
                                      <option value="">Kategori Seçiniz</option>
                                      @foreach($Product_Categories as $item)
                                          <option value="{{ $item->id }}">
                                              {{ ($item->parent_id == 0 ) ? $item->title : ''.$item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label class="mt-2">Yayınevi</label>
                                  <select class="form-control single" data-placeholder="Kategori Seçiniz" name="yayinevi">
                                  <option value="">Yayınevi Seçiniz</option>
                                      @foreach($Publisher as $item)
                                          <option value="{{ $item->id }}">
                                              {{  $item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label  class="mt-2">Dil</label>
                                  <select class="form-control single" data-placeholder="Dİl Seçiniz" name="dil">
                                  <option value="">Dİl Seçiniz</option>
                                    @foreach($Language as $item)
                                          <option value="{{ $item->id }}">
                                              {{  $item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                              <div class="row mt-2">

                                  <div class="col-md-6 col-12">
                                      <label>Fiyat Aralığı</label>
                                      <input class="form-control" name="fiyat1" type="text" value="19">
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <label>&nbsp;</label>
                                      <input class="form-control" name="fiyat2" type="text" value="999">
                                  </div>
                              </div>


                          </div>
                           <div class="col-12 text-center">
                               <button class="btn btn-primary mb-4">Ara</button>
                           </div>
                       </div>
                   </form>

                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        <div class="widget widget-categories">

                            <div class="widget-body">
                                <div class="accordion" id="widget-cat-acc">
                                    @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                        <div class="acc-item">
                                            <h5>
                                                <a role="button" data-toggle="collapse" href="#{{$item->slug}}" aria-expanded="true" aria-controls="collapse-1">
                                                    {{ $item->title }}
                                                </a>
                                            </h5>
                                            @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                                <div id="{{$item->slug}}" class="collapse show" data-parent="#widget-cat-acc">
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
