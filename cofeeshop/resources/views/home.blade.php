<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-md-auto gap-2">
        <li class="nav-item rounded">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-fill me-2"></i>Home</a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link" href="#"><i class="bi bi-people-fill me-2"></i>About</a>
        </li>
        <li class="nav-item rounded">
          <a class="nav-link" href="#"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
        </li>
        <li class="nav-item rounded">
          @auth 
            <a class="nav-link" href="{{route('login')}}"><i class="bi bi-telephone-fill me-2"></i>{{Auth::user()->name}}</a>
          @else 
            <a class="nav-link" href="{{route('login')}}"><i class="bi bi-telephone-fill me-2"></i>Login</a>
          @endif
        </li>
        <!--

        <li class="nav-item dropdown rounded">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-2"></i>Profile</a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
        -->
      </ul>
    </div>
  </div>
</nav>
<div class="containers p-3">
  <div class="row">
  @foreach($products as $product)
    <div class="col-12 col-sm-8 col-md-6 col-lg-3 mt-4">
      <div class="card">
        <img class="card-img" src="{{asset('uploads/'.$product->image)}}" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">{{$product->product}}</h4>
          <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
          <p class="card-text">
            {{$product->description}}
          </p>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">${{$product->price}}</h5></div>
            <div class="price text-success"><h5 class="mt-4">{{$product->category->name}}</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
    
  </div>
</div>
<div class="bg-dark text-white">
  <p class="text-center p-4 m-0">Footer Content</p>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>