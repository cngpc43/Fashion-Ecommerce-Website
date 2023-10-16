<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>vl</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>

    @extends('layouts.app')
    @section('content')
    <div class="container-fluid p-0" style="overflow: hidden">

        <div id="carouselExampleRide" class="carousel slide">
            <div class="carousel-inner banner">
                <div class="carousel-item">
                    {{-- <img class="carousel-item-img d-none" src="{{ asset('imgs/10007.jpg') }}" alt=""> --}}
                    <div class="carousel-item-img" img-src="{{ url('imgs/10007.jpg') }}"></div>
                    <div class="carousel-caption ">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-img" img-src="{{ url('imgs/10004.jpg') }}"></div>
                    {{-- <img src="{{ asset('imgs/10004.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                    <div class="carousel-caption d-md-block">
                        <h2>First slide label</h2>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    {{-- <img src="{{ asset('imgs/10001.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                    <div class="carousel-item-img" img-src="{{ url('imgs/10001.jpg') }}"></div>
                    <div class="carousel-caption d-md-block" style="bottom: 50%; transform: translateY(-50%);">
                        <h3>First slide label</h3>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container-fluid p-0 my-3 mt-5">
            <div class="row mx-auto my-auto justify-content-center">
                <span>
                    <p class="normal-text">TRENDING NOW</p>
                </span>
                <div class="container-fluid p-3">
                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3 category-row">
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10099.jpg') }}"></div>
                            <p class="normal-text mt-2">SOCKS</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10100.jpg') }}"></div>
                            <p class="normal-text mt-2">UNDERWEAR</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10101.jpeg') }}"></div>
                            <p class="normal-text mt-2">APPAREL</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10102.jpg') }}"></div>
                            <p class="normal-text mt-2">HATS & BEANIES</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row banner mt-5 mb-5">
            <div class="col-12 col-lg-6 p-0">
                <img src="{{ asset('imgs/WhiteQTR.jpg') }}" alt="" class="img-responsive">
            </div>
            <div class="col-12 col-lg-6 p-0">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <div class="container">
                        <h5 class="text-center">
                            From the icon shop
                        </h5>
                        <p style="letter-spacing: -0.36px;" class="primary-text fs-1 text-center">
                            QUARTER HEIGHT
                        </p>
                        <div class="d-flex justify-content-center">
                            <a style="letter-spacing: 0.96px;" href="#"
                                class="btn btn-dark px-lg-4 px-3 py-lg-2 py-1 primary-text fs-5 fw-bold">EXPLORE
                                COLLECTION</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel1" class="carousel slide multiple-image">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10003.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card border-0">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="container-fluid card-body">
                                        <div class="row product-detail">
                                            <div class="col">
                                                <a href="">Socks 3 pack</a>
                                            </div>
                                            <div class="col">
                                                <p>29,99usd</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel1" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel1" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row banner mt-5 mb-5">
            <div class="col-12 col-lg-6 p-0">
                <div class="banner-frame ">

                    <div class="sock-banner" style="background-image: url({{ url('/imgs/10049.png') }})">

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 p-0">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <div class="container">
                        <h5 class="text-center">
                            New Collaboration
                        </h5>
                        <p style="letter-spacing: -0.36px;" class="primary-text fs-1 text-center">
                            AMONGST THE STARS
                        </p>
                        <p class="text-center mb-3">
                            Stance is excited to be partnering with Bethesda Game Studios on Starfield, an exciting new
                            next-generation rpg where
                            you embark on a journey to answer humanity’s greatest mystery.

                        </p>
                        <div class="d-flex justify-content-center">
                            <a style="letter-spacing: 0.96px;" href="#"
                                class="btn btn-dark px-lg-4 px-3 py-lg-2 py-1 primary-text fs-5 fw-bold">SHOP NOW</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="CarouselCollection-2" class="carousel slide multiple-image">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10015.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 1</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10016.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 2</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10017.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 3</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10018.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 4</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10019.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 5</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{ url('/imgs/Home/10019.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 6</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#CarouselCollection-2" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#CarouselCollection-2" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>





    {{-- <h1 class="mt-5">DM</h1> --}}



    {{-- <script src="assets/bootstrap-dist/js/bootstrap.bundle.min.js"></script> --}}
    @endsection
</body>

</html>