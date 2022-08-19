<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $All = Product::with('getCategory')->orderBy('rank')->get();
        $Kategori = ProductCategory::all();
        return view('backend.product.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = ProductCategory::pluck('title', 'id');
        return view('backend.product.create',  compact('Kategori'));
    }


    public function store(ProductRequest $request)
    {
        //dd($request->all());
        $New = new Product;
        $New->title = $request->title;
        $New->external = $request->external;

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

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;


        //dd($request->input('category'));


        if($request->hasfile('image')){
            $New->addMedia($request->image)->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $New->addMedia($item)->toMediaCollection('gallery');
            }
        }
        //dd($request->input('category'));

        $New->save();

        if ($request->input('category')){
            foreach($request->input('category') as $pc) {
                ProductCategoryPivot::create(['category_id' => $pc, 'product_id' => $New->id]);
            }
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('product.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Edit = Product::with('getCategory')->find($id);
        $Pivot = ProductCategoryPivot::where(['product_id'=> $id])->get();
        return view('backend.product.edit', compact('Edit','Pivot'));
    }

    public function update(ProductRequest $request, $id)
    {
        $Update = Product::with('getCategory')->findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);

        $Update->external = $request->external;

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

        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;
        $Update->seo_title = $request->seo_title;

        if($request->removeImage == "1"){
            $Update->media()->where('collection_name', 'page')->delete();
        }

        if ($request->hasFile('image')) {
            $Update->media()->where('collection_name', 'page')->delete();
            $Update->addMedia($request->image)->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $Update->addMedia($item)->toMediaCollection('gallery');
            }
        }

        $Update->save();

        if($request->input('category')) {
            foreach($request->input('category') as $pc) {
                ProductCategoryPivot::where(['product_id' => $Update->id])->delete();
            }
            foreach($request->input('category') as $pc) {
                ProductCategoryPivot::updateOrCreate(['category_id' => $pc, 'product_id' => $Update->id]);
            }
        }

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
        $update=Product::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
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
