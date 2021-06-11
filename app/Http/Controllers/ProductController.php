<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = \App\product::all();
        return view('admin.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = \App\categories::all();
        return view('admin.add-listing',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $image = $request->file('image');
          $image->storeAs('public/images',$image->hashName());
          $prod = new \App\product;
          $prod->image = $image->hashName();
          $prod->name = $request->name;
          $prod->category_id = $request->category_id;
          $prod->price = $request->price;
          $prod->product_type = $request->product_type;
          $prod->description = $request->description;
          $prod->user_id = $request->user_id;
          $prod->save();
          return redirect('/admin')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\categories::all();
        return view('admin.edit-listing',compact('category','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = \App\product::where('id',$id)->first();
        Storage::disk('local')->delete('public/images'.$product->image);
        $image = $request->file('image');
        $image->storeAs('public/images',$image->hashName());
        $product->image = $image->hashName();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->user_id = $request->user_id;
        $product->save();
        return redirect('/admin')->with('success', 'Product has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\product::where('id',$id)->delete();
        return redirect('/admin')->with('success', 'Product has been deleted');
    }
}
