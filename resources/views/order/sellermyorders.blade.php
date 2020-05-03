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
        
            
        @for ($i = 0; $i < 5 ; $i++)
            
        
        <div class="col-md-12 my-4" >
            <div class="card">
                <div class="card-header bg-secondary text-white">{{ __(' Order no. 851 (Waiting for approval)') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header text-center ">
                                    Product info
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 text-right">Seller Name </div>
                                        <div class="col-6">Naimul hasan</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Seller Mobile no. </div>
                                        <div class="col-6">01838388807</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Product Variety</div>
                                        <div class="col-6">Bombai</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Price</div>
                                        <div class="col-6"> $ 1700 </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Currently in tock</div>
                                        <div class="col-6"> 35 thousand </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header text-center">
                                    Order info
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 text-right">Buyer Name </div>
                                        <div class="col-6">Jadukor Akkas</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Buyer Mobile no. </div>
                                        <div class="col-6">01916516516</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Order quantity </div>
                                        <div class="col-6">20 thousand</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Total Price</div>
                                        <div class="col-6"> $ 684500 </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-right">Delivery Address</div>
                                        <div class="col-6"> Gopalgonj - sodor - nilamath </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="card-footer text-center">
                    <strong>Status :</strong> The order is waiting for seller approval. Please complete your payment first.  
                </div>


            </div>
        </div>

        @endfor
        
        

        
    </div>
</div>
@endsection
