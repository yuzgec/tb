@extends('backend.layout.app')

@section('content')
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Ayarlar [{{ $All->count() }}]
                    </h4>
                </div>
            </div>


            <div class="table-responsive p-2">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Anahtar</th>
                        <th>Değer</th>
                        <th>Resim</th>
                        <th>Resim</th>
                        <th>Yükle</th>
                        <th class="w-1"></th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    @foreach($All as $item)
                        {{Form::model($item, ["route" => ["settings.update", $item->id],'enctype' => 'multipart/form-data'])}}
                        <tr id="page_{{$item->id}}">

                            <td style="width: 15%">
                                <div class="font-weight-medium">{{ $item->item }}</div>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-flush" name="value" value="{{ $item->value }}">
                            </td>
                            <td>
                                <div class="font-weight-medium">{{ $item->isType }}</div>
                            </td>
                            <td>
                                @if($item->isType == 'Resim')
                                    <img class="avatar me-2" src="" >
                                @endif
                            </td>
                            <td style="width:25%">
                                @if($item->isType == 'Resim')
                                <input type="file" class="form-control">
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-tabler btn-sm btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="10" y1="14" x2="21" y2="3"></line><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5"></path></svg>
                                    Kaydet
                                </button>
                            </td>
                        </tr>
                        {{Form::close()}}
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
