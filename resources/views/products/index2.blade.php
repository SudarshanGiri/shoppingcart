@extends('layouts.master')

@section('content')

  <div class="container">
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
      <div class="container productcontainer">

                @foreach ($products as $product)
                <div class="card" style="width: 18rem;margin:5px;">
                <img class="card-img-top" height="200px" src="{{URL::to('/')}}/images/{{$product->image}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}} <p>${{$product->price}}</p></h5>
                    
                    <p class="card-text">{{$product->description}}</p>
                    <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">VIEW</a>
                    </div>
                </div>
                    <!--  <td><b>{{++$i}}.</b></td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>


                    <td>
                
                        <a class="btn btn-sm btn-success" href="{{route('products.show',$product->id)}}">Show</a>
                        
                    </td>
                    </tr>
                !-->
                @endforeach
        </div>
      <div>{{$products->links()}}</div>

  </div>
@endsection