@extends('layouts.app')
@section('content')
    
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('bad_status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('bad_status') }}
                </div>
            @endif
            <div class="">
                <div class="card mr-3">
                    <div class="row">

                    
                        <div class="col-md-5">
                            <img src="{{ $product->image->image_link }}" class="card-img-top p-2" style="height:455px; object-fit:contain" alt="{{ $product->product_name }}">
                        </div>
                        <div class="col-md-5 ">

                            {{-- Product basic Info --}}

                            {{-- wishlist --}}
                            <p class="float-right m-2">
                                @if ("0" == "0")
                                    <i class="fa fa-heart-o" style="color:red; font-size:15px;"></i>
                                @else 
                                <i class="fa fa-heart" style="color:red; font-size:15px;"></i>
                                @endif
                                
                            </p>
                            {{-- product details --}}
                            <div class="container-fluid mt-4" style="height:455px">
                                
                                <h2 class="card-title" style="color:black; font-weight:bold; font-size:1.4em;">
                                    {{ $product->product_name }}</h2>
                                <span class="text-dark"> জাতের নাম (Variety) : {{$product->product_variety}}</span>
                                <br><br><br><br>
                                <p class="d-inline text-dark"> প্রতি হাজারের মূল্য  : </p> 
                                <strong class="d-inline" style="color:purple"> ৳ {{ $product->price }}</strong>
                                 <br>
                                 <h5>
                                     <span class="badge badge-primary text-white pt-1 pb-1">
                                         <small> স্টকে আছে  </small>  {{$product->stock}} <small> হাজার </small>
                                        </span>
                                    </h5>
                                    <br><br>
                                    <p class="d-inline text-dark"> লোডিং পয়েন্ট  : </p> 
                                    <p class="d-inline text-dark">{{ $product->loading_point }} </p> 
                                    <br>
                                    <br>
                                    <br>
                                <div>
                                    <a href="#" class="btn btn-primary btn-block" role="button" aria-pressed="true"> আরো জানতে যোগাযোগ করুন</a>
                                    <a href="#" class="btn btn-danger bold btn-block" role="button" aria-pressed="true"> পণ্যটি অর্ডার করুন </a>
                                </div>
                               
                                


                                

                                
                                
                                
                                
                            </div>
                            
                        </div>

                        {{-- Seller Info --}}
                        <div class="col-md-2 bg-light">
                            <div class=" mt-4 ml-2 mr-2 ">
                                <p class="text-secondary d-inline"> বিক্রেতার তথ্য </p>
                                <hr>
                                <p class="d-inline text-strock" >নামঃ </p>
                                <p class="d-inline text-primary" style=" font-size:1.2em">{{ $product->user->name }}</p>
                                <br>
                                
                                <span class="d-inline">
                                    <small>Address: {{$product->user->seller->address}}</small> 
                                </span>
                                <br>
                                
                            
                                
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ad  description and specification --}}
        
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">About This Product </div>
                <div class="card-body ">
                    <div class="container">
                        <p style="text-align:justify; text-justify:inter-word;"> </p>
                    </div>
                </div>
            </div>
        </div>
       
        {{-- Right side --}}
        
    </div>

    
</div>
@endsection