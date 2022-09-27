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
                              <input class="form-control" name="" type="text" placeholder="">

                              <label>Yazar</label>
                              <select class="form-control single" data-placeholder="Yazar Seçiniz" name="translator">
                                  <option value="">Yazar Seçiniz</option>
                                  @foreach($Author as $item)
                                      <option value="{{ $item->id }}">
                                          {{  $item->title }}
                                      </option>
                                  @endforeach
                              </select>

                              <label  class="mt-2">Çeviren</label>
                              <select class="form-control single" data-placeholder="Çeviren Seçiniz" name="translator">
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
                                      <select class="form-control single" data-placeholder="Yıl Seçiniz" name="years">
                                          <option value="">Yıl Seçiniz</option>
                                          @foreach($Years as $item)
                                              <option value="{{ $item->id }}">
                                                  {{  $item->title }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <label>&nbsp;</label>

                                      <select class="form-control single" data-placeholder="Yıl Seçiniz" name="years">
                                          <option value="">Yıl Seçiniz</option>
                                          @foreach($Years as $item)
                                              <option value="{{ $item->id }}">
                                                  {{  $item->title }}
                                              </option>
                                      @endforeach
                                      </select>

                                  </div>
                              </div>


                          </div>

                          <div class="col-md-6 col-12">
                                  <label>Kategori</label>
                                  <select class="form-control single" data-placeholder="Kategori Seçiniz" name="category">
                                      <option value="">Kategori Seçiniz</option>
                                      @foreach($Product_Categories as $item)
                                          <option value="{{ $item->id }}">
                                              {{ ($item->parent_id == 0 ) ? $item->title : ''.$item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label class="mt-2">Yayınevi</label>
                                  <select class="form-control single" data-placeholder="Kategori Seçiniz" name="publisher">
                                  <option value="">Yayınevi Seçiniz</option>
                                      @foreach($Publisher as $item)
                                          <option value="{{ $item->id }}">
                                              {{  $item->title }}
                                          </option>
                                      @endforeach
                                  </select>

                                  <label  class="mt-2">Dil</label>
                                  <select class="form-control single" data-placeholder="Kategori Seçiniz" name="language">
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
                                      <input class="form-control" name="" type="text" placeholder="">
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <label>&nbsp;</label>
                                      <input class="form-control" name="" type="text" placeholder="">
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

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                Kategoriler
                            </h3>
                            <div class="mobile-menu-light">

                                <nav class="mobile-nav">
                                    <ul class="mobile-menu">

                                        @foreach($Product_Categories->where('parent_id' , 0) as $item)
                                            <li>
                                                <a href="{{ route('kategori',[$item->slug, 'id' => $item->id]) }}" class="text-dark">
                                                    <i class="icon-angle-right"></i>{{ $item->title }}
                                                </a>
                                                @if($Product_Categories->where('parent_id' , 0)->count() > 0)
                                                    <ul style="display: none;">
                                                        @foreach($Product_Categories->where('parent_id' , $item->id) as $itemm)
                                                            <li>
                                                                <a href="{{ route('kategori',  [$item->slug, $itemm->slug,'id' => $itemm->id]) }}"
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
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--bootstrap .select2-selection {
            -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            background-color: #fafafa;
            border: 1px solid #ced4da;
            color: #495057;
            font-size: 1rem;
            outline: 0;
        }

        @media (prefers-reduced-motion: reduce) {
            .select2-container--bootstrap .select2-selection {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .select2-container--bootstrap .select2-selection.form-control {
            border-radius: 0.25rem;

        }

        .select2-container--bootstrap .select2-search--dropdown .select2-search__field {
            -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            background-color: #fafafa;
            border: 1px solid #ced4da;
            color: #495057;
            font-size: 1rem;
        }

        @media (prefers-reduced-motion: reduce) {
            .select2-container--bootstrap .select2-search--dropdown .select2-search__field {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .select2-container--bootstrap .select2-search__field {
            outline: 0;
        }
        .select2-container--bootstrap .select2-search__field::-webkit-input-placeholder {
            color: #6c757d;
        }

        .select2-container--bootstrap .select2-search__field:-moz-placeholder {
            color: #6c757d;
        }

        .select2-container--bootstrap .select2-search__field::-moz-placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .select2-container--bootstrap .select2-search__field:-ms-input-placeholder {
            color: #6c757d;
        }

        .select2-container--bootstrap .select2-results__option {
            padding: 0.375rem 0.75rem;
        }

        .select2-container--bootstrap .select2-results__option[role=group] {
            padding: 0;
        }

        .select2-container--bootstrap .select2-results__option[aria-disabled=true] {
            color: #adb5bd;
            cursor: not-allowed;
        }

        .select2-container--bootstrap .select2-results__option[aria-selected=true] {
            background-color: #e9ecef;
            color: #16181b;
        }

        .select2-container--bootstrap .select2-results__option--highlighted[aria-selected] {
            background-color: #007bff;
            color: #fff;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option {
            padding: 0.375rem 0.75rem;

        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__group {
            padding-left: 0;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -0.75rem;
            padding-left: 1.5rem;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -1.5rem;
            padding-left: 2.25rem;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -2.25rem;
            padding-left: 3rem;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3rem;
            padding-left: 3.75rem;
        }

        .select2-container--bootstrap .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option {
            margin-left: -3.75rem;
            padding-left: 4.5rem;
        }

        .select2-container--bootstrap .select2-results__group {
            color: #6c757d;
            background-color: #000;
            display: block;
            padding: 0.375rem 0.75rem;
            font-size: 16px;
            line-height: 1.5;
            white-space: nowrap;
        }

        .select2-container--bootstrap.select2-container--focus .select2-selection, .select2-container--bootstrap.select2-container--open .select2-selection {
            border-color: #80bdff;
            -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .select2-container--bootstrap.select2-container--open {

        }

        .select2-container--bootstrap.select2-container--open .select2-selection .select2-selection__arrow b {
            border-color: transparent transparent #6c757d transparent;
            border-width: 0 0.25rem 0.25rem 0.25rem;
        }

        .select2-container--bootstrap.select2-container--open.select2-container--below .select2-selection {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .select2-container--bootstrap.select2-container--open.select2-container--above .select2-selection {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-top-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .select2-container--bootstrap .select2-selection__clear {
            color: #6c757d;
            cursor: pointer;
            float: right;
            font-weight: bold;
            margin-right: 10px;
        }


        .select2-container--bootstrap.select2-container--disabled .select2-selection {
            border-color: #ced4da;
        }

        .select2-container--bootstrap.select2-container--disabled .select2-selection,
        .select2-container--bootstrap.select2-container--disabled .select2-search__field {
            cursor: not-allowed;
        }

        .select2-container--bootstrap.select2-container--disabled .select2-selection,
        .select2-container--bootstrap.select2-container--disabled .select2-selection--multiple .select2-selection__choice {
            background-color: #e9ecef;
        }

        .select2-container--bootstrap.select2-container--disabled .select2-selection__clear,
        .select2-container--bootstrap.select2-container--disabled .select2-selection--multiple .select2-selection__choice__remove {
            display: none;
        }

        .select2-container--bootstrap .select2-dropdown {
            border-color: #80bdff;
            overflow-x: hidden;
            margin-top: -1px;
        }

        .select2-container--bootstrap .select2-dropdown--above {
            margin-top: 1px;
        }

        .select2-container--bootstrap .select2-results > .select2-results__options {
            max-height: 200px;
            overflow-y: auto;
        }

        .select2-container--bootstrap .select2-selection--single {
            height: -webkit-calc(1.5em + 0.75rem + 2px);
            height: calc(1.5em + 2.4rem + 2px);
            line-height: 1.5;
            padding: .9rem 1.5rem 0.375rem 0.75rem;
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
            position: absolute;
            bottom: 0;
            right: 0.75rem;
            top: 0;
            width: 0.25rem;
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
            border-color: #6c757d transparent transparent transparent;
            border-style: solid;
            border-width: 0.25rem 0.25rem 0 0.25rem;
            height: 0;
            left: 0;
            margin-left: -0.25rem;
            margin-top: -0.125rem;
            position: absolute;
            top: 50%;
            width: 0;
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
            color: #495057;
            padding: 0;
            font-size:16px;

        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__placeholder {
            color: #6c757d;
            font-size: 16px;
        }

        .select2-container--bootstrap .select2-selection--multiple {
            min-height: -webkit-calc(1.5em + 0.75rem + 2px);
            min-height: calc(1.5em + 0.75rem + 2px);
            padding: 0;
            height: auto;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            display: block;
            line-height: 1.5;
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            width: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__placeholder {
            color: #6c757d;
            float: left;
            margin-top: 5px;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice {
            color: #495057;
            background: #e9ecef;
            border: 1px solid #6c757d;
            border-radius: 0.25rem;
            cursor: default;
            float: left;
            margin: -webkit-calc(0.375rem - 1px) 0 0 0.375rem;
            margin: calc(0.375rem - 1px) 0 0 0.375rem;
            padding: 0 0.375rem;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field {
            background: transparent;
            padding: 0 0.75rem;
            height: -webkit-calc(1.5em + 0.75rem + 2px);
            height: calc(1.5em + 0.75rem + 2px);
            line-height: 1.5;
            margin: -1px 0;
            min-width: 5em;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
            color: #6c757d;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 0.1875rem;
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: "#111111";
        }

        .select2-container--bootstrap .select2-selection--multiple .select2-selection__clear {
            margin-top: 0.375rem;
        }

        .select2-container--bootstrap .select2-selection--single.form-control-sm,
        .input-group-sm .select2-container--bootstrap .select2-selection--single,
        .form-group-sm .select2-container--bootstrap .select2-selection--single {
            border-radius: 0.2rem;
            font-size:16px;
            height: -webkit-calc(1.5em + 0.5rem + 2px);
            height: calc(1.5em + 0.5rem + 2px);
        }

        .select2-container--bootstrap .select2-selection--single.form-control-sm .select2-selection__arrow b,
        .input-group-sm .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b,
        .form-group-sm .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
            margin-left: -0.25rem;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-sm,
        .input-group-sm .select2-container--bootstrap .select2-selection--multiple,
        .form-group-sm .select2-container--bootstrap .select2-selection--multiple {
            border-radius: 0.2rem;
            min-height: -webkit-calc(1.5em + 0.5rem + 2px);
            min-height: calc(1.5em + 0.5rem + 2px);
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-sm .select2-selection__choice,
        .input-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice,
        .form-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice {
            font-size: 16px;
            line-height: 1.5;
            margin: -webkit-calc(0.25rem - 1px) 0 0 0.25rem;
            margin: calc(0.25rem - 1px) 0 0 0.25rem;
            padding: 0 0.25rem;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-sm .select2-search--inline .select2-search__field,
        .input-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field,
        .form-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field {
            padding: 0 0.5rem;
            font-size: 16px;
            height: -webkit-calc(1.5em + 0.5rem + 2px);
            height: calc(1.5em + 0.5rem + 2px);
            line-height: 1.5;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-sm .select2-selection__clear,
        .input-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-selection__clear,
        .form-group-sm .select2-container--bootstrap .select2-selection--multiple .select2-selection__clear {
            margin-top: 0.25rem;
        }

        .select2-container--bootstrap .select2-selection--single.form-control-lg,
        .input-group-lg .select2-container--bootstrap .select2-selection--single,
        .form-group-lg .select2-container--bootstrap .select2-selection--single {
            border-radius: 0.3rem;
            font-size: 1rem;
        }

        .select2-container--bootstrap .select2-selection--single.form-control-lg .select2-selection__arrow,
        .input-group-lg .select2-container--bootstrap .select2-selection--single .select2-selection__arrow,
        .form-group-lg .select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
            width: 0.3125rem;
        }

        .select2-container--bootstrap .select2-selection--single.form-control-lg .select2-selection__arrow b,
        .input-group-lg .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b,
        .form-group-lg .select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
            border-width: 0.3125rem 0.3125rem 0 0.3125rem;
            margin-left: -0.3125rem;
            margin-left: -0.5rem;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-lg,
        .input-group-lg .select2-container--bootstrap .select2-selection--multiple,
        .form-group-lg .select2-container--bootstrap .select2-selection--multiple {
            min-height: -webkit-calc(1.5em + 1rem + 2px);
            min-height: calc(1.5em + 1rem + 2px);
            border-radius: 0.3rem;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-lg .select2-selection__choice,
        .input-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice,
        .form-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice {
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            margin: -webkit-calc(0.5rem - 1px) 0 0 0.5rem;
            margin: calc(0.5rem - 1px) 0 0 0.5rem;
            padding: 0 0.5rem;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-lg .select2-search--inline .select2-search__field,
        .input-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field,
        .form-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-search--inline .select2-search__field {
            padding: 0 1rem;
            font-size: 1.25rem;
            height: -webkit-calc(1.5em + 1rem + 2px);
            height: calc(1.5em + 1rem + 2px);
            line-height: 1.5;
        }

        .select2-container--bootstrap .select2-selection--multiple.form-control-lg .select2-selection__clear,
        .input-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-selection__clear,
        .form-group-lg .select2-container--bootstrap .select2-selection--multiple .select2-selection__clear {
            margin-top: 0.5rem;
        }

        .select2-container--bootstrap .select2-selection.form-control-lg.select2-container--open .select2-selection--single {

        }

        .select2-container--bootstrap .select2-selection.form-control-lg.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #6c757d transparent;
            border-width: 0 0.3125rem 0.3125rem 0.3125rem;
        }

        .input-group-lg .select2-container--bootstrap .select2-selection.select2-container--open .select2-selection--single {

        }

        .input-group-lg .select2-container--bootstrap .select2-selection.select2-container--open .select2-selection--single .select2-selection__arrow b {
            border-color: transparent transparent #6c757d transparent;
            border-width: 0 0.3125rem 0.3125rem 0.3125rem;
        }


        .is-valid .select2-dropdown,
        .is-valid .select2-selection {
            border-color: #28a745;
        }

        .is-valid .select2-container--focus .select2-selection,
        .is-valid .select2-container--open .select2-selection {
            border-color: #1e7e34;
        }

        .is-valid .select2-container--focus .select2-selection:focus,
        .is-valid .select2-container--open .select2-selection:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .is-valid.select2-drop-active {
            border-color: #1e7e34;
        }

        .is-valid.select2-drop-active.select2-drop.select2-drop-above {
            border-top-color: #1e7e34;
        }

        .is-invalid .select2-dropdown,
        .is-invalid .select2-selection {
            border-color: #dc3545;
        }

        .is-invalid .select2-container--focus .select2-selection,
        .is-invalid .select2-container--open .select2-selection {
            border-color: #bd2130;
        }

        .is-invalid .select2-container--focus .select2-selection:focus,
        .is-invalid .select2-container--open .select2-selection:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .is-invalid.select2-drop-active {
            border-color: #bd2130;
        }

        .is-invalid.select2-drop-active.select2-drop.select2-drop-above {
            border-top-color: #bd2130;
        }

        /* Validation classes on parent element. Preserved Bootstrap 3 validation classes */
        .has-warning .select2-dropdown,
        .has-warning .select2-selection {
            border-color: #ffc107;
        }

        .has-warning .select2-container--focus .select2-selection,
        .has-warning .select2-container--open .select2-selection {
            border-color: #d39e00;
        }

        .has-warning .select2-container--focus .select2-selection:focus,
        .has-warning .select2-container--open .select2-selection:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .has-warning.select2-drop-active {
            border-color: #d39e00;
        }

        .has-warning.select2-drop-active.select2-drop.select2-drop-above {
            border-top-color: #d39e00;
        }

        .has-error .select2-dropdown,
        .has-error .select2-selection {
            border-color: #dc3545;
        }

        .has-error .select2-container--focus .select2-selection,
        .has-error .select2-container--open .select2-selection {
            border-color: #bd2130;
        }

        .has-error .select2-container--focus .select2-selection:focus,
        .has-error .select2-container--open .select2-selection:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .has-error.select2-drop-active {
            border-color: #bd2130;
        }

        .has-error.select2-drop-active.select2-drop.select2-drop-above {
            border-top-color: #bd2130;
        }

        .has-success .select2-dropdown,
        .has-success .select2-selection {
            border-color: #28a745;
        }

        .has-success .select2-container--focus .select2-selection,
        .has-success .select2-container--open .select2-selection {
            border-color: #1e7e34;
        }

        .has-success .select2-container--focus .select2-selection:focus,
        .has-success .select2-container--open .select2-selection:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .has-success.select2-drop-active {
            border-color: #1e7e34;
        }

        .has-success.select2-drop-active.select2-drop.select2-drop-above {
            border-top-color: #1e7e34;
        }


        .input-group > .select2-hidden-accessible:not(:first-child) + .select2-container--bootstrap > .selection > .select2-selection,
        .input-group > .select2-hidden-accessible:not(:first-child) + .select2-container--bootstrap > .selection > .select2-selection.form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .input-group > .select2-hidden-accessible + .select2-container--bootstrap:not(:last-child) > .selection > .select2-selection,
        .input-group > .select2-hidden-accessible + .select2-container--bootstrap:not(:last-child) > .selection > .select2-selection.form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group > .select2-container--bootstrap {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            position: relative;
            z-index: 2;
            width: 1%;
            margin-bottom: 0;

        }

        .input-group > .select2-container--bootstrap > .selection {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
        }

        .input-group > .select2-container--bootstrap > .selection > .select2-selection.form-control {
            float: none;
        }

        .input-group > .select2-container--bootstrap.select2-container--open, .input-group > .select2-container--bootstrap.select2-container--focus {
            z-index: 3;
        }

        .input-group > .select2-container--bootstrap,
        .input-group > .select2-container--bootstrap .input-group-append,
        .input-group > .select2-container--bootstrap .input-group-prepend,
        .input-group > .select2-container--bootstrap .input-group-append .btn,
        .input-group > .select2-container--bootstrap .input-group-prepend .btn {
            vertical-align: top;
        }

        .form-control.select2-hidden-accessible {
            position: absolute !important;
            width: 1px !important;
        }


        @media (min-width: 576px) {
            .form-inline .select2-container--bootstrap {
                display: inline-block;
            }
        }
    </style>
@endsection
@section('customJS')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.single').select2({
                theme: "bootstrap"
            });
        });
       </script>
@endsection
