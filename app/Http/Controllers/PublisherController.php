<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        if (request()->filled('q')){
            $All =  Publisher::where('title', 'like', '%'. request('q'). '%')
                ->orWhere('slug', 'like', '%'. request('q'). '%')->paginate(50);
        }else{
            $All = Publisher::orderBy('title')->paginate(50);
        }
        return view('backend.publisher.index', compact('All'));
    }

    public function create()
    {
        return view('backend.publisher.create');
    }

    public function store(PublisherRequest $request)
    {
        $New = new Publisher;
        $New->title = $request->title;
        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');

        return redirect()->route('publisher.index');


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

    public function update(PublisherRequest $request, $id)
    {
        $Update = Publisher::find($id);
        $Update->title = $request->title;
        $Update->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('publisher.index');
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
