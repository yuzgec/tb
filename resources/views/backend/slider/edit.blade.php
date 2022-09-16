@extends('backend.layout.app')
@section('title', $Edit->title.' | Slider Düzenle')
@section('content')
    {{Form::model($Edit, ["route" => ["slider.update", $Edit->id],'enctype' => 'multipart/form-data'])}}
    @method('PUT')
    <div class="row">
        <div class="col-12 col-md-9">

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="d-flex">
                        <h4 class="card-title justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Slider Düzenle [ {{$Edit->title }}]
                        </h4>
                    </div>
                    <div>
                        <a class="btn btn-tabler btn-sm p-2" href="{{  url()->previous() }}" title="Geri">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" /><line x1="10" y1="14" x2="20" y2="4" /><polyline points="15 4 20 4 20 9" /></svg>
                            Önizle
                        </a>
                        <a class="btn btn-tabler btn-sm p-2" href="{{  url()->previous() }}" title="Geri">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                            Geri
                        </a>
                        <button class="btn btn-tabler btn-sm p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                            Kaydet
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <x-form-inputtext label="Slider Adı" name="title"/>
                    <x-form-inputtext label="Yazı 1" name="text1"/>
                    <x-form-inputtext label="Yazı 2" name="text2"/>
                    <x-form-inputtext label="Yazı 3" name="text3"/>
                    <x-form-inputtext label="Hizalama" name="align"/>
                    <x-form-inputtext label="Buton Yazı" name="button_text"/>
                    <x-form-inputtext label="Buton Link" name="button_link"/>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
                        Slider Kapak Resim
                    </h4>
                </div>
                <div class="card-body justify-content-center align-items-center">
                        <div class="col">
                            <img src="{{ (!$Edit->getFirstMediaUrl('slider')) ? '/backend/resimyok.jpg': $Edit->getFirstMediaUrl('slider')}}" class="img-fluid mb-2 mt-2" alt="Image">
                        </div>

                    <x-form-file label="" name="image"></x-form-file>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJS')
    <script type="text/javascript">
        $(document).ready(function() {
            $("img").addClass("img-fluid");
        })
    </script>
@endsection
