<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Models\Basket;
use App\Models\Language;
use App\Models\MailSubcribes;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Publisher;
use App\Models\Search;
use App\Models\ShopCart;
use App\Models\Slider;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOTools;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Options;

class HomeController extends Controller
{
    public function index()
    {
        $Product_Categories = ProductCategory::with('cat')->where('status', 1)->get()->toFlatTree();
        $Products = Product::with('getCategory')->with([ 'getYear', 'getAuthor', 'getLanguage'])->select('id', 'title', 'price', 'old_price', 'slug','bestselling','status')->where('status',1)->orderBy('rank')->get();
        $Slider = Slider::with('getProduct')->where('status', 1)->get();
        $Pivot = \App\Models\ProductCategoryPivot::with('productCategory')->get();

        //dd($Products);
        return view('frontend.index', compact('Products','Slider', 'Product_Categories', 'Pivot'));
    }
    public function urun($url){
        $Detay = Product::withCount('getPublisher')->withCount('getAuthor')->with(['getCategory', 'getAuthor', 'getLanguage', 'getPublisher', 'getTranslator', 'getYear'])
            ->where('sku', \request('urunno'))
            ->firstOrFail();
        //dd($Detay);

        $author = [];
        foreach ($Detay->getAuthor as $item){
            $author[] = $item->author_id;
        }

        $Author = Author::select('title', 'slug', 'id','desc')->whereIn('id',$author)->get();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();

        $Productssss = Product::with('getCategory')->where('status', 1)->whereHas('getCategory', function ($query) use ($Detay){
            $query->where('category_id','=',$Detay->getCategory->category_id);
        })->orderBy('rank','ASC')->get();
        $Pivot = \App\Models\ProductCategoryPivot::with('productCategory')->get();

        return view('frontend.product.index', compact('Detay','Count', 'Productssss','Author', 'Pivot'));
    }
    public function kategori($url){

        $Detay = ProductCategory::where('slug', $url)->select('id','title','slug')->first();
        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'category');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));
        $ProductList = Product::with(['getCategory', 'getAuthor', 'getLanguage', 'getPublisher', 'getTranslator', 'getYear'])
             ->join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
            ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
            ->where('product_category_pivots.category_id', '=', $Detay->id)
            ->where('products.status', '=', 1)
            ->where(['category_id' => $Detay->id])
            ->select('products.id','products.title','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
            ->orderBy('products.rank','ASC')->paginate(9);
        //dd($Pro);
        return view('frontend.category.index', compact('Detay', 'ProductList'));
    }
    public function yayinevi($slug){
        $Detay = Publisher::where('slug', $slug)->first();

        SEOTools::setTitle($Detay->title." adlı yayınevine ait kitaplar");
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        $PublisherBook = Product::withCount('getPublisher')->where('publisher', $Detay->id)->get();
        //dd($PublisherBook);
        return view('frontend.publisher.index', compact('Detay', 'PublisherBook'));


    }
    public function sepet(){
        SEOTools::setTitle("Sepetim | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap Detaylı 2. El Kitap Sepetim Sayfası');

        if (Cart::content()->count() === 0){
            return redirect()->route('home');
        }
        //dd(Cart::content());

        $Products = Product::select('id', 'title', 'price', 'old_price', 'slug', 'campagin_price')->orderBy('rank')->get();
        return view('frontend.shop.sepet',compact('Products'));
    }
    public function siparis(){
        if (Cart::content()->count() === 0){
            return redirect()->route('home');
        }
        return view('frontend.shop.siparis');
    }
    public function odeme(Request $gelen)
    {


        SEOTools::setTitle("Ödeme | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap Detaylı 2. El Kitap Ödeme Sayfası');

        if (request()->isMethod('get')) {
            return redirect()->route('home');
        }

        session($gelen->all());
        $sepetId    = time();

        $options = new Options;
        $options->setApiKey(env('SET_API_KEY_IZYICO'));
        $options->setSecretKey(env('SET_SECRET_KEY_IZYICO'));
        $options->setBaseUrl(env('SET_IYZICO_URL'));

        $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($sepetId);
        $request->setPrice(Cart::total());
        $request->setPaidPrice(1);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId($sepetId);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(url('/siparis/sonuc?name='.$gelen->input('name').' '.$gelen->input('surname').'&sepetId='.$sepetId));
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new Buyer;
        $buyer->setId(rand(1,9));
        $buyer->setName($gelen->input('name'));
        $buyer->setSurname($gelen->input('surname'));
        $buyer->setGsmNumber($gelen->input('phone'));
        $buyer->setEmail($gelen->input('email'));
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress($gelen->input('address'));
        $buyer->setIp($_SERVER["REMOTE_ADDR"]);
        $buyer->setCity('İstanbul');
        $buyer->setCountry("Türkiye");
        $buyer->setZipCode("34000");

        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($gelen->input('name').' '.$gelen->input('surname'));
        $shippingAddress->setCity('İstanbul');
        $shippingAddress->setCountry("Türkiye");
        $shippingAddress->setAddress($gelen->input('address'));
        $shippingAddress->setZipCode("34000");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($gelen->input('name').' '.$gelen->input('name'));
        $billingAddress->setCity('İstanbul');
        $billingAddress->setCountry("Türkiye");
        $billingAddress->setAddress($gelen->input('address'));
        $billingAddress->setZipCode('34000');
        $request->setBillingAddress($billingAddress);

        $cartcount = 0;
        $basketItems = [];

        foreach(Cart::content() as $cart){
            $BasketItem = new BasketItem;
            $BasketItem->setId($cart->id);
            $BasketItem->setName($cart->name);
            $BasketItem->setCategory1('Kategori');
            $BasketItem->setCategory2("Kategori");
            $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $BasketItem->setPrice( money($cart->price * $cart->qty));
            $basketItems[$cartcount] = $BasketItem;
            $cartcount++;
        }
        //dd($basketItems);
        $request->setBasketItems($basketItems);

        $form = CheckoutFormInitialize::create($request, $options);
        return view('frontend.shop.odeme', compact('form', 'gelen'));
    }
    public function odemesonuc(Request $gelen)
    {

        if (request()->isMethod('get')) {
            return redirect()->to('/');
        }

        $token = $gelen->input('token');

        $options = new Options;
        $options->setApiKey(env('SET_API_KEY_IZYICO'));
        $options->setSecretKey(env('SET_SECRET_KEY_IZYICO'));
        $options->setBaseUrl(env('SET_IYZICO_URL'));

        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId(request('sepetId'));
        $request->setToken($token);

        $payment = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);
        if($payment->getPaymentStatus() == "SUCCESS"){
            if (request()->isMethod('post')) {

                $ShopCart = new Basket;

                $ShopCart->cart_id          = $payment->getBasketId();
                $ShopCart->user_id          = $payment->getBasketId();
                $ShopCart->total            = Cart::total();
                $ShopCart->name             = session()->get('name');
                $ShopCart->surname          = session()->get('surname');
                $ShopCart->email            = session()->get('email');
                $ShopCart->phone            = session()->get('phone');
                $ShopCart->address          = session()->get('address');

                $ShopCart->save();

                foreach (Cart::content() as $c) {
                    $Order                  = new Order;
                    $Order->cart_id         = $payment->getBasketId();
                    $Order->product_id      = $c->id;
                    $Order->name            = $c->name;
                    $Order->qty             = $c->qty;
                    $Order->price           = $c->price;
                    $Order->save();
                }

                Cart::destroy();

                session()->flush();
            }
            return redirect()->route('basarili',['no' => $payment->getBasketId()]);
        }else{
            return redirect()->route('basarisiz',['no' => $payment->getErrorCode()]);
        }
    }
    public function sonuc(){
        $Summary  = Order::where('cart_id',request('no') )->get();
        $Customer = ShopCart::where('cart_id',request('no'))->firstOrFail();
        return view('frontend.shop.sonuc', compact('Summary', 'Customer'));

    }
    public function addtocart(Request $request){

        $p = Product::find($request->id);
        Basket::create(['product_id' => $p->id, 'basket_name' => 'Sepet']);

        if (Cart::total() > CARGO_LIMIT ){
            if ($p->campagin_price != null) {
                $price = $p->campagin_price;
                $campagin = true;
            }else{
                $price = $p->price;
                $campagin = false;
            }
        }else{
            $price = $p->price;
            $campagin = false;
        }
        Cart::add(
        [
            'id' => $p->id,
            'name' => $p->title,
            'price' => $price,
            'weight' => 0,
            'qty' => $request->qty,
            'options' => [
                'image' => (!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                'cargo' => 0,
                'campagin' => $campagin,
                'url' => $p->slug
            ]
        ]);

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('sepet');
    }
    public function cartdelete($rowId){

        Cart::remove($rowId);

        if(kampanyatoplam(Cart::content()) < CARGO_LIMIT ) {
            foreach (Cart::content() as $c) {
                if ($c->options->campagin === true) {
                    Cart::remove($c->rowId);
                }
            }
        }

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('sepet');
    }
    public function cartdestroy(){
        Cart::destroy();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('home');
    }
    public function search(SearchRequest $request){

        SEOTools::setTitle($request->q." ile ilgili arama sonuçları | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap Detaylı 2. El Kitap Arama Sayfası');

        $search = $request->q;
        $Result = Product::where('title','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->where('status', 1)
            ->paginate(12);

        Search::create(['key' => $search]);

        return view('frontend.shop.search', compact('Result'));
    }
    public function detayliarama(){

        SEOTools::setTitle("Detaylı Arama | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap Detaylı 2. El Kitap Arama Sayfası');

        $Language = Language::all();
        $Publisher = Publisher::all();
        return view('frontend.shop.detailsearch', compact('Language', 'Publisher'));
    }
    public function hizlisatinal(Request $request){

        $p = Product::find($request->id);
        Basket::create(['product_id' => $p->id, 'basket_name' => 'Hizli Satın Al']);

        if (Cart::total() > CARGO_LIMIT ){
            if ($p->campagin_price != null) {
                $price = $p->campagin_price;
                $campagin = true;
            }else{
                $price = $p->price;
                $campagin = false;
            }
        }else{
            $price = $p->price;
            $campagin = false;
        }

        Cart::add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $price,
                'weight' => 0,
                'qty' => $request->qty,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => $campagin,
                ]
            ]);

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('siparis');

    }
    public function yazarlar(){
        $Alfabe = ["A", "B", "C","Ç", "D", "E", "F", "G", "H", "I","İ", "J", "K", "L", "M", "N", "O","Ö", "P", "Q", "R", "S", "T", "U","Ü","V", "W", "X", "Y", "Z"];
        $All = Author::withCount('getBookCount')->get();
        SEOTools::setTitle("Yazarlar Listesi |  TB Kitap | Online İkinci El Kitap Satışı" );
        SEOTools::setDescription('Tb Kitap online kitap satış sitesinde kitapları bulunan yazarların listesi');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('yazarlar'));
        SEOTools::opengraph()->addProperty('type', 'page');
        return view('frontend.author.all', compact('All', 'Alfabe'));
    }
    public function yazar($slug){

        $Detay = Author::where('slug', $slug)->first();
        SEOTools::setTitle($Detay->title."'a ait kitaplar");
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        $Books = Product::with('getAuthor', function ($query) use ($Detay){
            return $query->where('id', $Detay->id)->get();
        });

        dd($Books);

        return view('frontend.author.index', compact('Detay'));
    }
    public function mailsubcribes(MailRequest $request){
        MailSubcribes::create(['email_address' => $request->email, 'ip_address' => $request->ip()]);
        toast('Email Adresiz Bülten Listesine Eklendi','success');
        return redirect()->route('home');
    }
    public function kurumsal($url){
        $Detay = Page::where('slug', $url)->firstOrFail();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'page');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        return view('frontend.page.index', compact('Detay'));
    }
    public function iletisim(){

        SEOTools::setTitle("İletişim | ". config('app.name'));
        SEOTools::setDescription('Tb Kitap İletişim Sayfası');

        return view('frontend.page.contactus');
    }
    public function kargosorgulama(){
        return view('frontend.page.cargo');
    }
}
