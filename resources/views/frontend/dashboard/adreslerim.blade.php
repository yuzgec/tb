@extends('frontend.layout.app')
@section('title', 'Adreslerim | '.config('app.name'))

@section('content')
    <div class="page-content mt-2  ">
        <div class="dashboard ml-2">
            <div class="container">
                <div class="row">
                    @include('frontend.layout.dashboardsidebar')

                    <div class="col-md-9" >

                        <div class="row">
                            @include('frontend.layout.validate')
                            @include('frontend.layout.message')
                            @foreach($address as $adres)
                                <div class="col-lg-6">
                                    <div class="card card-dashboard">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $adres->addressTitle }}</h3>
                                            <p>{{ $adres->addressName }}<br>
                                                {{ substr($adres->addressComplete, 0, 100) }}<br>
                                                {{ $adres->addressProvince.' / '.$adres->addressCity }}<br>
                                                <a href="{{ route('adres.edit', $adres->id) }}">Düzenle
                                                    <i class="icon-edit"></i>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-6">
                                    <div class="card card-dashboard">
                                        <div class="card-body">
                                            <h3 class="card-title">Sipariş Adresi</h3>
                                            @if($address->count() < 0)
                                                <p>Henüz eklenmiş bir adresiniz bulunmamaktadır.<br>
                                                    @endif
                                                    <button class="btn" onclick="adresekle()"><i class="icon-edit"></i>  Adres Ekle</button>
                                                </p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-12">
                            <div class="summary" id="adres" style="display:none">
                                <form action="{{route('address.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Adres Adı*</label>
                                            <input type="text" class="form-control" name="addressTitle" placeholder="Adresi tanımlama İçin İsim Giriniz EV-Ofis Vb." value="{{ old('addressTitle') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Adınız*</label>
                                            <input type="text" class="form-control" name="addressName" placeholder="Adınız" value="{{ old('addressName') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Soyadınız*</label>
                                            <input type="text" class="form-control" name="addressSurname" placeholder="Soyadınız" value="{{ old('addressSurname') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Telefon*</label>
                                            <input type="text" class="form-control" name="addressPhone" placeholder="Telefon Numaranız" value="{{ old('addressPhone') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>TC Kimlik NO*</label>
                                            <input type="text" class="form-control" name="addressTC" placeholder="Telefon Numaranız" value="{{ old('addressTC') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="fat" onclick="fatura()" name="addressType" value="1"  checked>
                                                <label class="custom-control-label" for="fat">Kurumsal</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="hesap" name="createdUser" value="1" checked>
                                                <label class="custom-control-label" for="hesap" >Hesap Oluştur</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="kurumsalgoster"  style="display:block;" >
                                        <div  class="row">
                                            <div class="col-lg-12">
                                                <label>Firma Adı / Ünvanı </label>
                                                <input type="text" class="form-control" name="addressCompanyName" value="{{ old('addressCompanyName') }}" >
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Vergi Dairesi</label>
                                                <input type="text" class="form-control" name="addressTaxRegex" value="{{ old('addressTaxRegex') }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Vergi Numarası</label>
                                                <input type="text" class="form-control" name="addressTaxNumber" value="{{ old('addressTaxNumber') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Adresiniz</label>
                                            <textarea class="form-control" cols="30" rows="4" name="addressComplete" placeholder="Açık Adresiniz">{{old('addressComplete')}}</textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>İl</label>
                                            <select class="form-control" id="il" name="addressProvince">
                                                <option value="">İl Seçiniz</option>
                                                <option value="İSTANBUL">İSTANBUL</option>
                                                <option value="ANKARA">ANKARA</option>
                                                <option value="İZMİR">İZMİR</option>
                                                <option value="BURSA">BURSA</option>
                                                <option value="ADANA">ADANA</option>
                                                <option value="ADIYAMAN">ADIYAMAN</option>
                                                <option value="AFYONKARAHİSAR">AFYONKARAHİSAR</option>
                                                <option value="AĞRI">AĞRI</option>
                                                <option value="AKSARAY">AKSARAY</option>
                                                <option value="AMASYA">AMASYA</option>
                                                <option value="ANTALYA">ANTALYA</option>
                                                <option value="ARDAHAN">ARDAHAN</option>
                                                <option value="ARTVİN">ARTVİN</option>
                                                <option value="AYDIN">AYDIN</option>
                                                <option value="BALIKESİR">BALIKESİR</option>
                                                <option value="BARTIN">BARTIN</option>
                                                <option value="BATMAN">BATMAN</option>
                                                <option value="BAYBURT">BAYBURT</option>
                                                <option value="BİLECİK">BİLECİK</option>
                                                <option value="BİNGÖL">BİNGÖL</option>
                                                <option value="BİTLİS">BİTLİS</option>
                                                <option value="BOLU">BOLU</option>
                                                <option value="BURDUR">BURDUR</option>
                                                <option value="ÇANAKKALE">ÇANAKKALE</option>
                                                <option value="ÇANKIRI">ÇANKIRI</option>
                                                <option value="ÇORUM">ÇORUM</option>
                                                <option value="DENİZLİ">DENİZLİ</option>
                                                <option value="DİYARBAKIR">DİYARBAKIR</option>
                                                <option value="KOCAELİ">KOCAELİ</option>
                                                <option value="KONYA">KONYA</option>
                                                <option value="KÜTAHYA">KÜTAHYA</option>
                                                <option value="MALATYA">MALATYA</option>
                                                <option value="MANİSA">MANİSA</option>
                                                <option value="MARDİN">MARDİN</option>
                                                <option value="MERSİN">MERSİN</option>
                                                <option value="MUĞLA">MUĞLA</option>
                                                <option value="MUŞ">MUŞ</option>
                                                <option value="NEVŞEHİR">NEVŞEHİR</option>
                                                <option value="NİĞDE">NİĞDE</option>
                                                <option value="ORDU">ORDU</option>
                                                <option value="OSMANİYE">OSMANİYE</option>
                                                <option value="RİZE">RİZE</option>
                                                <option value="SAKARYA">SAKARYA</option>
                                                <option value="SAMSUN">SAMSUN</option>
                                                <option value="SİİRT">SİİRT</option>
                                                <option value="SİNOP">SİNOP</option>
                                                <option value="ŞIRNAK">ŞIRNAK</option>
                                                <option value="SİVAS">SİVAS</option>
                                                <option value="TEKİRDAĞ">TEKİRDAĞ</option>
                                                <option value="TOKAT">TOKAT</option>
                                                <option value="TRABZON">TRABZON</option>
                                                <option value="TUNCELİ">TUNCELİ</option>
                                                <option value="ŞANLIURFA">ŞANLIURFA</option>
                                                <option value="UŞAK">UŞAK</option>
                                                <option value="VAN">VAN</option>
                                                <option value="YALOVA">YALOVA</option>
                                                <option value="YOZGAT">YOZGAT</option>
                                                <option value="ZONGULDAK">ZONGULDAK</option>
                                                <option value="DÜZCE">DÜZCE</option>
                                                <option value="EDİRNE">EDİRNE</option>
                                                <option value="ELAZIĞ">ELAZIĞ</option>
                                                <option value="ERZİNCAN">ERZİNCAN</option>
                                                <option value="ERZURUM">ERZURUM</option>
                                                <option value="ESKİŞEHİR">ESKİŞEHİR</option>
                                                <option value="GAZİANTEP">GAZİANTEP</option>
                                                <option value="GİRESUN">GİRESUN</option>
                                                <option value="GÜMÜŞHANE">GÜMÜŞHANE</option>
                                                <option value="HAKKARİ">HAKKARİ</option>
                                                <option value="HATAY">HATAY</option>
                                                <option value="IĞDIR">IĞDIR</option>
                                                <option value="ISPARTA">ISPARTA</option>
                                                <option value="KAHRAMANMARAŞ">KAHRAMANMARAŞ</option>
                                                <option value="KARABÜK">KARABÜK</option>
                                                <option value="KARAMAN">KARAMAN</option>
                                                <option value="KARS">KARS</option>
                                                <option value="KASTAMONU">KASTAMONU</option>
                                                <option value="KAYSERİ">KAYSERİ</option>
                                                <option value="KİLİS">KİLİS</option>
                                                <option value="KIRIKKALE">KIRIKKALE</option>
                                                <option value="KIRKLARELİ">KIRKLARELİ</option>
                                                <option value="KIRŞEHİR">KIRŞEHİR</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>İlçe</label>
                                            <input type="text" class="form-control" name="addressCity" value="{{ old('addressCity') }}">
                                        </div>

                                        <button class="btn btn-outline-primary-2 mt-2 ml-3" type="submit">
                                            <span>Adres Kaydet</span><i class="icon-long-arrow-right"></i>
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customCSS')
    <style>
        input,textarea {
            background-color: white !important;
        }
    </style>
@endsection

@section('customJS')
    <script>
        function fatura() {
            var checkBox = document.getElementById("fat");
            var text = document.getElementById("kurumsalgoster");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        function adresekle() {


            var x = document.getElementById("adres");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $('input[type="checkbox"]').on('change', function(){
            this.value ^= 1;
        });
    </script>
@endsection
