@extends('backend.layout.app')
@section('title', 'Yorum Ekle')
@section('content')
    <div class="col-12 col-md-9">
        <div class="card">
            {{Form::open(['route' => 'comment.store'])}}
                <div class="card-header d-flex justify-content-between">
                    <x-add title="Yorum"></x-add>
                    <div>
                        <x-back></x-back>
                        <x-save></x-save>
                    </div>
                </div>
                <div class="card-body">
                <x-form-inputtext label="İsim Soyisim" name="name"/>
                <x-form-select label="Ürün" name="product_id" :list="$Product"/>
                <x-form-textarea label="Yorum" name="comment" ck="null" />

            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection

@section('customJS')
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script type="text/javascript">

        CKEDITOR.replace( 'aciklama', {
            filebrowserUploadUrl: "{{ route('video.postUpload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height : 200,
            toolbar: [
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold']},
                { name: 'paragraph',items: [ 'BulletedList']},
                { name: 'colors', items: [ 'TextColor' ]},
                { name: 'styles', items: [ 'Format', 'FontSize']},
                { name: 'links', items : [ 'Link', 'Unlink'] },
                { name: 'insert', items : [ 'Image', 'Table']},
                { name: 'document', items : [ 'Source','Maximize' ]},
                { name: 'clipboard', items : [ 'PasteText', 'PasteFromWord' ]},
            ],
        });
    </script>
@endsection
