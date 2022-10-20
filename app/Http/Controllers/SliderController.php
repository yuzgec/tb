<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $All = Slider::with('getProduct')->orderBy('rank')->get();

        return view('backend.slider.index', compact('All'));
    }

    public function create()
    {
        $Pro= Product::pluck('title', 'id');
        return view('backend.slider.create', compact('Pro'));
    }

    public function store(SliderRequest $request)
    {
        $New = new Slider;
        $New->title = $request->title;
        $New->text1 = $request->text1;
        $New->text2 = $request->text2;
        $New->text3 = $request->text3;
        $New->align = $request->align;
        $New->product_id = $request->product_id;
        $New->button_text = $request->button_text;
        $New->button_link = $request->button_link;

        if($request->hasfile('image')){
            $New->addMedia($request->image)->toMediaCollection('web');
        }

        if($request->hasfile('imagemobil')){
            $New->addMedia($request->imagemobil)->toMediaCollection('mobil');
        }

        $New->save();

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('slider.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Edit = Slider::findOrFail($id);
        $Pro= Product::pluck('title', 'id');
        return view('backend.slider.edit', compact('Edit','Pro'));
    }

    public function update(SliderRequest $request, $id)
    {
        $Update = Slider::findOrFail($id);
        $Update->title = $request->title;
        $Update->text1 = $request->text1;
        $Update->text2 = $request->text2;
        $Update->text3 = $request->text3;
        $Update->align = $request->align;
        $Update->product_id = $request->product_id;
        $Update->button_text = $request->button_text;
        $Update->button_link = $request->button_link;

        if ($request->hasFile('image')) {
            $Update->media()->where('collection_name', 'web')->delete();
            $Update->addMedia($request->image)->toMediaCollection('web');
        }

        if ($request->hasFile('imagemobil')) {
            $Update->media()->where('collection_name', 'mobil')->delete();
            $Update->addMedia($request->imagemobil)->toMediaCollection('mobil');
        }

        $Update->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('slider.index');

    }

    public function destroy($id)
    {
        $Delete = Slider::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('slider.index');
    }

    public function getOrder(Request $request){
        foreach($request->get('slider') as  $key => $rank ){
            Slider::where('id',$rank)->update(['rank'=>$key]);
        }
    }

    public function getSwitch(Request $request){
        $update=Slider::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }

}
