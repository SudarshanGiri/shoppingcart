@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>PRODUCTS</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-success" href="{{ route('products.create') }}">Add new Product</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif




  </div>

  <div class="container productcontainer">

    @foreach ($products as $product)
    <div class="card" style="width: 18rem;margin:5px;">
    <img class="card-img-top" height="200px" src="{{URL::to('/')}}/images/{{$product->image}}" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">{{$product->name}} <p>${{$product->price}}</p></h5>
        
        <p class="card-text">{{$product->description}}</p>
        <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">Go somewhere</a>
        </div>
        <form action="{{ route('products.destroy', $product->id) }}" method="post">
          <a class="btn btn-sm btn-success" href="{{route('products.show',$product->id)}}">Show</a>
          <a class="btn btn-sm btn-warning" href="{{route('products.edit',$product->id)}}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
    
      
    @endforeach
</div>
<div>{{$products->links()}}</div>

@endsection
