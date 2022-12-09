<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::All();
        return view('pages.home', compact('product'));
    }

    public function administration(){
        $product = Product::All();
        return view('pages.administration', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=> 'required|max:50',
            'category'=> 'required',
            'description'=>'required|max:100',
            'price'=>'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
        }

        $product = Product::create([
            'name'=>request('name'),
            'category'=>request('category'),
            'description'=>request('description'),
            'price'=>request('price'),
            'image'=>$fileName ?? '',
            'user_id'=> Auth::id(),
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('pages.single-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product = Product::All();
        return view('pages.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        if($product->image){
            File::delete(storage_path('app/public/'.$product->image));
        }

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
            Product::where('id', $product->id)->update(['image'=>$fileName]);
        }

        Product::where('id', $product->id)->update($request->only(['name','category','description','price']));
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();

        return redirect('/');
    }
}
