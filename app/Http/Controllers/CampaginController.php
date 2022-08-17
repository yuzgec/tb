<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaginRequest;
use App\Models\Campagin;
use Illuminate\Http\Request;

class CampaginController extends Controller
{
    public function index()
    {
        $All = Campagin::orderBy('rank')->get();
        return view('backend.campagin.index', compact('All'));
    }

    public function create()
    {
        return view('backend.campagin.create');
    }


    public function store(CampaginRequest $request)
    {
        //dd($request);
        $New = new Campagin;
        $New->title = $request->title;
        $New->slug = seo($request->title);
        $New->external = $request->external;

        $New->start_date = $request->start_date;
        $New->end_date = $request->end_date;

        $New->price = $request->price;
        $New->old_price = $request->old_price;
        $New->sku = $request->sku;
        $New->cargo = $request->cargo;
        $New->stock = $request->stock;

        $New->short = $request->short;
        $New->note = $request->note;
        $New->cargo = $request->cargo;
        $New->featrues = $request->featrues;
        $New->desc = $request->desc;


        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;


        if($request->hasfile('image')){
            $New->addMedia($request->image)->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $New->addMedia($item)->toMediaCollection('gallery');
            }
        }
        $New->save();


        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('campagin.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Edit = Campagin::find($id);
        return view('backend.Campagin.edit', compact('Edit'));
    }

    public function update(CampaginRequest $request, $id)
    {
        $Update = Campagin::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->external = $request->external;

        $Update->start_date = $request->start_date;
        $Update->end_date = $request->end_date;

        $Update->price = $request->price;
        $Update->old_price = $request->old_price;
        $Update->sku = $request->sku;
        $Update->cargo = $request->cargo;
        $Update->stock = $request->stock;

        $Update->short = $request->short;
        $Update->note = $request->note;
        $Update->cargo = $request->cargo;
        $Update->featrues = $request->featrues;
        $Update->desc = $request->desc;

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

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('campagin.index');

    }

    public function destroy($id)
    {
        $Delete = Campagin::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('campagin.index');
    }

    public function getTrash(){
        $Trash = Campagin::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.campagin.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Campagin::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Campagin::findOrFail($request->id);
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


}
