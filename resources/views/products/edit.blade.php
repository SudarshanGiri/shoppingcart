@extends('layouts.master')
@section('content')
  <div class="container col-md-6">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Product</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Image :</strong>
        <input type="file" name="image">
        <img class="container" src="{{URL::to('/')}}/images/{{$product->image}}" alt="" width="100" height="300">
        <input type="hidden" name="hidden_image" value="{{$product->image}}">
        </div>
        <div class="col-md-12">
          <strong>Type :</strong>
          <input type="text" name="type" class="form-control" value="{{$product->type}}">
        </div>
        <div class="col-md-12">
          <strong>Name :</strong>
          <textarea class="form-control" name="name">{{$product->name}}</textarea>
        </div>
        <div class="col-md-12">
            <strong>Price :</strong>
            <textarea class="form-control" name="price" >{{$product->price}}</textarea>
          </div>
          
          <div class="col-md-12">
            <strong>Description :</strong>
            <textarea class="form-control" name="description" rows="8" cols="80">{{$product->description}}</textarea>
          </div>
  

        <div class="col-md-12">
          <a href="{{route('products.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection