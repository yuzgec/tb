<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $All = Team::with('getCategory')->orderBy('rank')->get();
        $Kategori = TeamCategory::all();
        return view('backend.team.index', compact('All', 'Kategori'));
    }

    public function create()
    {
        $Kategori = TeamCategory::pluck('title', 'id');
        return view('backend.team.create',  compact('Kategori'));
    }

    public function store(TeamRequest $request)
    {

        $data = $request->except(['_token', 'image']);
        $New = new Team;
        $New->title = $request->title;
        $New->slug = seo($request->title);
        $New->category = $request->category;
        $New->short = $request->short;
        $New->desc = $request->desc;

        $New->master = $request->master;
        $New->instagram = $request->instagram;
        $New->youtube = $request->youtube;

        $New->seo_desc = $request->seo_desc;
        $New->seo_key = $request->seo_key;
        $New->seo_title = $request->seo_title;

        if($request->image){
            $New->addMedia($request->image)->toMediaCollection();
        }

        $New->save();
        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('team.index');
    }

    public function show($id)
    {
        $Show = Team::findOrFail($id);
        return view('frontend.team.index', compact('Show'));

    }

    public function edit($id)
    {
        $Edit = Team::findOrFail($id);
        $Kategori = TeamCategory::pluck('title', 'id');
        return view('backend.team.edit', compact('Edit', 'Kategori'));
    }

    public function update(TeamRequest $request, $id)
    {

        $Update = Team::findOrFail($id);

        $Update->title = $request->title;
        $Update->slug = seo($request->title);
        $Update->category = $request->category;
        $Update->short = $request->short;
        $Update->desc = $request->desc;

        $Update->master = $request->master;
        $Update->instagram = $request->instagram;
        $Update->youtube = $request->youtube;

        $Update->seo_title = $request->seo_title;
        $Update->seo_desc = $request->seo_desc;
        $Update->seo_key = $request->seo_key;
        $Update->save();

        if ($request->hasFile('image')) {
            $Update->media()->delete();
            $Update->addMedia($request->image)->toMediaCollection();
        }

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('team.index');
    }

    public function destroy($id)
    {
        $Delete = Team::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('team.index');
    }

    public function getTrash(){
        $Trash = Team::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('backend.team.trash', compact('Trash'));
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Team::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Team::findOrFail($request->id);
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
