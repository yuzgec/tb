<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title', config('app.name'). ' | GO Dijital Gelişmiş Yönetim Paneli')</title>
    @include('backend.layout.css')
    @yield('customCSS')
</head>
<body class="antialiased">
<div class="wrapper">
    @include('backend.layout.header')
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Go Dijital
                        </div>
                        <h2 class="page-title">
                            Gelişmiş Yönetim Paneli
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                          <span class="d-none d-sm-inline">
                            <a href=" {{ route('home') }}" class="btn btn-white" target="_blank">
                              Site Anasyafa
                            </a>
                          </span>
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Destek Talebi Oluştur
                            </a>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    @include('backend.layout.alert')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('backend.layout.footer')
    </div>
</div>
    @include('backend.layout.js')

    @yield('customJS')
</body>
</html>
