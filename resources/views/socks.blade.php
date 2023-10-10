@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <div id="carouselExampleRide" class="carousel slide men-product">
            <div class="carousel-inner banner">
                <div class="carousel-item active">
                    <div class="carousel-item-img men-product-banner" img-src="{{ url('imgs/Socks/10074.jpg') }}">
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">No shows</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Low</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tabs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tabs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tabs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tabs</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection
