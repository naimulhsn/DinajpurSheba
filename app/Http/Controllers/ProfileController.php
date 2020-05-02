<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Seller;
use App\Product;

class ProfileController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->type != 'Seller')abort(403);
        $products = $user->products()->orderby('updated_at','desc')->paginate(12);
        return view('profile.show',[
            'user' => $user,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($id != auth()->id() )abort(403);

        $val=request()->validate([
            'nid' => '',
            'image' => 'image|mimes:jpeg,png,jpg|max:300072',
        ]);
        if($request->hasFile('image')){
            $imageName = time().'__'.request()->image->getClientOriginalName();
            request()->image->move(public_path('images/profile'), $imageName);
        }
        

        $seller = Seller::where('user_id',$id)->first();
        if($request->has('nid') && $val['nid']!=null ){
            $seller->nid = $val['nid'];
        }
        if($request->hasFile('image')){
            $seller->image = "/images/profile/".$imageName; 
        }
        $seller->save();

        return redirect()->route('profile.show',$id)->with('status',' প্রোফাইলের তথ্য আপডেট হয়ে গেছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
