@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        
            
        @for ($i = 0; $i < 5 ; $i++)
            
        
        <div class="col-md-12 my-4" >
            <div class="card">
                <div class="card-header bg-secondary text-white">{{ __(' Order no. 851 (Waiting for approval)') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header ">
                                    Product info
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Seller Name </div>
                                        <div class="col-md-6">Naimul hasan</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Seller Mobile no. </div>
                                        <div class="col-md-6">01838388807</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Product Variety</div>
                                        <div class="col-md-6">Bombai</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Price</div>
                                        <div class="col-md-6"> $ 1700 </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Currently in tock</div>
                                        <div class="col-md-6"> 35 thousand </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header ">
                                    Order info
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Buyer Name </div>
                                        <div class="col-md-6">Jadukor Akkas</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Buyer Mobile no. </div>
                                        <div class="col-md-6">01916516516</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Order quantity </div>
                                        <div class="col-md-6">20 thousand</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Total Price</div>
                                        <div class="col-md-6"> $ 684500 </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-md-right">Delivery Address</div>
                                        <div class="col-md-6"> Gopalgonj - sodor - nilamath </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="card-footer">
                    <strong>Status :</strong> The order is waiting for seller approval. Please complete your payment first.  
                </div>


            </div>
        </div>

        @endfor
        
        

        
    </div>
</div>
@endsection
