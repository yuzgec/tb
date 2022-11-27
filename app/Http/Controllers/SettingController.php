<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $Tab = Setting::distinct()->get('isType');
        $All = Setting::orderBy('id','asc')->get();
        return view('backend.settings.index', compact('All','Tab'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $All = Setting::all();
        $Edit =  Setting::where('isType', $id)->get();
        return view('backend.settings.edit', compact('Edit', 'All'));
    }


    public function update(Request $request, $id)
    {
        $Update =  Setting::where('id', $id)->firstOrFail();
        $Update->value = $request->value;
        $Update->save();

        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('settings.index');

    }


    public function destroy($id)
    {
        //
    }
}
