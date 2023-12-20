<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IS207') }}</title>
    {{-- Font-awesome --}}
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/build/assets/app-041e359a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/js/app.js'])

</head>

<body>

    @guest
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid d-flex justify-content-between">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col-5 d-flex justify-content-start">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Socks
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{ url('/menproduct') }}" aria-expanded="false">
                                    Men
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('women-product') }}" role="button"
                                    aria-expanded="false">
                                    Women
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Subscription
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Sales
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 d-flex justify-content-center">

                        <a class="navbar-brand" href="{{ url('/') }}">NO BRAND</a>

                    </div>
                    <div class="col-xl-5 col-lg-6 d-flex justify-content-end align-items-center">

                        <form class="d-flex position-relative " role="search">
                            <input class="form-control me-2 position-relative" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn position-absolute end-0 me-2" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>

                        </form>

                        <span class="cart me-3">
                            <a data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions"
                                aria-controls="offcanvasWithBothOptions" role="button" aria-controls="collapseExample">
                                <i class="far fa-shopping-cart fa-md"></i>
                                <span class='badge badge-warning' id='lblCartCount'></span>
                            </a>
                        </span>



                        <div class="nav-item user" title="Login">
                            <a href="{{ url('/login') }}" class="nav-link" role="button" aria-expanded="false"><i
                                    class="far fa-user solid fa-md"></i></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3 mt-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        </div>
        </nav>
        <div class="spinner-wrapper d-flex justify-content-center align-items-center">

            <div class="spinner-border" role="status" id="spinner">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endguest
    @auth
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid d-flex justify-content-between">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col-5 d-flex justify-content-start">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Socks
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{ url('/menproduct') }}" aria-expanded="false">
                                    Men
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/women-product') }}" role="button"
                                    aria-expanded="false">
                                    Women
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Subscription
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Sales
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 d-flex justify-content-center">

                        <a class="navbar-brand" href="{{ url('/') }}">NO BRAND</a>

                    </div>
                    <div class="col-5 d-flex justify-content-end align-items-center">
                        <form class="d-flex position-relative " role="search">
                            <input class="form-control me-2 position-relative" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn position-absolute end-0 me-2" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>

                        </form>
                        <span class="cart me-3">
                            <a data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions"
                                aria-controls="offcanvasWithBothOptions" role="button" aria-controls="collapseExample">
                                <i class="far fa-shopping-cart fa-md"></i>
                                <span class='badge badge-warning' id='lblCartCount'>0</span>
                            </a>
                        </span>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div>

                        <div class="nav-item dropdown user">

                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="far fa-user solid fa-md"></i></i></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-item d-flex">
                                    <a class="d-block w-100" href="/profile/{{ auth()->id() }}">Profile</a>
                                </li>
                                <li class="dropdown-item d-flex">
                                    <a href="">Orders</a>
                                </li>

                                <li class="dropdown-item d-flex">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-dark">Log out</button>
                                    </form>
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <div class="spinner-wrapper d-flex justify-content-center align-items-center">

            <div class="spinner-border" role="status" id="spinner">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endauth


    <div class="row d-flex justify-content-end">
        <div class="col-3 me-3">
            <div class="alert alert-danger visually-hidden" id="alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
            <div class="alert alert-success visually-hidden" id="alert-success" role="alert">
                A simple success alert—check it out!
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end custom-offcanvas" data-bs-scroll="true" tabindex="-1"
        id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title normal-text" id="offcanvasWithBothOptionsLabel">Shopping cart</h5>
            <h5 class="offcanvas-cart-quantity d-flex align-text-center mb-0 fs-5"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body cart">
            {{-- <p>Try scrolling the rest of the page to see this option in action.</p> --}}
        </div>
        <div class="offcanvas-footer d-flex justify-content-around mb-4 custom-footer">
            <button class="btn btn-dark">
                Delete all
            </button>
            <a class="btn btn-dark" href="{{ route('checkout') }}">
                Checkout
            </a>
        </div>
    </div>
    @yield('content')
    <div class="container-fluid footer d-flex p-0">
        <!-- Content here -->
        <div class="row footer g-0">
            <div class="col-6 col-sm-6 col-md-7 justify-content-center" style="padding: 0px 70px 0px 30px">
                <h2 class="join-us-heading display-1">JOIN OUR COMMUNITY</h2>
                <p class="text-white fs-4">
                    We'll stitch your inbox differently and you'll receive 20% off your first order.
                </p>
                <div class="row d-flex align-items-center">
                    <div class="col-6">

                        <div class="input-group input-group-lg">

                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-2">

                        {{-- <button type="button" class="btn btn-outline-dark">Dark</button> --}}
                        <button type="button" class="btn btn-outline-light">Subscribe</button>

                    </div>
                </div>
                <div class="contact-section mt-4">

                    <h2 class="primary-text fs-1 text-white">Call us</h2>
                    <p class="normal-text fs-2 text-white m-0">Phone number: 0829004003</p>
                    <p class="normal-text fs-2 text-white m-0">Email: uit@edu.vn</p>
                </div>
                <div class="copyright mb-1">
                    <span>
                        <p class="normal-text fs-5 text-white">2023PCC All rights reserved</p>
                    </span>
                </div>
            </div>
            <div class="col-6 col-md-5">
                <ul class="footer-options">
                    <li class="normal-text fs-2"><a class="text-white" href="">Help center</a></li>
                    <li class="normal-text fs-2"><a class="text-white" href="">Return</a></li>
                    <li class="normal-text fs-2"><a class="text-white" href="">Order status</a></li>
                    <li class="normal-text fs-2"><a class="text-white" href="">Policy</a></li>
                    <li class="normal-text fs-2"><a class="text-white" href="">Find our stores</a></li>

                </ul>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('/build/assets/app-125e486a.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
<script>
    /* Script to render html element*/
    // let cart = @json(session('cart', []));
    // console.log(cart)
    /* Script for multiple image carousel */

    // console.log(document.querySelector('.carousel-item-img'))

    function RenderCustomerCart() {

        @if (Auth::check())
            axios.get('{{ route('api.get-cart') }}')
                .then(function(response) {
                    // Handle the response

                    let offcanvasCart = document.querySelector('.offcanvas-body.cart');
                    offcanvasCart.innerHTML = '';
                    response.data.data.original.data.forEach(item => {
                        // console.log(item)
                        let cartItem = document.createElement('div');
                        cartItem.className =
                            'cart-item d-flex justify-content-between align-items-center';
                        cartItem.innerHTML = `
                    <div class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center">
                                             <img src="{{ url('${JSON.parse(item.image)[0]}') }}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">${item.name}</h6>
                                                <h6 class="text-black mb-0">${item.color}</h6>
                                                <h6 class="text-black mb-0">${item.size}</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-4 col-xl-2 d-flex">
                                                <div class="quantity d-flex justify-content-center align-items-center">
    
                                                    <h2 class="text-black mb-0">${item.quantity}</h2>
    
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-1 col-xl-2 d-flex justify-content-center">
                                                <h6 class="mb-0">USD ${item.price}</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-muted" target-detail="${item.detailID}"><i class="fas fa-times"></i></a>
                                            </div>
                    `

                        let hr = document.createElement('hr');
                        hr.className = 'my-4';

                        offcanvasCart.appendChild(cartItem);
                        offcanvasCart.appendChild(hr);
                        RenderCartQuantity();
                    })

                })
                .catch(function(error) {
                    // Handle the error
                    console.log(error);
                });
        @else
            RenderCart();
            RenderCartQuantity();
        @endif
    }
    RenderCustomerCart();

    document.querySelectorAll('.carousel.multiple-image').forEach(stack => {
        let items = stack.querySelectorAll('.carousel-item')
        items.forEach((item) => {
            const minPerSlide = 4
            let next = item.nextElementSibling
            for (let i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                item.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    })
    /* Script set background image for image wrapper */
    let wrapper = document.querySelectorAll('.col .p-4.h-100')

    wrapper.forEach((els) => {
        els.style.backgroundImage = `url(${els.getAttribute('img-src')})`
    })
    /* Init carousel items image */
    setTimeout(() => {
        document.querySelectorAll('.carousel-item-img').forEach((item) => {
            item.style.backgroundImage = `url(${item.getAttribute('img-src')})`
        });

    }, 50);

    /* Script to remove white background of product pictures*/
    document.querySelectorAll('.img-fluid').forEach((item1) => {

        item1.style.mixBlendMode = 'multiply'

    })
    document.querySelectorAll('.product-img').forEach((item2) => {
        item2.style.backgroundImage = `url(${item2.getAttribute('img-src')})`
    })




    function RenderCartItems(cart) {
        let offcanvasCart = document.querySelector('.offcanvas-body.cart');
        offcanvasCart.innerHTML = '';
        cart.forEach(item => {
            let cartItem = document.createElement('div');
            cartItem.className =
                'cart-item d-flex justify-content-between align-items-center';
            cartItem.innerHTML = `
                <div class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center">
                                         <img src="{{ url('${item.image}') }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">${item.name}</h6>
                                            <h6 class="text-black mb-0">${item.color}</h6>
                                            <h6 class="text-black mb-0">${item.size}</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-4 col-xl-2 d-flex">
                                            <div class="quantity d-flex justify-content-center align-items-center">

                                                <h2 class="text-black mb-0">${item.quantity}</h2>

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-1 col-xl-2 d-flex justify-content-center">
                                            <h6 class="mb-0">USD ${item.price}</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-muted" target-detail="${item.detailId}"><i class="fas fa-times"></i></a>
                                        </div>
                `

            let hr = document.createElement('hr');
            hr.className = 'my-4';
            offcanvasCart.appendChild(cartItem);
            offcanvasCart.appendChild(hr);
        })
    }

    function RenderCart() {
        console.log('render cart')
        // Get the cart data from localStorage
        let data = JSON.parse(localStorage.getItem('cart')) || [];
        let offcanvasCart = document.querySelector('.offcanvas-body.cart');
        offcanvasCart.innerHTML = '';
        data.forEach(item => {
            console.log(item)

            let cartItem = document.createElement('div');
            cartItem.className =
                'cart-item d-flex justify-content-between align-items-center';
            cartItem.innerHTML = `
                <div class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center">
                                         <img src="{{ url('${item.image}') }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">${item.name}</h6>
                                            <h6 class="text-black mb-0">${item.color}</h6>
                                            <h6 class="text-black mb-0">${item.size}</h6>
                                        </div>
                                        <div class="col-md-3 col-lg-4 col-xl-2 d-flex">
                                            <form class="row d-flex justify-content-center align-items-center">
                                                <div class="quantity row d-flex justify-content-center align-items-center">
                                                    <div class="form-outline quantity-attribute mt-3 quantity-input input-group normal-text fs-4">
                                                        <button class="btn btn-outline-secondary btn-sm decrease custom-width-button" type="button">-</button>
                                                        <input type="text" id="typeNumber" class="form-control form-control-sm custom-width-input text-center" min="1" value="1" />
                                                        <button class="btn btn-outline-secondary btn-sm increase custom-width-button" type="button">+</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 col-lg-1 col-xl-2 d-flex justify-content-center">
                                            <h6 class="mb-0 text-center"> ${item.price}</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-muted" target-detail="${item.detailId}"><i class="fas fa-times"></i></a>
                                        </div>
                `

            let hr = document.createElement('hr');
            hr.className = 'my-4';

            offcanvasCart.appendChild(cartItem);
            offcanvasCart.appendChild(hr);
            const footer = document.querySelector('.offcanvas-footer');
            let button = document.createElement('button');
            button.className = 'btn btn-dark';
            button.innerText = 'Delete all';
            button.addEventListener('click', () => {
                localStorage.removeItem('cart');
                RenderCart();
                RenderCartQuantity();
            })

            let checkoutButton = document.createElement('button');
            checkoutButton.className = 'btn btn-dark';
            checkoutButton.innerText = 'Checkout';
            checkoutButton.addEventListener('click', () => {
                window.location.href = ""
            })

            // footer.appendChild(button);
            // footer.appendChild(checkoutButton);
        })


    }
    document.querySelector('body').addEventListener('click', function(e) {
        if (e.target.matches('.fas.fa-times') || e.target.matches('.delete-product')) {
            @if (Auth::check())
                detailId = e.target.closest('.text-muted').getAttribute('target-detail')
                console.log(detailId)
                axios.post('{{ route('api.delete-from-cart') }}', {
                    detailId: detailId,
                }).then((response) => {
                    console.log(response)
                    RenderCustomerCart()
                    RenderCartQuantity()
                })
            @else
                console.log('delete')
                e.preventDefault()
                let cart = JSON.parse(localStorage.getItem('cart'))
                console.log(e.target)
                let detailId = e.target.closest('.text-muted').getAttribute('target-detail')
                cart = cart.filter((el) => {
                    return el.detailId != detailId
                })
                localStorage.setItem('cart', JSON.stringify(cart))
                RenderCart()
                RenderCartQuantity()
            @endif
        }
    });


    function RenderCartQuantity() {
        @if (Auth::check())
            {
                axios.get('{{ route('api.get-cart') }}').then(function(response) {
                        // Handle the response

                        let cartQuantity = document.querySelector('#lblCartCount');
                        const offCanvasCart = document.querySelector('.offcanvas-cart-quantity')

                        if (response.data.data.original.data == null) {
                            cartQuantity.innerText = '0';
                            offCanvasCart.innerHTML = '0 item';
                            return;
                        }
                        if (response.data.data.original.data.length == 1) {

                            offCanvasCart.innerHTML = `${response.data.data.original.data.length} item`;
                            cartQuantity.innerText = response.data.data.original.data.length;
                        } else {

                            offCanvasCart.innerHTML = `${response.data.data.original.data.length} items`;
                            cartQuantity.innerText = response.data.data.original.data.length;
                        }
                    })

                    .catch(function(error) {
                        // Handle the error
                        console.log(error);
                    });
            }
        @else
            {

                let cart = JSON.parse(localStorage.getItem('cart'))
                let cartQuantity = document.querySelector('#lblCartCount');
                const offCanvasCart = document.querySelector('.offcanvas-cart-quantity')

                if (cart == null) {
                    cartQuantity.innerText = '';
                    offCanvasCart.innerHTML = '0 item';
                    return;
                }
                if (cart.length == 1) {
                    offCanvasCart.innerHTML = `${cart.length} item`;
                    cartQuantity.innerText = cart.length;
                } else {

                    offCanvasCart.innerHTML = `${cart.length} items`;
                    cartQuantity.innerText = cart.length;
                }
            }
        @endif
    }
    const spinnerWrapper = document.querySelector('.spinner-wrapper');
    window.addEventListener('load',
        () => {
            spinnerWrapper.style.opacity = 0;
            setTimeout(() => {
                spinnerWrapper.style.display = 'none';
                spinnerWrapper.style.zIndex = -1;
            }, 100);
        });
    document.querySelector('.cart a').addEventListener('click', (e) => {
        setTimeout(() => {
            document.querySelectorAll('.offcanvas-backdrop').forEach((el) => {
                el.addEventListener('click', () => {
                    document.querySelectorAll('.offcanvas-backdrop').forEach((
                        element) => {
                        element.classList.remove('show')
                    })

                })
            })
        }, 100);

    })
</script>

</html>
