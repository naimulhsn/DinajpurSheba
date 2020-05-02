@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="images\web\litchi 1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h5> লিচু </h5>
                        <p>পাইকারি ক্রয় ও বিক্রয় </p>
                        <button class="btn btn-outline-light"> Order now </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="images\web\litchi 2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-left text-success text-strock">
                        <h5> লিচু </h5>
                        <p>পাইকারি ক্রয় ও বিক্রয় </p>
                        <button class="btn btn-outline-success"> Order now </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="images\web\litchi 3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h5> লিচু </h5>
                        <p>পাইকারি ক্রয় ও বিক্রয় </p>
                        <button class="btn btn-outline-light"> Order now </button>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
       </div>
   </div>
</div>


<div class="container pt-4">
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
                        <div class="col col-6 col-sm-6 col-md-4 col-lg-3">
                            <a href={{route('products.show', $product->id)}}>

                                <div class="custom_card card mb-4">
                                    <img src="{{ $product->image->image_link }}" class="card-img-top"
                                     style="height:150px; object-fit:cover" alt="{{ $product->product_variety }}">
                                    <div class="card-img-overlay">
                                        <span class="badge badge-success pt-2 pb-1" style="font-size:0.8rem">লিচু</span>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-title text-dark" style="font-weight:bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 
                                        'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                            {{ $product->product_variety }}
                                        </p>
                                        <div>
                                            
                                            <strong class="d-inline" style="color:seagreen">৳ {{ $product->price }} </strong> <span>(প্রতি হাজার)</span>
                                        </div>
                                        <span>
                                            <p class="d-inline text-dark text-small">স্টক </p>
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
