@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                            <a href="#">

                                <div class="custom_card card mb-4">
                                    <img src="{{ $product->image->image_link }}" class="card-img-top mt-2 mr-2 mb-2"
                                     style="height:200px; object-fit:contain" alt="{{ $product->product_variety }}">
                                    <div class="card-img-overlay">
                                        <span class="badge badge-success pt-2 pb-1" style="font-size:0.8rem">লিচু</span>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-title text-dark" style="font-weight:bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 
                                        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                            {{ $product->product_variety }}
                                        </p>
                                        <div>
                                            <p class="d-inline " style="color:seagreen"> মূল্য : </p> 
                                            <strong class="d-inline" style="color:seagreen">৳ {{ $product->price }} </strong> <span>(প্রতি হাজার)</span>
                                        </div>
                                        <span>
                                            <p class="d-inline text-dark text-small">স্টক : </p>
                                            <p class="d-inline text-dark text-small" > <strong>{{$product->stock}}</strong> হাজার</p>
                                        </span>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Paginationnnnnnnnnnn --}}
                <div style="">
                    {!! $products->links() !!}
                </div>
                        
        </div>
    </div>
</div>
@endsection
