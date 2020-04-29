@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="" href="{{ route('Products.create') }}">
                <button type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-plus"> পণ্য আপলোড করুন</i></button>
            </a>
        </div>
        <div class="col-md-10 mt-4 border">
            <p>Your Products</p>
        </div>
    </div>
</div>
@endsection
