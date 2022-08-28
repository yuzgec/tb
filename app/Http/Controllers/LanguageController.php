<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

    public function index()
    {
        $All = Language::all();
        //dd($All);
        return view('backend.language.index', compact('All'));
    }

    public function create()
    {
        return view('backend.language.create');
    }

    public function store(Request $request)
    {
        $New = new Language;
        $New->title = $request->title;
        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');

        return redirect()->route('language.index');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Edit = Language::findOrFail($id);
        return view('backend.language.edit', compact('Edit'));
    }

    public function update(Request $request, $id)
    {
        $Update = Language::findOrFail($id);
        $Update->title = $request->title;
        $Update->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('language.index');
    }

    public function destroy($id)
    {
        $Delete = Language::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('language.index');
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Language::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Language::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }
}
