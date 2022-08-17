<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $All = Comment::with('getProduct')->get();
        return view('backend.comment.index', compact('All'));
    }

    public function create()
    {
        $Product = Product::pluck('title', 'id');
        return view('backend.comment.create', compact('Product'));

    }


    public function store(Request $request)
    {
        $New = new Comment();
        $New->product_id = $request->product_id;
        $New->name = $request->name;
        $New->comment = $request->comment;
        $New->save();


        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('comment.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Edit = Comment::find($id);
        $Product = Product::pluck('title', 'id');
        return view('backend.comment.edit', compact('Edit', 'Product'));
    }


    public function update(Request $request, $id)
    {
        $Edit = Comment::find($id);

        $Edit->product_id = $request->product_id;
        $Edit->name = $request->name;
        $Edit->comment = $request->comment;
        $Edit->save();


        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('comment.index');
    }


    public function destroy($id)
    {
        $Delete = Comment::findOrFail($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('comment.index');
    }

    public function getSwitch(Request $request){
        $update=Comment::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }
}
