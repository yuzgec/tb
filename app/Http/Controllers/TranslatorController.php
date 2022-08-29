<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslatorRequest;
use App\Models\Translator;
use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public function index()
    {
        $All = Translator::orderBy('rank')->paginate(30);
        return view('backend.translator.index', compact('All'));
    }

    public function create()
    {
        return view('backend.translator.create');
    }


    public function store(TranslatorRequest $request)
    {
        $New = new Translator;
        $New->title = $request->title;
        $New->short = $request->short;
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
        return redirect()->route('translator.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Edit = Translator::find($id);
        return view('backend.translator.edit', compact('Edit'));
    }

    public function update(TranslatorRequest $request, $id)
    {
        $Update = Translator::findOrFail($id);

        $Update->title = $request->title;
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
            $Update->addMedia($request->image)->toMediaCollection('page');
        }

        if($request->hasfile('gallery')) {
            foreach ($request->gallery as $item){
                $Update->addMedia($item)->toMediaCollection('gallery');
            }
        }

        $Update->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('translator.index');

    }

    public function destroy($id)
    {
        $Delete = Translator::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('translator.index');
    }

    public function getTrash(){
        $Trash = Translator::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.translator.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Translator::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Translator::findOrFail($request->id);
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
