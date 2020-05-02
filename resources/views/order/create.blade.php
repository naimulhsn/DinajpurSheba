@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">{{ __(' অর্ডার ফর্ম ') }}</div>

                <div class="card-body">
                    <form method="POST" action={{route('orders.store')}} >
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        {{-- full name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __(' আপনার সম্পূর্ণ নাম ') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                value="{{ $user->name }}" required autocomplete="name" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- mobile --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __(' আপনার মোবাইল নাম্বার ') }}</label>

                            <div class="col-md-7">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" 
                                name="phone" value="{{ $user->phone }}" required autocomplete="phone" >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- delivery Address --}}
                        <div class="form-group row">
                            <label for="delivery_address" class="col-md-3 col-form-label text-md-right">{{ __(' পাঠানোর ঠিকানা') }}</label>
                            <div class="col-md-7">
                                <input id="delivery_address" type="text" class="form-control @error('delivery_address') is-invalid @enderror" 
                                name="delivery_address" value="{{ old('delivery_address') }}" required autocomplete="delivery_address" autofocus>
                                
                                @error('delivery_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Vehicle name --}}
                        <div class="form-group row">
                            <label for="vehicle_name" class="col-md-3 col-form-label text-md-right">{{ __(' পরিবহনের নাম ') }}</label>
                            <div class="col-md-7">
                                <input id="vehicle_name" type="text" class="form-control @error('vehicle_name') is-invalid @enderror"
                                 name="vehicle_name" value="{{ old('vehicle_name') }}" required autocomplete="vehicle_name" autofocus>
                                @error('vehicle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Vehicle number --}}
                        <div class="form-group row">
                            <label for="vehicle_number" class="col-md-3 col-form-label text-md-right">{{ __(' পরিবহনের নম্বর ') }}</label>
                            <div class="col-md-7">
                                <input id="vehicle_number" type="text" class="form-control @error('vehicle_number') is-invalid @enderror" name="vehicle_number" 
                                value="{{ old('vehicle_number') }}" required autocomplete="vehicle_number" autofocus>
                                @error('vehicle_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Vehicle capacity --}}
                        <div class="form-group row">
                            <label for="vehicle_capacity" class="col-md-3 col-form-label text-md-right">{{ __(' পরিবহনের ধারণ ক্ষমতা ') }}</label>
                            <div class="col-md-7">
                                <input id="vehicle_capacity" type="text" class="form-control @error('vehicle_capacity') is-invalid @enderror" name="vehicle_capacity" 
                                value="{{ old('vehicle_capacity') }}" required autocomplete="vehicle_capacity" autofocus>
                                @error('vehicle_capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Quantity of products --}}
                        <div class="form-group row">
                            <label for="quantity" class="col-md-3 col-form-label text-md-right">{{ __(' পণ্যের পরিমান (হাজার) ') }}</label>
                            <div class="col-md-7">
                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" 
                                value={{ $quantity }} required  autocomplete="quantity" readonly>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Total price --}}
                        <div class="form-group row">
                            <label for="total_price" class="col-md-3 col-form-label text-md-right">{{ __(' সর্বমোট মূল্য ') }}</label>
                            <div class="col-md-7">
                                <input id="total_price" type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" 
                                value={{ $quantity * $product->price }} required  autocomplete="total_price" readonly>
                                @error('total_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- payment Method --}}
                        <div class="form-group row">
                            <label for="payment_method" class="col-md-3 col-form-label text-md-right">{{ __(' মূল্যপরিশোধ পদ্ধতি ') }}</label>

                            <div class="col-md-7">
                                <select class="form-control" name="payment_method" required>
                                    <option selected="true" disabled="disabled" value=""> নির্বাচন করুন (Select) :</option>
                                    <option value="Cash">Cash</option>
                                    <option value="bKash">bKash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('payment_method')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-danger btn-block mt-2"> অর্ডার কনফার্ম করুন </button>
            
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
