@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="" href="{{ route('products.create') }}">
                <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"> পণ্য আপলোড করুন</i></button>
            </a>
        </div>
        <div class="col-md-10 mt-4 border">
            <button type="button" class="btn btn-light btn-block text-left font-weight-bold" disabled> আমার সকল পণ্য </button>
            <div class="row">
                @foreach($products as $product) 
                @php
                    //$productName = $ad->name;
                    //if(strlen($productName)>50){
                       // $productName = substr($productName,0,47) ."...";
                    //}
                @endphp
                {{-- foreach adddddddddddddddddddddddddd --}}
                    <div class="col col-12 col-sm-6 col-md-4 col-lg-3">
                        

                            <div class="custom_card card mb-4">
                                <img src="{{ $product->image->image_link }}" class="card-img-top mt-2"
                                 style="height:130px; object-fit:contain" alt="{{ $product->product_variety }}">
                                <div class="card-img-overlay">
                                    <span class="badge badge-success pt-2 pb-1" style="font-size:0.8rem">লিচু</span>
                                </div>

                                <div class="card-body">
                                    <p class="card-title text-dark" style="font-weight:bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 
                                    'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                        {{ $product->product_variety }}
                                    </p>
                                    <div>
                                        <p class="d-inline text-dark" > মূল্য : </p> 
                                        <strong class="d-inline" style="color:seagreen">৳ {{ $product->price }} </strong> <span>(প্রতি হাজার)</span>
                                    </div>
                                    <span>
                                        <p class="d-inline text-dark text-small">স্টক : </p>
                                        <p class="d-inline text-dark text-small" > <strong>{{$product->stock}}</strong> হাজার</p>
                                    </span>
                                    <br>
                                    
                                    <a class="btn btn-outline-success btn-block card-linkk" href="{{route('products.show',$product->id)}} " role="button">পণ্যটি দেখুন</a>
                                    <a class="btn btn-outline-primary btn-block card-linkk" href="{{route('products.edit',$product->id)}}" role="button"> তথ্য পরিবর্তন করুন</a>                                              
                                    <form method="POST" action="{{ route('products.destroy',$product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-block mt-2 card-linkk">পন্যটি ডিলিট করে দিন</button>
                                    </form>
                                    
                                </div>
                            </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
