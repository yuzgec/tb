@extends('backend.layout.app')
@section('title', 'Sayfa Çöp Kutusu')

@section('content')
    <div class="col-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1"></path><path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1" transform="rotate(120 12 13)"></path><path d="M12 17l-2 2l2 2m-2 -2h9a2 2 0 0 0 1.75 -2.75l-.55 -1" transform="rotate(240 12 13)"></path></svg>
                        Silinen Sayfalar Listesi
                    </h4>
                </div>
                <div class="d-flex">
                    <a class="btn btn-tabler btn-sm p-2" href="{{  url()->previous() }}" title="Geri">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                        Geri
                    </a>

                    <a class="btn btn-tabler btn-sm p-2" href="{{ route('page.index') }}" title="Sayfa Ekle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Sayfa Listesi
                    </a>
                </div>
            </div>

            <div class="table-responsive p-2">
                <table class="table table-hover table-striped table-bordered table-center">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Tarih</th>
                        <th class="w-1"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($Trash as $item)
                        <tr class="">
                            <td>
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2" style="background-image: url({{ (!$item->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg': $item->getFirstMediaUrl('page')}})"></span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $item->title }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-items-center">
                                {{ $item->getCategory->title }}
                            </td>
                            <td class="align-items-center">
                                {{ $item->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm">Kurtar</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
