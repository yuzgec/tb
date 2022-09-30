<?php
    //SWEETALERT MESAJLARI -
    use Gloudemans\Shoppingcart\Facades\Cart;

    define('SWEETALERT_MESSAGE_CREATE', 'Eklendi');
    define('SWEETALERT_MESSAGE_UPDATE', 'Güncellendi');
    define('SWEETALERT_MESSAGE_DELETE', 'Silindi');
    define('CARGO_LIMIT', 200);
    define('CARGO_PRICE', 17.90);
    define('MAIL_SEND', 'siparis@kiblegahaileoyunlari.com.tr');

    function cartControl($id, $text = null){
        foreach (Cart::instance('shopping')->content() as $c){
            if($c->id == $id){
                echo $text;
            }
        }
    }

    function condition($value){

        if($value === 5){
            echo 100;
        }else if($value === 4){
            echo 80;
        }else if($value === 3){
            echo 60;
        }else if($value === 2){
            echo 40;
        }else if($value === 1){
            echo 20;
        }
    }

function conditionText($value){

    if($value === 5 ){
        echo 'Yeni Gibi';
    }else if($value === 4 ){
        echo 'Çok İyi';
    }else if($value === 3 ){
        echo 'İyi';
    }else if($value === 2 ){
        echo 'Orta';
    }else if($value === 1 ){
        echo 'Kötü';
    }
}

    //KULLANICI ADI BAŞ HARFLERİNİ GÖSTERME
    function isim($isim){
        $parcala = explode(" ", $isim);
        $ilk = mb_substr(current($parcala), 0,3);
        $son = mb_substr(end($parcala), 0,3);
        return $ilk.'***'.' '.$son.'***';
    }
    function money($deger){
        return number_format((float)$deger, 2, '.', '');
    }

    function cargo($toplam)
    {
        if ($toplam >= 0){
            if ($toplam >= CARGO_LIMIT) {
                return 'Ücretsiz Kargo';
            } else {
                return money(CARGO_PRICE.'₺');
            }
        }
        return;
    }

    function cargoToplam($toplam){

        if($toplam < CARGO_LIMIT){
            return money($toplam + CARGO_PRICE);
        }else{
            return $toplam;
        }
    }


