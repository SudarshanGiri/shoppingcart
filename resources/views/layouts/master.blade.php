<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <script src="https://kit.fontawesome.com/2231328f8b.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>@yield('title')</title>

    <style>
      .nav-item a{
        color: white !important;
        text-transform: uppercase !important;
        letter-spacing: 1px;
      }
      .nav-item{
        margin-left:30px;
      }
      .nav-item a:hover{
        color:yellow !important;
      }
      footer{
        text-align: center;
        background-color: #ddd;
        color: #aaa;
        padding: 20px;
        font-size: 25px;
        position: static;
        width: 100%;
        left:0;
        bottom:0;

      }
     body{
     }
     .maincontainer{
       min-height: 100vh;
     }
    </style>
  </head>
  <body>
    <div class="maincontainer">
    @yield('content')
  </div>
    

  







    <footer>&copy 2020 Sudarshan Giri</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>