<aside class="col-md-3" style="margin-left:-3px">

    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" href="{{route('home.account')}}">{{Auth::user()->name}}</a>
        <a class="list-group-item list-group-item-action" href="{{route('home.account')}}"><i class="icon-home" ></i> Yönetim Anasayfa</a>
        <a class="list-group-item list-group-item-action" href="{{route('home.profilim')}}"><i class="icon-user" ></i> Hesabım</a>
        <a class="list-group-item list-group-item-action" href="{{route('adres.index')}}"><i class="icon-map-marker" ></i> Adreslerim</a>
        <a class="list-group-item list-group-item-action" href="{{route('home.siparislerim')}}"><i class="icon-star-o" ></i> Siparişlerim</a>
        <a class="list-group-item list-group-item-action" href="{{route('home.bildirim')}}"><i class="icon-cog" ></i> Bildirim Ayarları</a>
        <form id="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="list-group-item list-group-item-action"  href="javascript:{}" onclick="document.getElementById('logout').submit()"><i class="icon-close" ></i> Güvenli Çıkış</a>
        </form>
    </div>

</aside>
