@extends('frontend.layout.app')
@section('title', $Detay->title.' TB Kitap')
@section('content')

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <h2 class="title">{{ $Detay->title }}</h2><!-- End .title -->
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In n
                        isi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pre
                        tium, ligula sollicitudin laoreet viverra, tortor libero soda
                        les leo, eget blandit nunc tortor eu nibh. </p>
                </div>
            </div>
            <div class="mb-5"></div>
        </div>
@endsection
