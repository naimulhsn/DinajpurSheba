@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark"  style="min-height:100vh">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        
            
        
        @foreach ($orders as $order)
            
        
        
        <div class="col-md-12 my-4" >
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Order id. {{$order->id}}  
                    @if($order->approved=='No') (Waiting for your Confirmation)
                    @elseif($order->approved=='approved')(Confirmed)
                    @elseif($order->approved=='rejected') (Rejected)
                    @endif 
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
                                        <div class="col-6"> {{$user->name}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  text-right">Seller Mobile no. </div>
                                        <div class="col-6"> {{$user->phone}} </div>
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
                                        <div class="col-6"> {{$buyer[$order->id]->name}} </div>
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
                        <span style="max-width: 70%">
                            If you are ready to sell to this Buyer then click on Confirm Button to Confirm this order,
                            Otherwise reject.
                        </span>
                        
                        <span class="pull-right">

                            <form class="d-inline"  action={{route('orders.update',$order->id)}} method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="approved" value="approved">
                                <button type="submit" class="btn btn-success px-4">Confirm</button>
                            </form>
                            <form class="d-inline"  action={{route('orders.update',$order->id)}} method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="approved" value="rejected">
                                <button type="submit" class="btn btn-danger px-4">Reject</button>
                            </form>
                        </span>
                    @elseif($order->approved=='approved')
                        <span style="max-width: 70%">
                            This Order is Confirmed. Deliver the right product properly.
                        </span>
                    @endif
                </div>


            </div>
        </div>

        @endforeach
        
        

        
    </div>
</div>
@endsection
