@extends('layouts.master')
@include('layouts.navbar')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/"> Back</a>
            </div>
        </div>
    </div>
    <div class="card" style="width: 400px;height:400px;float:left;margin:5px;">

     <img class="card-img-top" height="350px" src="{{URL::to('/')}}/images/{{$product->image}}" alt="Card image cap">
    </div>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type</strong>
                {{ $product->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price</strong>
                ${{ $product->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
            <div class="form-group">
                <a class="btn-lg btn-success" href="{{route('product.addToCart',['id'=>$product->id])}}"> add to cart</a>
            </div>
       
    </div>
@endsection