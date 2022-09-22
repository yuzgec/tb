@extends('frontend.layout.app')
@section('content')
{{--    {{dd($form)}}--}}
    <div style="display: none">{{print_r($form)}}</div>

<div class="container">
    <div class="row">
        <aside class="col-lg-12">
            <div id="iyzipay-checkout-form" class="responsive my-5"></div>
        </aside>
    </div>
</div>
@endsection
