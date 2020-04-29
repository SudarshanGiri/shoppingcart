@extends('layouts.master')
@include('layouts.navbar')

@section('content')

<!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://www.laptopshop.al/assets/slider2.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://www.tlcv.org/wp-content/uploads/2019/08/Gaming-Laptop.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://secureservercdn.net/160.153.137.14/n3p.662.myftpupload.com/wp-content/uploads/2020/03/Slider-2.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->


  <div class="container-fluid">
        <div class="row">
        <div class="col-md-10">
            <h3>PRODUCTS</h3>
        </div>
        
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div class="container-fluid productcontainer">
          @foreach ($products as $product)
          {{--  @if($product->type=='Laptop') -----filtering Laptop--}}
          <a href="{{route('products.show',$product->id)}}" style="text-decoration:none;color:black;">
              <div class="card" style="width: 18rem;margin:5px;">
                <img class="card-img-top" height="200px" src="{{URL::to('/')}}/images/{{$product->image}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}} </h5>
                      <h4 style="color:red;"><p>$ {{$product->price}}</p></h4>
                          
                      <!--    <p class="card-text" style="height: 30px;overflow:hidden;">{{$product->description}}</p>   -->
                      <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn  btn-success float-right" style="font-size:10px;" ><i class="fas fa-cart-plus" style="font-size:20px;"></i> ADD TO CART</a>

                    </div>
              </div>
            </a>   
        @endforeach
        </div>

  </div>
@endsection