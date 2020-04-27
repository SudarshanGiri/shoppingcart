@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Product</h3>
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

    <form action="{{route('products.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Type :</strong>
          <input type="text" name="type" class="form-control" placeholder="Product Type">
        </div>
        <div class="col-md-12">
          <strong>Name :</strong>
          <textarea class="form-control" placeholder="Name" name="name" ></textarea>
        </div>
        <div class="col-md-12">
            <strong>Price :</strong>
            <textarea class="form-control" placeholder="Price" name="price"></textarea>
        </div>
        <div class="col-md-12">
            <strong>Description :</strong>
            <textarea class="form-control" placeholder="Description" name="description" rows="8" cols="80"></textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('products.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection
