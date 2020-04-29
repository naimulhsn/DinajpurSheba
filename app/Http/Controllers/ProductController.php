<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Product;
use App\Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->type!='Seller' )abort(403);
        $products = $user->products()->latest()->get();
        //dd($products);
        return view('product.myproducts',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->guest() )abort(403);
        if(Auth::user()->type!='Seller' )abort(403);
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guest() )abort(403);
        if(Auth::user()->type!='Seller' )abort(403);
        //validate
        $validated=request()->validate([
            'product_name'=>[ 'required',Rule::in(['লিচু']) ],
            'product_variety'=>[ 'required', 'string' ],
            'stock'=>['required', 'numeric','min:1','max:10000000'],
            'price'=>['required', 'numeric','min:100','max:50000'],
            'loading_point'=>[ 'required', 'string' ],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:300072',

        ]);
        $imageName = time().'__'.request()->image->getClientOriginalName();
  
        request()->image->move(public_path('images/Products'), $imageName);
        $id = Auth::user()->id;
        //dd($validated);
        $product= Product::create([
            'user_id' => $id,
            'product_name'=> $validated['product_name'],
            'product_variety'=> $validated['product_variety'],
            'stock'=> $validated['stock'],
            'price'=> $validated['price'],
            'loading_point'=> $validated['loading_point'],
            
        ]);
        Image::create([
            'product_id' => $product->id,
            'image_link' => "/images/Products/".$imageName,
        ]);
        
        return redirect()->route('Products.index')->with('status','Your Product is uploaded successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
