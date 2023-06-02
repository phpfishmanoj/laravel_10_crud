<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD:</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
    @if($message = Session::get('success'))
      <div class="alert alert-success">{{ $message }}</div>
    @endif
    <div class="container">
      <h1>Products Edit: #{{$product->id}}</h1>
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-3 p-3">
          <form action="/products/{{$product->id}}/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Name: </label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
              @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="">Description: </label>
              <textarea type="text" name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                       @if ($errors->has('description'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>
                 <div class="form-group">
              <label for="">File: <a href="{{ URL::to( '/products/' . $product->image)  }}" target="_blank">{{$product->image}} </a> </label>
              <input type="file" name="prodimg" class="form-control">
              @if ($errors->has('prodimg'))
                  <span class="text-danger">{{ $errors->first('prodimg') }}</span>
              @endif
            </div>
            <div class="text-right">
            	<button type="submit" class="btn btn-dark">Submit</button>
	            <button onclick="window.location='{{ route("products.index") }}'" type="button" class="btn btn-primary">Cancel</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>