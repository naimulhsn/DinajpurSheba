@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        
            
        
        @foreach ($orders as $order)
            
        
        
        <div class="col-md-12 my-4" >
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Order no. {{$order->id}} 
                    @if($order->approved=='No') (Waiting for approval)@endif 
                    <span class="pull-right">Order date - {{ $order->created_at->format('d M Y ') }}</span>
                
                </div>
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card mb-2">
                                <div class="card-header py-2">
                                    Product info
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-6 text-right">Seller Name </div>
                                        <div class="col-6"> {{$seller[$order->id]->name}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Seller Mobile no. </div>
                                        <div class="col-6"> {{$seller[$order->id]->phone}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Product Variety</div>
                                        <div class="col-6"> {{$order->product->product_variety}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Price</div>
                                        <div class="col-6"> ৳ {{$order->unit_price}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Current Stock</div>
                                        <div class="col-6"> {{$order->product->stock}}  thousand </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="card mb-2">
                                <div class="card-header py-2">
                                    Order info
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-6   text-right">Buyer Name </div>
                                        <div class="col-6"> {{Auth::user()->name}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Buyer Mobile no. </div>
                                        <div class="col-6"> {{$order->buyer_phone}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Order quantity </div>
                                        <div class="col-6"> {{$order->quantity}} thousand</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Total Price</div>
                                        <div class="col-6"> ৳ {{($order->quantity * $order->unit_price )}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Payment Method</div>
                                        <div class="col-6">{{$order->payment_method }} </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="card mb-2">
                                <div class="card-header py-2">
                                    Delivery info
                                </div>
                                <div class="card-body py-2">
                                    <div class="row">
                                        <div class="col-6 text-right">Delivery Address</div>
                                        <div class="col-6"> {{$order->delivery_address}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">vehicle_name </div>
                                        <div class="col-6"> {{$order->vehicle_name}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right"> vehicle_number </div>
                                        <div class="col-6"> {{$order->vehicle_number}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">vehicle_capacity</div>
                                        <div class="col-6"> {{$order->vehicle_capacity}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Loading Point</div>
                                        <div class="col-6">{{$order->product->loading_point }} </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="card-footer">
                    <strong>Status :</strong>
                    @if($order->approved=='No') 
                    The order is waiting for seller approval. Please complete your payment. 
                    @else Order is in delivery process. 
                    @endif
                </div>


            </div>
        </div>

        @endforeach
        
        

        
    </div>
</div>
@endsection
