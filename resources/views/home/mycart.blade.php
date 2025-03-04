<!DOCTYPE html>
<html lang="en">


@include('home.header')

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i
                            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">{{($count)}}</span>
                    </a>

                    <div class="list-inline-item logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button id="logout" type="submit" class="btn btn-danger"> Logout <i class="icon-logout"></i>
                            </button>
                        </form>
                    </div>
                    @else
                    <a class="m-1 text-white btn btn-dark" href="{{'\login'}}">
                        login
                    </a>
                    <a class="m-1 text-white btn btn-dark" href="{{'\register'}}">
                        register
                    </a>
                    @endauth
                    @endif

                    {{-- <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a> --}}

                    {{-- <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a> --}}
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $value=0;

    ?>
    <section class="bg-light">
        <div class="container pb-5">
            <div class="pt-5">
                <h1 class="mb-2 text-center">Penerima</h1>
                <form class="" action="{{url('comfirm_order')}}" method="POST">
                  @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea class="form-control" name="address" rows="3"  placeholder="Masukkan Alamat">{{Auth::user()->address}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone}}"
                            placeholder="Masukkan No HP">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3 btn-lg">Place Order</button>
                      </div>

                </form>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    @foreach ($cart as $cart)
                    <div class="row">
                        <div class="col-lg-5 mt-5">
                            <div class="card mb-3">
                                <img class="card-img img-fluid" src="{{('../product/'. $cart->product->image)}}"
                                    alt="Card image cap" id="product-detail">
                            </div>
                        </div>

                        <div class="col-lg-7 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1 class="h2">{{($cart->product->title)}}</h1>
                                            <p class="h3 py-2">Rp. {{($cart->product->price)}}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <h6>Category:</h6>
                                                </li>
                                                <li class="list-inline-item">
                                                    <p class="text-muted">
                                                        <strong>{{($cart->product->category)}}</strong>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h6>Description:</h6>
                                            <p>{{($cart->product->description)}}</p>
                                            <a class="btn btn-danger btn-sm m-1"
                                                href="{{url('delete_cart',$cart->id)}}">Remove</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $value= $value + $cart->product->price;
                
                    ?>
                    @endforeach
                </div>
                <div class="col-4">
                    <div class="mt-5 p-2 text-center fw-bold fs-1 card shadow rounded">
                        Total Price <p class="fs-5 fw-bolder">Rp {{$value}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('home.footer')

</body>

</html>