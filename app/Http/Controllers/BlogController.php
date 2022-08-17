<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\PageRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $All = Blog::with('getCategory')->orderBy('rank')->get();
        $Kategori = BlogCategory::all();
        return view('backend.blog.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = BlogCategory::pluck('title', 'id');
        return view('backend.blog.create',  compact('Kategori'));
    }


    public function store(BlogRequest $request)
    {
        $New = new Blog;
        $New->title = $request->title;
        $New->slug = seo($request->title);
        $New->category = $request->category;
        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        if($request->image){
            $New->addMedia($request->image)->toMediaCollection();
        }

        $New->save();
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('blog.index');

    }


    public function show($id)
    {
        $Show = Blog::findOrFail($id);
        return view('frontend.blog.index', compact('Show'));

    }

    public function edit($id)
    {
        $Edit = Blog::findOrFail($id);
        $Kategori = BlogCategory::pluck('title', 'id');
        return view('backend.blog.edit', compact('Edit', 'Kategori'));
    }

    public function update(PageRequest $request, $id)
    {

        $Update = Blog::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->category = $request->category;
        $Update->short = $request->short;
        $Update->desc = $request->desc;
        $Update->seo_title = $request->seo_title;
        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;
        $Update->save();

        if ($request->hasFile('image')) {
            $Update->media()->delete();
            $Update->addMedia($request->image)->toMediaCollection();
        }
        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('blog.index');

    }

    public function destroy($id)
    {
        $Delete = Blog::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('blog.index');
    }

    public function getTrash(){
        $Trash = Blog::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.blog.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Blog::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Blog::findOrFail($request->id);
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
