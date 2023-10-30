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
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/js/app.js'])

</head>

<body>

    @guest
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
                            @if (Route::has('home'))
                            <a class="nav-link" href="{{ route('menproduct') }}" aria-expanded="false">
                                Men
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('women-product')}}" role="button" aria-expanded="false">
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
                    @if (Route::has('home'))
                    <a class="navbar-brand" href="{{ route('home') }}">VAINOI</a>
                    @endif
                </div>
                <div class="col-5 d-flex justify-content-end align-items-center">
                    <form class="d-flex position-relative " role="search">
                        <input class="form-control me-2 position-relative" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn position-absolute end-0 me-2" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>

                    </form>
                    <span class="cart me-3">

                        <a href=""><i class="far fa-shopping-cart fa-md"></i></a>
                    </span>
                    <span class="user">

                        {{-- <a href="{{ route('login') }}"><i class="far fa-user solid fa-md"></i></i></a> --}}
                    </span>
                </div>
            </div> 
        </div>
    </nav>
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
                            @if (Route::has('home'))
                            <a class="nav-link" href="{{ route('menproduct') }}" aria-expanded="false">
                                Men
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('women-product')}}" role="button" aria-expanded="false">
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
                    @if (Route::has('home'))
                    <a class="navbar-brand" href="{{ route('home') }}">VAINOI</a>
                    @endif
                </div>
                <div class="col-5 d-flex justify-content-end align-items-center">
                    <form class="d-flex position-relative " role="search">
                        <input class="form-control me-2 position-relative" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn position-absolute end-0 me-2" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>

                    </form>
                    <span class="cart me-3">

                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample"><i
                                class="far fa-shopping-cart fa-md"></i></a>
                    </span>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user
                            activates the relevant trigger.
                        </div>
                    </div>
                    <span class="user">

                        <a href="{{ url('/login') }}"><i class="far fa-user solid fa-md"></i></i></a>
                    </span>
                </div>
            </div> 
        </div>
    </nav>
    @endauth

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

</body>
<script src="{{ asset('/build/assets/app-125e486a.js') }}"></script>

<script>
    /* Script to render html element*/

    /* Script for multiple image carousel */
    let items = document.querySelectorAll('.carousel.multiple-image .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })
    /* Script set background image for image wrapper */
    let wrapper = document.querySelectorAll('.col .p-4.h-100')
    wrapper.forEach((els) => {
        els.style.backgroundImage = `url(${els.getAttribute('img-src')})`
    })
    /* Init carousel items image */
    setTimeout(() => {
        document.querySelectorAll('.carousel-item-img').forEach((item) => {
    
            // console.log(item.getAttribute('img-src'))
            item.style.backgroundImage = `url(${item.getAttribute('img-src')})`
    
        });
        
    }, 1000);
    /* Script to remove white background of product pictures*/
    document.querySelectorAll('.img-fluid').forEach((item1) => {
        // console.log(item1.getAttribute('src'))
        item1.style.mixBlendMode = 'multiply'

    })
    document.querySelectorAll('.product-img').forEach((item2) => {   
        item2.style.backgroundImage = `url(${item2.getAttribute('img-src')})`
    })
    
    function renderCarousel(image = [],caption = [{}]){
        // console.log('hello')
        image.forEach((el,i)=>{
            let carouselItem = document.createElement('div')
            carouselItem.className = 'carousel-item'
            carouselItem.style.backgroundColor = '#F6F6FB'
            carouselItem.style.textAlign = 'center'
            carouselItem.style.height = '70vh'
            carouselItem.style.width = '100%'
            let carouselItemImage = document.createElement('div')
            carouselItemImage.style.display = 'inline-block'
            carouselItemImage.style.position = 'absolute'
            carouselItemImage.style.top = '50%'
            carouselItemImage.style.left = '50%'
            carouselItemImage.style.transform = 'translate(-50%, -50%)'
            carouselItemImage.className = 'carousel-item-img'
            carouselItemImage.style.height = '500px'
            carouselItemImage.style.width = '500px'

            if(caption){

                let carouselCaption = document.createElement('div')
                carouselCaption.className = 'carousel-caption d-none d-md-block'
                let captionHeading = document.createElement('h2')
                let captionParagraph = document.createElement('p')
                // captionHeading.innerText = caption[i].heading
                // captionHeading.innerHTML = caption[i].heading
                // captionParagraph.innerHTML = caption[i].paragraph
                // carouselCaption.appendChild(captionHeading)
                // carouselCaption.appendChild(captionParagraph)
                // carouselItem.appendChild(carouselCaption)
            }
            carouselItem.appendChild(carouselItemImage)
            if(!i) carouselItem.classList.add('active')
            carouselItemImage.setAttribute('img-src',el)
            document.querySelector('.carousel-inner').appendChild(carouselItem)
        })
    }
</script>

</html>