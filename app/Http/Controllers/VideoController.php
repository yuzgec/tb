<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $All = Video::with('getCategory')->orderBy('rank')->get();
        $Kategori = VideoCategory::all();
        return view('backend.video.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = VideoCategory::pluck('title', 'id');
        return view('backend.video.create',  compact('Kategori'));
    }


    public function store(VideoRequest $request)
    {
        $New = new Video;

        $New->title = $request->title;
        $New->slug = seo($request->title);
        $New->video_url = $request->video_url;
        $New->category = $request->category;
        $New->desc = $request->desc;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        if($request->image){
            $New->addMedia($request->image)->toMediaCollection();
        }

        $New->save();
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('video.index');

    }


    public function show($id)
    {
        $Show = Video::findOrFail($id);
        return view('frontend.video.index', compact('Show'));

    }

    public function edit($id)
    {
        $Edit = Video::findOrFail($id);
        $Kategori = VideoCategory::pluck('title', 'id');
        return view('backend.video.edit', compact('Edit', 'Kategori'));
    }

    public function update(VideoRequest $request, $id)
    {

        $Update = Video::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->category = $request->category;
        $Update->video_url = $request->video_url;
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
        return redirect()->route('video.index');

    }

    public function destroy($id)
    {
        $Delete = Video::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('video.index');
    }

    public function getTrash(){
        $Trash = Video::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.video.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Video::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Video::findOrFail($request->id);
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
