@extends('backend.layout.app')
@section('title', 'Slider Ekle')
@section('content')

    <div class="col-12 col-md-9">
        <div class="card">
            {{Form::open(['route' => 'slider.store', 'enctype' => 'multipart/form-data'])}}
                <div class="card-header d-flex justify-content-between">
                    <x-add title="Slider"></x-add>
                    <div>
                        <x-back></x-back>
                        <x-save></x-save>
                    </div>
                </div>
                <div class="card-body">
                    <x-form-inputtext label="Slider Adı" name="title"/>
                    <x-form-select label="Ürün" name="product_id" :list="$Pro"/>

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
                <div class="p-2">
                    <x-form-file label="" name="image"></x-form-file>
                </div>
            </div>
        </div>
    {{Form::close()}}
@endsection
