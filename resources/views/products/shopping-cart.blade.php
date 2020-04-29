@extends('layouts.master')
@include('layouts.navbar')

@section('content')
<div class="container">
    <p><h2>My Cart</h2></p>  
    @if(Session::has('cart'))

                <div class="container">
                        @foreach($products as $product)
                            <div class="cartlist list-group-item">
                                <span class="quantity" style="background-color:#262626;color:white;padding:10px;font-weight:bolder;font-size:20px;">{{$product['qty']}}</span>
                                <span style="color:red;">${{$product['price']}} </span>
                                <span class="image"style="width:200px;"><img  height="100px" src="{{URL::to('/')}}/images/{{$product['item']['image']}}" alt="Card image cap"></span>

                                <span></span><strong>{{$product['item']['name']}}</strong></span>
                                <span ><a href="{{route('product.reduceByOne',['id'=>$product['item']['id']]) }}"><i class="fas fa-minus"></i></a></span>
                                <span><a href="{{route('product.increaseByOne',['id'=>$product['item']['id']])}}"><i class="fas fa-plus"></i></a></span>
                                <span> <a href="{{route('product.remove',['id'=>$product['item']['id']]) }}">DELETE</a></span>
                            </div>
                        @endforeach
                </div>
                <div class="row">
                        <div class="col-md-6">
                            <h3 style="color:red;">Total: $ {{$totalPrice}}</h3>


                        </div>
                        
                </div>
                <hr>
            <div class="row">
                    <div class="col-md-6">
                    <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>

                    </div>
                    
            </div>


    @else
    <div class="row">
                <div class="col-md-6">
                  <h2>No items in CART!</h2>

                </div>
                   
         </div>

    @endif

</div>
@endsection