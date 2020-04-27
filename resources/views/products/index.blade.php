@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>PRODUCTS</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('products.create') }}">Create New Product</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th width = "300px">Type</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>


        <th width = "180px">Action</th>
      </tr>

      @foreach ($products as $product)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$product->type}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->description}}</td>


          <td>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('products.show',$product->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('products.edit',$product->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

  </div>
@endsection