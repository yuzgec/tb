<div class="col-md-9 col-lg-9" >
    @if(Cart::content()->count() > 0)
        <div class="text-right"><span class="btn btn-success btn-sm mb-1 "><a href="{{route('odeme')}}" title="Ödeme Sayfasına Git" class="text-white"> Ödeme Sayfasıne Git</a></span></div>
    @endif
    <div class="tab-content jumbotron">

        @include('frontend.layout.validate')
        @include('frontend.layout.message')

        <div class="row">


            <form action="{{route('address.store')}}" method="post" class="pl-3">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressTitle" placeholder="Adres Adı Giriniz" value="{{old('addressTitle')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressName" placeholder="Teslim Alacak Kişi" value="{{old('addressName')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressCompanyName" placeholder="Firma Adı / Ünvanı" value="{{old('addressCompanyName')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressType" placeholder="Adres Tipi Kurulsal/Bireysel" value="{{old('addressType')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressTaxRegex" placeholder="Vergi Dairesi" value="{{old('addressTaxRegex')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressTaxNumber" placeholder="Vergi Numarası" value="{{old('addressTaxNumber')}}">
                        </div>
                        <div class="col-md-12  mb-1">
                            <textarea type="text" class="form-control" name="addressComplete" placeholder="Açık Adresinizi Yazınız.."></textarea>
                        </div>
                        <div class="col-md-6 mb-1">
                            <select class="form-control single" id="il" name="addressProvince" required>
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
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressCity" placeholder="İlçe Giriniz" value="{{old('addressCity')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressTC" placeholder="Tc Kimlik No Giriniz" value="{{old('addressTC')}}">
                        </div>
                        <div class="col-md-6 mb-1">
                            <input type="text" class="form-control" name="addressPhone" placeholder="Telefon Giriniz." value="{{old('addressPhone')}}">
                        </div>
                        <button class="btn btn-outline-primary-2 mt-2 ml-3" type="submit">
                            <span>Adres Kaydet</span><i class="icon-long-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
        <p>Siparişiniz bulunmamaktadır.</p>
        <a href="{{route('home.index')}}" class="btn btn-outline-primary-2">
            <span>Alışverişe Başla</span><i class="icon-long-arrow-right"></i>
        </a>
    </div>

    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
        <form action="#">
            <label>Adınız Soyadınız*</label>
            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
            <small class="form-text">Adınız hesap bölümünde ve incelemelerde bu şekilde görüntülenecektir.</small>
            <label>Email Adresiniz *</label>
            <input type="email" class="form-control" value="{{ Auth::user()->email }}" required>
            <label>Geçerli şifre (değiştirmeden bırakmak için boş bırakın)</label>
            <input type="password" class="form-control" value="{{ Auth::user()->password }}">
            <label>Yeni şifre (değiştirmeden bırakmak için boş bırakın)</label>
            <input type="password" class="form-control" value="{{ Auth::user()->password }}">
            <label>Yeni Parolanız</label>
            <input type="password" class="form-control mb-2">
            <button type="submit" class="btn btn-outline-primary-2">
                <span>Değişiklikleri Kaydet</span>
                <i class="icon-long-arrow-right"></i>
            </button>
        </form>
    </div>
</div>





<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab-address-link" data-toggle="tab" href="#tab-address"
           role="tab" aria-controls="tab-address" aria-selected="false">Adreslerim</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders"
           role="tab" aria-controls="tab-orders" aria-selected="false">Siparişlerim</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
           role="tab" aria-controls="tab-account" aria-selected="false">Profil Düzenle</a>
    </li>
    <li class="nav-item">
        <form id="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="nav-link" href="javascript:{}" onclick="document.getElementById('logout').submit()">Güvenli Çıkış</a>
        </form>
    </li>
</ul>
