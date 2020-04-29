@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">{{ __('Upload Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Products.store') }}" enctype="multipart/form-data">
                        @csrf
                        


                        {{-- product_name --}}
                        <div class="form-group row">
                            <label for="product_name" class="col-md-3 col-form-label text-md-right">{{ __(' পণ্যের নাম ') }}</label>

                            <div class="col-md-7">
                                <select class="form-control" name="product_name" required>
                                    <option disabled="disabled" value=""> নির্বাচন করুন (Select) :</option>
                                    <option selected="true" value="লিচু"> লিচু</option>
                                </select>
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
                                <input id="product_variety"product_varietye="text" class="form-control @error('product_variety') is-invalid @enderror" name="product_variety" 
                                value="{{ old('product_variety') }}" required autocomplete="product_variety" autofocus>
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
                                value="{{ old('stock') }}" required autocomplete="stock" autofocus>
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
                                value="{{ old('price') }}" required autocomplete="price" autofocus>
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
                                value="{{ old('loading_point') }}" required autocomplete="loading_point" autofocus>
                                @error('loading_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                       
                        
                        {{-- Upload Image --}}
                        <div class="form-group row">
                            <img class="mb-2" style="max-height:200px; object-fit:contain" id='img-upload'/>
                            <label for="image" class="col-md-3 col-form-label text-md-right"> ছবি আপলোড করুন</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="btn btn-outline-primary btn-file" id="imgUpload">
                                            Browse… <input type="file" name="image" id="imgInp" required>
                                        </span>
                                        
                                    </span>
                                    <input type="text" class="form-control" readonly aria-describedby="imgUpload" >
                                </div>
                                @error('image')
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
                                    {{ __(' ফর্মটি সম্পাদন করুন') }}
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
