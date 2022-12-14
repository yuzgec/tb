<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Models\Basket;
use App\Models\Favorite;
use App\Models\Language;
use App\Models\MailSubcribes;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\Publisher;
use App\Models\Search;
use App\Models\ShopCart;
use App\Models\Slider;
use App\Models\Translator;
use App\Models\Years;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Options;

class HomeController extends Controller
{
    public function index()
    {
        $Slider = Slider::with('getProduct')->where('status', 1)->get();
        $Pivot = \App\Models\ProductCategoryPivot::with('productCategory')->get();

        return view('frontend.index', compact('Slider',  'Pivot'));
    }
    public function urun($url){
        $Detay = Product::withCount('getPublisher')
            ->with(['getCategory', 'getAuthor', 'getLanguage', 'getPublisher', 'getTranslator', 'getYear'])
            ->where('sku', \request('urunno'))
            ->firstOrFail();

        foreach ($Detay->getAuthor as $item){
            $author[] = $item->author_id;
        }
        $Author = Author::select('title', 'slug', 'id','desc')->whereIn('id',$author)->get();
        foreach ($Detay->getCategory as $item){
            $cat[] = $item->category_id;
        }

        $Category = ProductCategory::select('title', 'slug', 'id','desc', 'parent_id')
            ->whereIn('id',$cat)
            ->get();

        $OtherCategory = ProductCategory::select('title', 'slug', 'id','desc')
            ->where('slug',request()->segment(2))
            ->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(route('urun', $Detay->slug));
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::now()->subYear()))->count();

        $Productssss = Product::with('getCategory')->where('status', 1)
                ->whereHas('getCategory', function ($query) use ($Detay, $cat)
                    {
                    $query->whereIn('category_id',$cat)
                        ->whereNotIn('product_id',[$Detay->id]);
                    })
                ->orderBy('rank','ASC')
                ->get();

        $Pivot = ProductCategoryPivot::with('productCategory')->get();

        Cart::instance('lastLook')->add(
            [
                'id' => $Detay->id,
                'name' => $Detay->title,
                'price' => $Detay->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$Detay->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $Detay->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => null,
                    'url' => url()->full()
                ]
            ]);

        return view('frontend.product.index', compact('Detay','Count', 'Productssss','Author', 'Pivot', 'Category', 'OtherCategory'));
    }
    public function kategori($url, Request $request)
    {
        $Detay = ProductCategory::where('id', \request('id'))->select('id','title','slug')->first();
        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->full());
        SEOTools::setCanonical(url()->full());
        SEOTools::opengraph()->addProperty('type', 'category');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        $ad = request('ad')  ? request('ad') : 'desc';
        $fiyat = request('fiyat')  ? request('fiyat') : 'desc';
        $basimtarihi = request('basimtarihi')  ? request('basimtarihi') : 'desc';

        if(request()->filled('basimtarihi')){
            $ProductList = Product::with(['getCategory'])
                ->join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
                ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
                ->where('product_category_pivots.category_id',  $Detay->id)
                ->where('products.status', 1)
                ->where(['category_id' => $Detay->id])
                ->select('products.language','products.year','products.id','products.title','products.condition','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
                ->orderBy("products.year", $basimtarihi )
                ->paginate(21);
            return view('frontend.category.index', compact('Detay', 'ProductList'));
        }
        if(request()->filled('ad')){
            $ProductList = Product::with(['getCategory'])
                ->join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
                ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
                ->where('product_category_pivots.category_id',  $Detay->id)
                ->where('products.status', 1)
                ->where(['category_id' => $Detay->id])
                ->select('products.language','products.year','products.id','products.title','products.condition','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
                ->orderBy("products.title", $ad )
                ->paginate(21);
            return view('frontend.category.index', compact('Detay', 'ProductList'));
        }
        if(request()->filled('fiyat')){
            $ProductList = Product::with(['getCategory'])
                ->join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
                ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
                ->where('product_category_pivots.category_id',  $Detay->id)
                ->where('products.status', 1)
                ->where(['category_id' => $Detay->id])
                ->select('products.language','products.year','products.id','products.title','products.condition','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
                ->orderBy("products.price", $fiyat )
                ->paginate(21);
            return view('frontend.category.index', compact('Detay', 'ProductList'));
        }

        if ($request->filtre == 1){
            $author = null;
            $publisher = null;
            $translator = null;
            $dil = null;
            $condition = null;

            if ($request->has('yazar')) {
                $author = request()->get('yazar');
            }
            if ($request->has('yayinevi')) {
                $publisher = (request()->get('yayinevi')) ? request()->get('yayinevi') : 0;
            }

            if ($request->has('cevirmen')) {
                $translator = (request()->get('cevirmen')) ? request()->get('cevirmen') : 0;
            }

            if ($request->has('dil')) {
                $dil = (request()->get('dil')) ? request()->get('dil') : null;
            }

            if ($request->has('kondisyon')) {
                $condition = (request()->get('kondisyon')) ? request()->get('kondisyon') : null;
            }

            /*
             $translator= (request()->get('cevirmen')) ? request()->get('cevirmen') : null;
            $dil= (request()->get('dil')) ? request()->get('dil') : null;
            $condition= (request()->get('kondisyon')) ? request()->get('kondisyon') : 0;
            */

            $ProductList = Product::with(['getCategory'])
                ->where('condition', 'like', $condition.'%')
                ->where('language', 'like', $dil.'%')
              /*  ->where('translator', 'like', $translator.'%')
                ->where('publisher', 'like', $publisher.'%')*/
                ->paginate(100);
            //dd($ProductList);
            return view('frontend.category.index', compact('Detay', 'ProductList','request'));
        }



        $ProductList = Product::with(['getCategory', 'getAuthor', 'getLanguage', 'getPublisher', 'getTranslator', 'getYear'])
            ->join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
            ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
            ->where('product_category_pivots.category_id',  $Detay->id)
            ->where('products.status', 1)
            ->where(['category_id' => $Detay->id])
            ->select('products.language','products.year','products.id','products.title','products.condition','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
            ->orderBy('products.price','asc')
            ->paginate(21);

        return view('frontend.category.index', compact('Detay', 'ProductList'));
    }
    public function yayinevi($slug){
        $Detay = Publisher::where('slug', $slug)->first();

        SEOTools::setTitle($Detay->title." adl?? yay??nevine ait kitaplar");
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
        SEOTools::setDescription('Tb Kitap 2. El Kitap Kul??b?? |  Sepetim Sayfas??');

        if (Cart::instance('shopping')->content()->count() === 0){
            return redirect()->route('home');
        }
        $Products = Product::select('id', 'title', 'price', 'old_price', 'slug', 'campagin_price')->orderBy('rank')->get();
        return view('frontend.shop.sepet',compact('Products'));
    }
    public function siparis(){

        if (Cart::instance('shopping')->content()->count() === 0){
            return redirect()->route('home');
        }

        return view('frontend.shop.siparis');
    }
    public function odeme(OrderRequest $gelen)
    {

        SEOTools::setTitle("??deme | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap 2. El Kitap ??deme Sayfas??');

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
        $request->setPrice(Cart::instance('shopping')->total());
        $request->setPaidPrice(1);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId($sepetId);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(route('cekim',['sepetId'=> $sepetId]));
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
        $buyer->setCity('??stanbul');
        $buyer->setCountry("T??rkiye");
        $buyer->setZipCode("34000");

        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($gelen->input('name').' '.$gelen->input('surname'));
        $shippingAddress->setCity('??stanbul');
        $shippingAddress->setCountry("T??rkiye");
        $shippingAddress->setAddress($gelen->input('address'));
        $shippingAddress->setZipCode("34000");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($gelen->input('name').' '.$gelen->input('name'));
        $billingAddress->setCity('??stanbul');
        $billingAddress->setCountry("T??rkiye");
        $billingAddress->setAddress($gelen->input('address'));
        $billingAddress->setZipCode('34000');
        $request->setBillingAddress($billingAddress);

        $cartcount = 0;
        $basketItems = [];

        foreach(Cart::instance('shopping')->content() as $cart){
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
        $request->setBasketItems($basketItems);
        $form = CheckoutFormInitialize::create($request, $options);
        return view('frontend.shop.odeme', compact('form', 'gelen'));
    }
    public function cekim(Request $gelen){

      /*  if (request()->isMethod('get')) {
            return redirect()->to('/');
        }*/

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

                DB::transaction(function () use($payment){
                    $ShopCart                   = new ShopCart;
                    $ShopCart->cart_id          = $payment->getBasketId();
                    $ShopCart->user_id          = (auth::check()) ? auth()->user()->id : $payment->getBasketId();
                    $ShopCart->basket_total	    = cargoToplam(Cart::instance('shopping')->total());
                    $ShopCart->order_cargo	    = cargo(Cart::instance('shopping')->total());
                    $ShopCart->name             = session()->get('name');
                    $ShopCart->surname          = session()->get('surname');
                    $ShopCart->email            = session()->get('email');
                    $ShopCart->phone            = session()->get('phone');
                    $ShopCart->address          = session()->get('address');
                    $ShopCart->province         = session()->get('province');
                    $ShopCart->city             = session()->get('city');
                    $ShopCart->note             = session()->get('note');
                    $ShopCart->save();

                    foreach (Cart::instance('shopping')->content() as $c) {
                        Product::where('id', $c->id)->update(['status' => 0]);
                    }

                    foreach (Cart::instance('shopping')->content() as $c) {
                        $Order                  = new Order;
                        $Order->cart_id         = $payment->getBasketId();
                        $Order->product_id      = $c->id;
                        $Order->name            = $c->name;
                        $Order->qty             = $c->qty;
                        $Order->price           = $c->price;
                        $Order->save();
                    }

                    Artisan::call('cache:clear');
                    Cart::instance('shopping')->destroy();
                    session()->flush();
                });
            }
        }

        $Summary  = Order::where('cart_id',request('no') )->get();
        $Customer = ShopCart::where('cart_id',request('no'))->firstOrFail();

        return view('frontend.shop.sonuc', compact('Summary', 'Customer'));


    }
    public function cartdelete($rowId){
        Cart::instance('shopping')->remove($rowId);
        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('sepet');
    }
    public function cartdestroy(){
        Cart::instance('shopping')->destroy();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('home');
    }
    public function search(SearchRequest $request){

        SEOTools::setTitle($request->q." ile ilgili arama sonu??lar?? | Online 2. El Kitap | ". config('app.name'));
        SEOTools::setDescription('Tb Kitap 2. El Kitap Kl??b?? Arama Sayfas??');

        $search = htmlentities(trim($request->q));

        $Publisher = Publisher::where('title','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->select('title', 'slug', 'status')
            ->paginate(12);

        $Result  = Product::where('title','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->select('id', 'title', 'price', 'old_price', 'slug','bestselling','status', 'condition')
            ->paginate(12);

        Search::create(['key' => $search]);

        return view('frontend.shop.search', compact('Result', 'search'));

    }
    public function detayliaramasonuc(Request $request){

        SEOTools::setTitle("Detayl?? Arama | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap 2. El Kitap Detayl?? Arama Sayfas??');

        $Ad = $request->ad;
        $Ceviren = $request->ceviren;
        $Yayinevi = $request->yayinevi;
        $Dil = $request->dil;
        $BasimTarihi1 = $request->basimtarihi1;
        $BasimTarihi2 = $request->basimtarihi2;
        $Fiyat1 = $request->fiyat1;
        $Fiyat2 = $request->fiyat2;

        $Kategori = $request->kategori;
        $Yazar = $request->yazar;

        $Result = Product::query()->with(['getCategory', 'getAuthor']);

        if (!empty($Ad)) {
            $Result = $Result->where('title', 'like', '%'.$Ad.'%');
            $Result = $Result->where('slug', 'like', '%'.$Ad.'%');
        }

        if (!empty($Yazar)) {
            $Result = $Result->whereRelation('getAuthor', 'author_id', '=', $Yazar);
        }

        if (!empty($Kategori)) {
            $Result = $Result->whereRelation('getCategory', 'category_id', '=', $Kategori);
        }

        if (!empty($Ceviren)) {
            $Result = $Result->where('translator', 'like', $Ceviren.'%');
        }

        if (!empty($Yayinevi)) {
            $Result = $Result->where('publisher', 'like', $Yayinevi.'%');
        }

        if (!empty($Dil)) {
            $Result = $Result->where('language', $Dil);
        }

        if (!empty($BasimTarihi1 || $BasimTarihi2)) {
            $Result = $Result->whereBetween('year', [$BasimTarihi1,$BasimTarihi2]);
        }

        if (!empty($Fiyat1 || $Fiyat2)) {
            $Result = $Result->whereBetween('price', [$Fiyat1,$Fiyat2]);
        }

        $Result = $Result->get();

        return view('frontend.shop.detailsearchresult', compact('Result'));
    }
    public function detayliarama(){

        SEOTools::setTitle("Detayl?? Arama | Online 2. El Kitap". config('app.name'));
        SEOTools::setDescription('Tb Kitap 2. El Kitap Detayl?? Arama Sayfas??');

        $Language = Language::select('id', 'title')->get();
        $Publisher = Publisher::select('id', 'title')->get();
        $Translator = Translator::select('id', 'title')->get();
        $Author = Author::select('id', 'title')->get();
        $Years = Years::select('id', 'title')->get();

        return view('frontend.shop.detailsearch', compact('Language', 'Publisher', 'Translator', 'Author', 'Years'));
    }
    public function addtocart(Request $request){

        if(auth()->check()){
            Favorite::where('user_id', auth()->user()->id)->where('product_id',$request->id)->delete();
        }

        $p = Product::find($request->id);
        Basket::create(['product_id' => $p->id, 'basket_name' => 'Sepet']);
        Cart::instance('shopping')->add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => null,
                    'url' => $p->slug
                ]
            ]);

        alert()->image('Sepete Eklendi!',$p->title,(!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),'250','250', 'asd');

        //alert(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('sepet');
    }
    public function hizlisatinal(Request $request){

        Cart::instance('shopping')->destroy();

        $p = Product::find($request->id);
        Basket::create(['product_id' => $p->id, 'basket_name' => 'Hizli Sat??n Al']);
        Cart::instance('shopping')->add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => null,
                    'url' => $p->slug
                ]
            ]);

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('siparis');

    }
    public function favoriekle(Request $request){
        $p = Product::find($request->id);
        $New = Favorite::updateOrCreate(['user_id' => auth()->user()->id, 'product_id' => $p->id]);
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('favori');
    }
    public function favori(){
        SEOTools::setTitle('Favori Listem | Online 2. El Kitap | '. config('app.name'));
        SEOTools::setDescription('Tb Kitap Detayl?? 2. El Kitap Kl??b?? Arama Sayfas??');

        $Favorite = Favorite::select('product_id')->where('user_id', auth()->user()->id)->get()->toArray();
        $FavoriteBooks = Product::select('id', 'title', 'price', 'old_price', 'slug','bestselling','status', 'condition')
        ->whereIn('id', $Favorite)->get();
        return view('frontend.shop.favori', compact('Favorite', 'FavoriteBooks'));
    }
    public function favoricikar($id){
        $Delete = Favorite::where('product_id',$id)->where('user_id', auth()->user()->id)->delete();
        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('favori');

    }
    public function yazarlar(){
        $Alfabe = ["A", "B", "C","??", "D", "E", "F", "G", "H", "I","??", "J", "K", "L", "M", "N", "O","??", "P", "Q", "R", "S", "T", "U","??","V", "W", "X", "Y", "Z"];
        $search = (request('q')) ? request('q') : null;
        $All = Author::withCount('getBookCount')->where('title','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->where('status', 1)
            ->get();
        SEOTools::setTitle("Yazarlar Listesi |  TB Kitap | Online ??kinci El Kitap Sat??????" );
        SEOTools::setDescription('Tb Kitap online kitap sat???? sitesinde kitaplar?? bulunan yazarlar??n listesi');
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

        $Books = Product::select('id', 'title', 'price', 'old_price', 'slug','bestselling','status', 'condition')
->withCount('getAuthor')->whereHas('getAuthor', function ($query) use ($Detay){
            return $query->where('author_id', $Detay->id);
        })->get();
        //dd($Books);
        return view('frontend.author.index', compact('Detay', 'Books'));
    }
    public function mailsubcribes(MailRequest $request){
        MailSubcribes::create(['email_address' => $request->email, 'ip_address' => $request->ip()]);
        toast('Email Adresiz B??lten Listesine Eklendi','success');
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

        SEOTools::setTitle("??leti??im | ". config('app.name'));
        SEOTools::setDescription('Tb Kitap ??leti??im Sayfas??');

        return view('frontend.page.contactus');
    }
    public function kargosorgulama(){
        return view('frontend.page.cargo');
    }
    public function profilim(){

        if (auth()->user()->is_admin == 1){
            return redirect()->route('go');
        }
        $Favorite = Favorite::select('product_id')->where('user_id', auth()->user()->id)->get()->toArray();
        $FavoriteBooks = Product::select('id', 'title', 'price', 'old_price', 'slug','bestselling','status', 'condition')
            ->whereIn('id', $Favorite)->get();

        return view('frontend.dashboard.index', compact('FavoriteBooks'));
    }
}
