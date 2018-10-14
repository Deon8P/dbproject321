<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Album example for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/app.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/index.css" rel="stylesheet">
</head>



<header>
        <div class="topnav" style="position: fixed; top:0%; left:0%; right: 0%;">
        <a href="/home">Home</a>
        <a class="active" href="/products">Products</a>
        <a href="/logout">Logout</a>
        <a href="#" class="float-right active" color="#71b346">[:: user_username ::]</a>
      </div>
      </header>

<body style="height: 100%;">
        <div class="mt-5" >
        <form action="/" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input  id="search" name="search" class="text-center " type="text" placeholder="Description..." style="width: 200%;">
            <div class="container">
            <button type="submit" class="btn btn-outline-success  mb-5 float-left" style="width: 100%; ">Search</button>
            </div>
        </form>

    </div>

    @include('products')

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>

</html>
