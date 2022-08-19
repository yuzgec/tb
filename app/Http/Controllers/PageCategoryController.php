<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageCategoryRequest;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageCategoryController extends Controller
{

    public function index()
    {
        $All = PageCategory::get()->toFlatTree();
        return view('backend.pagecategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = PageCategory::pluck('title', 'id');
        return view('backend.pagecategory.create',  compact('Kategori'));
    }

    public function store(PageCategoryRequest $request)
    {
        $New = new PageCategory;

        $New->title = $request->title;

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
            $node = PageCategory::find($request->parent_id);
            $node->appendNode($New);
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('page-categories.index');

    }


    public function show($id)
    {
        $Show = PageCategory::findOrFail($id);
        return view('frontend.pagecategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = PageCategory::findOrFail($id);
        $Kategori = PageCategory::pluck('title', 'id');
        return view('backend.pagecategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(PageCategoryRequest $request, $id)
    {

        //dd($request->all());
        $Update = PageCategory::findOrFail($id);

        $Update->title = $request->title;
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
            $node = PageCategory::find($request);
            $node->appendNode($Update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('page-categories.index');

    }

    public function destroy($id)
    {
        $Delete = PageCategory::find($id);
        if($Delete->getCategoryCount() > 0){
            alert()->error('Silinemez','Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('page-categories.index');
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
