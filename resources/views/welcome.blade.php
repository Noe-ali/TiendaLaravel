<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles2.css" rel="stylesheet" />

    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container px-4 px-lg-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>-->
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('admin') }}">Dashboard</a></li>
                        @else

                        <body class="antialiased">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar sesion</a></li>
                            @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registrarse</a></li>

                            @endif
                            @endauth
                    </div>
                    @endif

                    </li>
                </ul>
               
            </div>
                    <button class="btn btn-outline-dark"  data-bs-toggle="modal" href="#cartmodal">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    
    <section class="py-5">
       

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($producto as $producto)

                <div class="col mb-5">
                    <div class="card h-100">

                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$producto->nombre}}</h5>
                                <!-- Product price-->
                                {{$producto->precio}}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <form method="POST" action="{{route('cart.store')}}">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" id="id" value="{{$producto->id}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="name" class="form-control" id="name" value="{{$producto->nombre}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="price" class="form-control" id="price" value="{{$producto->precio}}">
                            </div>
                            <div class="form-group row justify-content-center  ">
                                <input type="hidden" name="quantity" class="form-control col-md-3" id="quantity">
                            </div>



                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto">Agregar al carrito</button></div>
                            </div>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
        
    </section>



    <!--modal carrita-->
    <div class=" modal fade" id="cartmodal" tabindex="-1" keyboard="false" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><a class="btn btn-danger">X</a></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                @if (!Cart::isEmpty())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th sc ope="col">Accion</th>
                                            <th sc ope="col">#ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::getContent() as $item)
                                        <tr>
                                        <th scope="row">
       <form method="POST" action="{{route('cart.destroy',$item->id)}}">
          @method('DELETE')
          @csrf
          <button type="submit">Eliminar</button>
      </form>
</th>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>${{$item->price}}.00</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>
                                                @foreach ($item->attributes as $key => $attribute)
                                                {{$key}}: {{$attribute}}.
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @endif

                                <table class="table">
      <thead>
                <tr>
                    <th sc ope="col">Items</th>
                    <th sc ope="col">Sub total</th>
                    <th scope="col">Total</th>
                 </tr>
      </thead>
      <tbody>
                  <tr>
                      <th scope="row">{{Cart::getTotalQuantity()}}</th>
                      <th scope="row">${{Cart::getSubTotal()}}.00</th>
                      <th scope="row">${{Cart::getTotal()}}.00</th>
                   </tr>
      </tbody>
</table>
                              <!-- <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>

</html>