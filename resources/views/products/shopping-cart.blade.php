@extends('layouts.master')
@include('layouts.navbar')

@section('content')
    <h2>Shopping Cart</h2>
    @if(Session::has('cart'))
        <div class="row">
                <div class="col-md-6">
                   <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{$product['qty']}}</span>

                                <strong>{{$product['item']['name']}}</strong>
                                <span class="btn-sm btn-success">${{$product['price']}}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                        <li><a href="{{route('product.reduceByOne',['id'=>$product['item']['id']]) }}">Reduce by 1</a></li>
                                        <li><a href="{{route('product.remove',['id'=>$product['item']['id']]) }}">Reduce ALL</a></li>


                                           


                                            
                                        </ul>
                                    
                                </div>   
                            </li>
                        @endforeach
                    </ul>  
                </div>
        </div>
        <div class="row">
                <div class="col-md-6">
                    <strong>Total: $ {{$totalPrice}}</strong>


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


@endsection