@extends('backend.layout.app')
@section('title', 'Dİl Ekle')
@section('content')

    <div class="col-12 col-md-12">
        <div class="card">
            {{Form::open(['route' => 'language.store', 'enctype' => 'multipart/form-data'])}}
                <div class="card-header d-flex justify-content-between">
                    <x-add title="Dil"></x-add>
                    <div>
                        <x-back></x-back>
                        <x-save></x-save>
                    </div>
                </div>
                <div class="card-body">
                <x-form-inputtext label="Adı Giriniz" name="title"/>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
