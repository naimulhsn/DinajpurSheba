@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">{{ __(' পন্যের তথ্য পরিবর্তনের ফর্ম ') }}</div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-3"> </div>
                        <div class="col-md-7">
                            <img src={{$product->image->image_link}} class="img-fluid mb-4" alt="">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')


                        {{-- product_name --}}
                        <div class="form-group row">
                            <label for="product_name" class="col-md-3 col-form-label text-md-right">{{ __(' পণ্যের নাম ') }}</label>

                            <div class="col-md-7">
                                <input id="product_name" name="product_name" type="text" class="form-control" value={{$product->product_name}} disabled>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- Product name --}}
                        <div class="form-group row">
                            <label for="product_variety" class="col-md-3 col-form-label text-md-right">{{ __('জাতের নাম / Variety') }}</label>
                            <div class="col-md-7">
                                <input id="product_variety" type="text" class="form-control @error('product_variety') is-invalid @enderror" name="product_variety" 
                                value="{{ $product->product_variety}}" required autocomplete="product_variety" >
                                @error('product_variety')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        
                        {{-- stock --}}
                        <div class="form-group row">
                            <label for="stock" class="col-md-3 col-form-label text-md-right">{{ __(' স্টক ') }}</label>
                            <div class="col-md-7">
                                <input id="stock" type="number" min="1" max="1000000" class="form-control @error('stock') is-invalid @enderror" name="stock" 
                                value="{{ $product->stock }}" required autocomplete="stock" >
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Priceeeeee --}}
                        <div class="form-group row">
                            <label for="price" class="col-md-3 col-form-label text-md-right">{{ __(' মূল্য ') }}</label>
                            <div class="col-md-7">
                                <input id="price" type="number" min="5" max="100000" class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ $product->price }}" required autocomplete="price" >
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- loading point --}}
                        <div class="form-group row">
                            <label for="loading_point" class="col-md-3 col-form-label text-md-right">{{ __(' লোডিং পয়েন্ট ') }}</label>
                            <div class="col-md-7">
                                <input id="loading_point" type="text" class="form-control @error('loading_point') is-invalid @enderror" name="loading_point"
                                value="{{ $product->loading_point }}" required autocomplete="loading_point" >
                                @error('loading_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        
                        
                        {{-- Upload button --}}
                        <div class="form-group row mt-4 mb-2">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    {{ __(' পরিবর্তন কার্যকর করুন ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- Error alart --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
