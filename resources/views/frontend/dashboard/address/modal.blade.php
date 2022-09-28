<div class="modal fade" id="adresses-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <div class="form-box">
                    <form action="{{route('adresses.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <p><b>Siparişlerinizin zamanında gelmesi için lütfen bilgileri eksiksiz giriniz...</b></p>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesTitle" placeholder="Adres Adı Giriniz" >
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesName" placeholder="Teslim Alacak Kişi">
                                </div>
                                <div class="col-md-12 mb-1">
                                    <input type="text" class="form-control" name="adressesCompanyName" placeholder="Firma Adı / Ünvanı">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesTaxRegex" placeholder="Vergi Dairesi">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesTaxNumber" placeholder="Vergi Numarası">
                                </div>
                                <div class="col-md-12  mb-1">
                                    <textarea type="text" class="form-control" name="adressesComplete" placeholder="Açık Adresinizi Yazınız.."></textarea>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <select class="form-control single" id="il" name="adressesProvince" required>
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
                                    <input type="text" class="form-control" name="adressesCity" placeholder="İlçe Giriniz">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesTC" placeholder="Tc Kimlik No Giriniz">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="text" class="form-control" name="adressesPhone" placeholder="Telefon Giriniz." value="{{ Auth::user()->phone }}">
                                </div>
                                <button class="btn btn-outline-primary-2 btn-block mt-2" type="submit">
                                    <span>Adres Kaydet</span><i class="icon-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
