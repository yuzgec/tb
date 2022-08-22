<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        $All = Publisher::all();
        return view('backend.publisher.index', compact('All'));
    }

    public function create()
    {
        return view('backend.publisher.create');
    }

    public function store(Request $request)
    {
        $New = new Publisher;
        $New->title = $request->title;

        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return view('backend.publisher.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Edit = Publisher::findOrFail($id);
        return view('backend.publisher.edit', compact('Edit'));
    }

    public function update(Request $request, $id)
    {
        $Update = new Publisher;
        $Update->title = $request->title;

        $Update->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return view('backend.publisher.index');
    }

    public function destroy($id)
    {
        $Delete = Publisher::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('publisher.index');
    }

    public function getOrder(Request $request){
        foreach($request->get('page') as  $key => $rank ){
            Publisher::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Publisher::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }
}
