<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Author;
use App\Models\AuthorPivot;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\Publisher;
use App\Models\Translator;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        if (request()->filled('q')){
            $All = Product::with(['getCategory', 'getYear', 'getAuthor', 'getLanguage'])
                ->where('title', 'like', '%'. request('q'). '%')
                ->orWhere('slug', 'like', '%'. request('q'). '%')
                ->orderBy('rank')
                ->paginate(75);
        }else{

        $All = Product::with(['getCategory', 'getYear', 'getAuthor', 'getLanguage'])->orderBy('rank','asc')->paginate(100);
        }
        return view('backend.product.index', compact('All'));
    }

    public function create()
    {
        $Kategori = ProductCategory::get()->toFlatTree();
        $Years =  Years::all();
        $Author = Author::all();
        $Publisher = Publisher::all();
        $Language = Language::all();
        $Translator = Translator::all();

        $LastID = Product::orderBy('id', 'desc')->first();
        $Last = str_replace('TB-', '',$LastID->sku);

        return view('backend.product.create',
            compact('Kategori', 'Years', 'Author',  'Publisher', 'Language', 'Translator', 'Last'));
    }

    public function store(ProductRequest $request)
    {
        DB::transaction(function () use ($request){
            $New = new Product;
            $New->title = $request->title;

            $New->price = $request->price;
            $New->old_price = $request->old_price;
            $New->campagin_price = $request->campagin_price;
            $New->sku = $request->sku;

            $New->short = $request->short;
            $New->note = $request->note;
            $New->cargo = $request->cargo;
            $New->featrues = $request->featrues;
            $New->desc = $request->desc;

            $New->freecargo = $request->freecargo;
            $New->fastkargo = $request->fastkargo;
            $New->bigopportunity = $request->bigopportunity;

            $New->opportunity = $request->opportunity;
            $New->offer = $request->offer;
            $New->bestselling = $request->bestselling;

            $New->option1 = $request->option1;
            $New->option2 = $request->option2;
            $New->option3 = $request->option3;
            $New->option4 = $request->option4;

            $New->language = $request->language;
            $New->publisher = $request->publisher;
            $New->translator = $request->translator;
            $New->year = $request->year;
            $New->condition = $request->condition;

            $New->seo_desc = $request->seo_desc;
            $New->seo_key = $request->seo_key;
            $New->seo_title = $request->seo_title;

            //dd($request->input('category'));

            if ($request->hasfile('image')) {
                $New->addMedia($request->image)->toMediaCollection('page');
            }

            if ($request->hasfile('gallery')) {
                foreach ($request->gallery as $item) {
                    $New->addMedia($item)->toMediaCollection('gallery');
                }
            }

            $New->save();

            if ($request->input('author')) {
                foreach ($request->input('author') as $pc) {
                    AuthorPivot::updateOrCreate(['author_id' => $pc, 'product_id' => $New->id]);
                }
            }

            if ($request->input('category')) {
                foreach ($request->input('category') as $pc) {
                    ProductCategoryPivot::updateOrCreate(['category_id' => $pc, 'product_id' => $New->id]);
                }
            }

            if ($request->input('author')) {
                $yazarlar = Author::whereIn('id', $request->input('author'))->get();
                foreach ($yazarlar as $item) {
                    $yazar[] = $item->slug;
                }
            }

            if ($request->input('category')) {
                $kategoriler = ProductCategory::whereIn('id', $request->input('category'))->get();
                foreach ($kategoriler as $item) {
                    $kategori[] = $item->slug;
                }
            }

            //dd($yazar);

                $Url = Product::find($New->id);
                $K = implode("/", $kategori);
                $Y = implode("/", $yazar);
                $Url->slug = $K.'/'.$Y.'/'.$Url->slug.'?urunno='.$Url->sku;
                $Url->save();



        });
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('product.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Edit = Product::with(['getCategory', 'getAuthor', 'getLanguage', 'getPublisher', 'getTranslator', 'getYear'])->find($id);
        $Pivot = ProductCategoryPivot::where(['product_id'=> $id])->get();
        //dd($Edit);
        $Years =  Years::all();
        $Author = Author::all();
        $Publisher = Publisher::all();
        $Language = Language::all();
        $Translator = Translator::all();

        $a= [];
        foreach ($Edit->getAuthor as $item){
            $a[] = $item->author_id;
        }
        $Authors = AuthorPivot::select('author_id')->whereIn('author_id',$a)->get();

        return view('backend.product.edit', compact('Edit','Pivot', 'Years', 'Author', 'Authors','Publisher', 'Language', 'Translator'));
    }

    public function update(ProductRequest $request, $id)
    {
        //dd($request->all());
        DB::transaction(function () use ($request, $id) {

            $Update = Product::findOrFail($id);
            $Update->title = $request->title;
            $Update->price = $request->price;
            $Update->old_price = $request->old_price;
            $Update->campagin_price = $request->campagin_price;
            $Update->sku = $request->sku;

            $Update->short = $request->short;
            $Update->note = $request->note;
            $Update->cargo = $request->cargo;
            $Update->featrues = $request->featrues;
            $Update->desc = $request->desc;

            $Update->opportunity = $request->opportunity;
            $Update->offer = $request->offer;
            $Update->bestselling = $request->bestselling;

            $Update->freecargo = $request->freecargo;
            $Update->fastkargo = $request->fastkargo;
            $Update->bigopportunity = $request->bigopportunity;

            $Update->option1 = $request->option1;
            $Update->option2 = $request->option2;
            $Update->option3 = $request->option3;
            $Update->option4 = $request->option4;

            $Update->language = $request->language;
            $Update->publisher = $request->publisher;
            $Update->translator = $request->translator;
            $Update->year = $request->year;
            $Update->condition = $request->condition;

            $Update->seo_desc = $request->seo_desc;
            $Update->seo_key = $request->seo_key;
            $Update->seo_title = $request->seo_title;


            if ($request->removeImage == "1") {
                $Update->media()->where('collection_name', 'page')->delete();
            }

            if ($request->hasFile('image')) {
                $Update->media()->where('collection_name', 'page')->delete();
                $Update->addMedia($request->image)->toMediaCollection('page');
            }

            if ($request->hasfile('gallery')) {
                foreach ($request->gallery as $item) {
                    $Update->addMedia($item)->toMediaCollection('gallery');
                }
            }

            $Update->save();

            if ($request->input('author')) {
                foreach ($request->input('author') as $pc) {
                    AuthorPivot::where(['product_id' => $Update->id])->delete();
                }
                foreach ($request->input('author') as $pc) {
                    AuthorPivot::updateOrCreate(['author_id' => $pc, 'product_id' => $Update->id]);
                }
            }

            if ($request->input('category')) {
                foreach ($request->input('category') as $pc) {
                    ProductCategoryPivot::where(['product_id' => $Update->id])->delete();
                }
                foreach ($request->input('category') as $pc) {
                    ProductCategoryPivot::updateOrCreate(['category_id' => $pc, 'product_id' => $Update->id]);
                }
            }


            if ($request->input('author')) {
                $yazarlar = Author::whereIn('id', $request->input('author'))->get();
                foreach ($yazarlar as $item) {
                    $yazar[] = $item->slug;
                }
            }

            if ($request->input('category')) {
                $kategoriler = ProductCategory::whereIn('id', $request->input('category'))->get();
                foreach ($kategoriler as $item) {
                    $kategori[] = $item->slug;
                }
            }

            //dd($yazar);

                $Url = Product::find($id);
                $K = implode("/", $kategori);
                $Y = implode("/", $yazar);
                $Url->slug = null;
                $Url->save();

                $Url->slug = $K . '/' . $Y . '/' . $Url->slug . '?urunno=' . $Url->sku;
                $Url->save();

        });

        toast(SWEETALERT_MESSAGE_UPDATE,'success');

        return redirect()->route('product.index');

    }

    public function destroy($id)
    {
        $Delete = Product::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('product.index');
    }

    public function getTrash(){
        $Trash = Product::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.product.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Product::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        //dd($request);
        $status = ($request->status == "true") ? 1 : 0;
        Product::where('id', $request->id)->update(['status' => $status]);
    }

    public function postUpload(Request $request)
    {

        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = seo($filename).'_'.time().'.'.$extension;
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Resim Yüklendi';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function deleteGaleriDelete($id){

        $Delete = Product::find($id);
        $Delete->media()->where('id', \request('image_id'))->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('product.edit', $id);
    }


}
