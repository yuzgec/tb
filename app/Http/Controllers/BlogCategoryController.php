<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $All = BlogCategory::get()->toFlatTree();
        return view('backend.blogcategory.index', compact('All'));
    }

    public function create()
    {
        $Kategori = BlogCategory::pluck('title', 'id');
        return view('backend.blogcategory.create', compact('Kategori'));
    }

    public function store(BlogCategoryRequest $request)
    {
        $New = new BlogCategory;

        $New->title = $request->title;
        $New->slug = seo($request->title);

        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        $New->save();

        if ($request->image) {
            $New->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent_id) {
            $node = BlogCategory::find($request->parent_id);
            $node->appendNode($New);
        }

        toast(SWEETALERT_MESSAGE_CREATE, 'success');
        return redirect()->route('service-categories.index');

    }


    public function show($id)
    {
        $Show = BlogCategory::findOrFail($id);
        return view('frontend.blogcategory.index', compact('Show'));
    }

    public function edit($id)
    {
        $Edit = BlogCategory::findOrFail($id);
        $Kategori = BlogCategory::pluck('title', 'id');
        return view('backend.blogcategory.edit', compact('Edit', 'Kategori'));
    }

    public function update(BlogCategoryRequest $request, $id)
    {

        $Update = BlogCategory::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->short = $request->short;
        $Update->desc = $request->desc;

        $Update->seo_title = $request->seo_title;
        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;

        $Update->parent_id = $request->parent_id;

        $Update->save();

        if ($request->hasFile('image')) {
            $Update->media()->delete();
            $Update->addMedia($request->image)->toMediaCollection();
        }

        if ($request->parent) {
            $node = BlogCategory::find($request);
            $node->appendNode($Update);
        }

        toast(SWEETALERT_MESSAGE_UPDATE, 'success');
        return redirect()->route('service-categories.index');

    }

    public function destroy($id)
    {
        $Delete = BlogCategory::find($id);
        if ($Delete->getCategoryCount() > 0) {
            alert()->error('Silinemez', 'Kategoriye ait sayfa bulunmaktadır.');
            return Redirect::back();
        }
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE, 'success');
        return redirect()->route('service-categories.index');
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
