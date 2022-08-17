<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $All = Faq::with('getCategory')->orderBy('rank')->get();
        $Kategori = FaqCategory::all();
        return view('backend.faq.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = FaqCategory::pluck('title', 'id');
        return view('backend.faq.create',  compact('Kategori'));
    }


    public function store(FaqRequest $request)
    {
        $New = new Faq;
        $New->title = $request->title;
        $New->category = $request->category;
        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->save();
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('faq.index');

    }


    public function show($id)
    {
        $Show = Faq::findOrFail($id);
        return view('frontend.faq.index', compact('Show'));

    }

    public function edit($id)
    {
        $Edit = Faq::findOrFail($id);
        $Kategori = FaqCategory::pluck('title', 'id');
        return view('backend.faq.edit', compact('Edit', 'Kategori'));
    }

    public function update(FaqRequest $request, $id)
    {
        $Update = Faq::findOrFail($id);
        $Update->title = $request->title;
        $Update->category = $request->category;
        $Update->short = $request->short;
        $Update->desc = $request->desc;

        $Update->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('faq.index');

    }

    public function destroy($id)
    {
        $Delete = Faq::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('faq.index');
    }

    public function getTrash(){
        $Trash = Faq::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.faq.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('faq') as  $key => $rank ){
            Faq::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Faq::findOrFail($request->id);
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
