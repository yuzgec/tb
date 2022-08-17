<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\MailSubcribes;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
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
class HomeController extends Controller
{


    public function index()
    {

        $Products = Product::select('id', 'title', 'price', 'old_price', 'slug','bestselling')->orderBy('rank')->get();
        $Slider = Slider::with('getProduct')->where('status', 1)->get();
        return view('frontend.index', compact('Products','Slider'));
    }

    public function kategori($url){
        $Detay = ProductCategory::where('slug', $url)->select('id','title','slug')->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'category');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        $ProductList = Product::join('product_category_pivots', 'product_category_pivots.product_id', '=', 'products.id' )
            ->join('product_categories', 'product_categories.id', '=', 'product_category_pivots.category_id')
            ->where('product_category_pivots.category_id', '=', $Detay->id)
            ->where('products.status', '=', 1)
            ->where(['category_id' => $Detay->id])
            ->select('products.id','products.title','products.rank','products.slug','products.price','products.old_price','products.slug','product_category_pivots.category_id', 'product_categories.parent_id')
            ->orderBy('products.rank','ASC')->paginate(9);
        //dd($Pro);
        return view('frontend.kategori.index', compact('Detay', 'ProductList'));
    }
    public function kurumsal($url){
        $Detay = Page::where('slug', $url)->firstOrFail();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'page');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        return view('frontend.kurumsal.index', compact('Detay'));
    }
    public function iletisim(){
        return view('frontend.sayfa.iletisim');
    }
    public function sepet(){

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
        $Province = DB::table('sehir')->get();
        return view('frontend.shop.siparis', compact('Province'));
    }
    public function urun($url){

        $Detay = Product::with('getCategory')->where('slug', $url)->firstOrFail();
        //dd($Detay->getCategory->category_id);
        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');
        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);
        $Province = DB::table('sehir')->get();
        $Productssss = Product::with('getCategory')->where('status', 1)->whereHas('getCategory', function ($query) use ($Detay){
            $query->where('category_id','=',$Detay->getCategory->category_id);
        })->orderBy('rank','ASC')->get();
        //dd($Productssss);

        return view('frontend.urun.index', compact('Detay','Count','Comments','Province', 'Productssss'));
    }
    public function kargosorgulama(){
        return view('frontend.kargo.index');
    }
    public function kaydet(OrderRequest $request){

        $p = Product::find($request->id);

        if ($request->kampanya == 1){
            Cart::destroy();

            Cart::add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => 0,
                ]
            ]);
        }

        //Basket::create(['product_id' => $p->id, 'basket_name' => 'Sepet']);
        $Cart_Id = time();
        DB::transaction(function () use ($request, $Cart_Id) {
            $ShopCart                   = new ShopCart;
            $ShopCart->cart_id          = $Cart_Id ;
            $ShopCart->user_id          = $Cart_Id ;
            $ShopCart->basket_total     = cargoToplam(Cart::total());

            $ShopCart->name             = $request->name;
            $ShopCart->surname          = $request->surname;
            $ShopCart->email            = $request->email;
            $ShopCart->phone            = $request->phone;
            $ShopCart->address          = $request->address;
            $ShopCart->city             = $request->province;
            $ShopCart->province         = $request->city;
            $ShopCart->note             = $request->note;
            $ShopCart->order_medium     = 'takigetir.com';
            $ShopCart->order_cargo      = (Cart::total() < CARGO_LIMIT) ? CARGO_PRICE : null;

            $details = [];
            foreach (Cart::content() as $c) {
                $details[] = 'Ürün : '.$c->name.' x '. $c->qty.' = '.$c->price;
            }

            //dd($details);

            $ShopCart->order_details    = implode(',', $details);

            $ShopCart->save();

            foreach (Cart::content() as $c) {
                $Order                  = new Order;
                $Order->cart_id         = $Cart_Id;
                $Order->product_id      = $c->id;
                $Order->name            = $c->name;
                $Order->qty             = $c->qty;
                $Order->price           = $c->price;
                $Order->save();
            }

            $Cart = Cart::content();

            if($request->filled('email')){
                Mail::send("frontend.mail.siparis",compact('Cart', 'ShopCart'),function ($message) use($ShopCart) {
                    $message->to($ShopCart->email)->subject('Syn. '.$ShopCart->name.' '. $ShopCart->surname.' siparişiniz başarıyla oluşturmuştur.');
                });
            }

            Mail::send("frontend.mail.siparis",compact('Cart', 'ShopCart'),function ($message) use($ShopCart) {
                $message->to(MAIL_SEND)->subject($ShopCart->name.' '. $ShopCart->surname.' siparişiniz başarıyla oluşturmuştur.');
            });

            $Sms = 'Siparişiniz başarıyla oluşturulmuştur. Sipariş onayı için '.config('settings.telefon2').' nolu telefondan aranacaksınız. Hayırlı günler dileriz.';

            $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://panel.nac.com.tr/api/json/syncreply/SendInstantSms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
				"Credential": {
				"Username":'.env("SMS_USER_NAME").',
				"Password":'.env("SMS_PASSWORD").',
				"ResellerID":'.env("SMS_RESELLER_ID").'
				},
				"Sms": {
				"ToMsisdns": [
				{
				"Msisdn": '.$ShopCart->phone.',
				"Name": "",
				"Surname": "",
				"CustomField1": "[Mesaj1]:'.$Sms.'"
				}
				],
				"ToGroups": [
				0
				],
				"IsCreateFromTeplate": true,
				"SmsTitle": '.env("SMS_SENDER_NO").',
				"SmsContent": "[Mesaj1]",
				"SmsSendingType": "ByNumber",
				"SmsCoding": "SmsCoding",
				"SenderName": '.env("SMS_SENDER_NO").',
				"DataCoding": "Default"

				}
				}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            $Stock = DB::table('campagin_stock')->decrement('stock');
            $StockUpdate = DB::table('campagin_stock')->where('stock', '<=', 30)->update(['stock' => 299]);

            Cart::destroy();
        });

        return redirect()->route('sonuc',['no'=>$Cart_Id]);
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
    public function mailsubcribes(Request $request){
        MailSubcribes::create(['email_address' => $request->email, 'ip_address' => $request->ip()]);
        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('home');
    }
    public function search(SearchRequest $request){
        $search = $request->q;
        $Result = Product::where('title','like','%'.$search.'%')
                    ->orWhere('slug','like','%'.$search.'%')
                    ->where('status', 1)
                    ->paginate(12);

        Search::create(['key' => $search]);

        return view('frontend.shop.search', compact('Result'));
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
    public function kampanya(){


        $Detay = Product::with('getCategory')->where('opportunity', 1)->firstOrFail();
        $Stock = DB::table('campagin_stock')->where('product_id', $Detay->id)->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);

        return view('frontend.shop.kampanya', compact('Detay', 'Count', 'Comments', 'Stock'));
    }

    public function kiblegahkampanya(){
        $Detay = Product::with('getCategory')->where('id',40)->firstOrFail();
        $Stock = DB::table('campagin_stock')->where('product_id', $Detay->id)->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);
        return view('frontend.shop.kampanyakiblegah', compact('Detay', 'Count', 'Comments', 'Stock'));
    }


    public function sozcukkampanya(){
        $Detay = Product::with('getCategory')->where('id',41)->firstOrFail();
        $Stock = DB::table('campagin_stock')->where('product_id', $Detay->id)->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);
        return view('frontend.shop.sozcukkampanya', compact('Detay', 'Count', 'Comments', 'Stock'));
    }


    public function hayvankampanya(){
        $Detay = Product::with('getCategory')->where('id',43)->firstOrFail();
        $Stock = DB::table('campagin_stock')->where('product_id', $Detay->id)->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);
        return view('frontend.shop.hayvankampanya', compact('Detay', 'Count', 'Comments', 'Stock'));
    }


    public function ilmihalkampanya(){
        $Detay = Product::with('getCategory')->where('id',42)->firstOrFail();
        $Stock = DB::table('campagin_stock')->where('product_id', $Detay->id)->first();

        SEOTools::setTitle($Detay->title);
        SEOTools::setDescription($Detay->seo_desc);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(route('urun', $Detay->slug));
        SEOTools::opengraph()->addProperty('type', 'product');

        SEOTools::jsonLd()->addImage($Detay->getFirstMediaUrl('page','thumb'));

        views($Detay)->cooldown(60)->record();
        $Count = views($Detay)->unique()->period(Period::create(Carbon::today()))->count();;
        $Comments = Comment::where('product_id', $Detay->id)->where('status', 1)->paginate(40);
        return view('frontend.shop.ilmihalkampanya', compact('Detay', 'Count', 'Comments', 'Stock'));
    }
}
