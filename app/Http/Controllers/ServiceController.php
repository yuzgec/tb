<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $All = Service::with('getCategory')->orderBy('rank')->get();
        $Kategori = ServiceCategory::all();
        return view('backend.service.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = ServiceCategory::pluck('title', 'id');
        return view('backend.service.create',  compact('Kategori'));
    }


    public function store(ServiceRequest $request)
    {
        $New = new Service;
        $New->title = $request->title;
        $New->slug = seo($request->title);
        $New->category = $request->category;
        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        if($request->hasfile('image')){
            $New->addMedia($request->image)->withResponsiveImages()->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $New->addMedia($item)->withResponsiveImages()->toMediaCollection('gallery');
            }
        }

        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('service.index');

    }


    public function show($id)
    {
        $Show = Service::findOrFail($id);
        return view('frontend.service.index', compact('Show'));
    }

    public function edit($id)
    {


        $Edit = Service::findOrFail($id);

        //dd($Edit->getMedia('page'));
        $Kategori = ServiceCategory::pluck('title', 'id');
        return view('backend.service.edit', compact('Edit', 'Kategori'));
    }

    public function update(ServiceRequest $request, $id)
    {
        $Update = Service::findOrFail($id);
        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->category = $request->category;
        $Update->short = $request->short;
        $Update->desc = $request->desc;

        $Update->seo_title = $request->seo_title;
        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;

        if($request->removeImage == "1"){
            $Update->media()->where('collection_name', 'page')->delete();
        }

        if ($request->hasFile('image')) {
            $Update->media()->where('collection_name', 'page')->delete();
            $Update->addMedia($request->image)->withResponsiveImages()->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $Update->addMedia($item)->withResponsiveImages()->toMediaCollection('gallery');
            }
        }

        $Update->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('service.index');

    }

    public function destroy($id)
    {
        $Delete = Service::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('service.index');
    }

    public function getTrash(){
        $Trash = Service::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.service.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('service') as  $key => $rank ){
            Service::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Service::findOrFail($request->id);
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

        $Delete = Service::find($id);
        $Delete->media()->where('id', \request('image_id'))->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('service.edit', $id);

    }
}
