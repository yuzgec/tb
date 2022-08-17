<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoCategoryRequest;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VideoCategoryController extends Controller
{

    public function index()
    {
        $All = VideoCategory::get()->toFlatTree();
        return view('backend.videocategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = VideoCategory::pluck('title', 'id');
        return view('backend.videocategory.create',  compact('Kategori'));
    }

    public function store(VideoCategoryRequest $request)
    {
        $New = new VideoCategory;

        $New->title = $request->title;
        $New->slug = seo($request->title);

        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        $New->save();

        if($request->image){
            $New->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent_id){
            $node = VideoCategory::find($request->parent_id);
            $node->appendNode($New);
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('video-categories.index');

    }


    public function show($id)
    {
        $Show = VideoCategory::findOrFail($id);
        return view('frontend.videocategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = VideoCategory::findOrFail($id);
        $Kategori = VideoCategory::pluck('title', 'id');
        return view('backend.videocategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(VideoCategoryRequest $request, $id)
    {

        //dd($request->all());
        $Update = VideoCategory::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->short = $request->short;
        $Update->desc = $request->desc;

        $Update->seo_title = $request->seo_title;
        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;

        $Update->parent_id  = $request->parent_id;

        $Update->save();

        if ($request->hasFile('image')) {
            $Update->media()->delete();
            $Update->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent){
            $node = VideoCategory::find($request);
            $node->appendNode($Update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('video-categories.index');

    }

    public function destroy($id)
    {
        $Delete = VideoCategory::find($id);

        if($Delete->getCategoryCount() > 0){
            alert()->error('Silinemez','Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('video-categories.index');
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
