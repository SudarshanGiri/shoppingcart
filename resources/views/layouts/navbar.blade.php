<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="font-size:30px;font-weight:bolder;">IT STORE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link " href="/laptops">LAPTOPS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/speakers">Speakers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/desktops">DESKTOP Computers</a>
        </li>
      
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link btn  btn-primary" href="{{route('product.shoppingCart')}}" style="color:white;"><i class="fas fa-cart-plus" style="font-size:20px;"></i>CART
          <span class="badge">{{Session::has('cart')? Session::get('cart')->totalQty:''}}</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin">Admin</a>
          </li>
       
      </ul>
    </div>
  </nav>