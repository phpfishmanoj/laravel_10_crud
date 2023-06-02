<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD:</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="/">Product</a>
    </li>
  </ul>

</nav>
    <div class="container">
      <div class="row">
      <div class="col col-lg-9">
        @if($message = Session::get('success'))
          <div class="alert alert-success mt-2">{{ $message }}</div>
        @endif
      </div>
      <div class="col col-lg-3 text-right">
            <a href="/products/create" class="btn btn-dark mt-2">Add Product</a>
      </div>
      </div>
    </div>
   <div class="container">
              <h1>Product Details:</h1>

              <div class="card-deck">
  <div class="card"  style="max-width: 18rem;">
    <img class="card-img-top" src="/products/{{$product->image}}" alt="{{$product->name}}">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <p class="card-text">{{$product->description}}</p>
      <p class="card-text text-right"><small class="btn btn-dark text-muted" onclick="window.location='{{ route("products.index") }}'">Back</small></p>
    </div>
  </div>
              </div>

            </div>
</body>
</html>