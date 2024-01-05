<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Men</title>
</head>

@extends('layouts.app')
@section('content')

    <body>
        <div class="container-fluid p-0 overflow-hidden">
            <div id="carouselExampleRide" class="carousel slide men-product">
                <div class="carousel-inner banner">
                    <div class="carousel-item active">
                        <div class="carousel-item-img hero-banner">
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid mt-5 p-2 mb-5">

                <span class="ms-5">
                    <p class="primary-text ps-3 display-1">MAKE YOURSELF COMFORTABLE</p>
                </span>
                <div class="container-fluid text-center p-3">

                    <div class="container-fluid">

                        <div class="navbar-nav d-flex flex-row justify-content-around">
                            <a class="nav-link normal-text fs-4" href="#">No shows</a>
                            <a class="nav-link normal-text fs-4" href="#">Lows</a>
                            <a class="nav-link normal-text fs-4" href="#">Tabs</a>
                            <a class="nav-link normal-text fs-4">Quarter</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        </div>

        <div class="container-fluid mt-4 p-2 m-0 overflow-hidden">

            <span>
                <p class="normal-text">Trending now</p>
            </span>
            <div class="container my-3 product-slider">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="Carousel-Collection-1" class="carousel slide multiple-image">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($newarrival as $index => $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="card border-0">
                                            <div class="card-img">
                                                <img src="{{ url($item['img'][0]) }}" class="img-responsive">
                                                {{-- <img src="{{ url($item['img'][1]) }}" class="img-fluid hover-img"> --}}
                                            </div>
                                            <div class="container-fluid card-body p-2">
                                                <div class="row product-detail d-flex align-items-center">
                                                    <div class="col-8 name-col normal-text fs-5">
                                                        <a class="text-end"
                                                            href="{{ url('/product-detail/' . $item['productId']) }}">{{ $item['name'] }}</a>
                                                    </div>
                                                    <div class="col-4 price-col normal-text fs-5">

                                                        <p class="text-end mb-0 me-lg-4 me-sm-0">USD
                                                            {{ number_format($item['price'], 2) }}</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-secondary control-center control-carousel" type="button"
                            data-bs-target="#Carousel-Collection-1" data-bs-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-secondary control-center control-carousel" type="button"
                            data-bs-target="#Carousel-Collection-1" data-bs-slide="next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 p-2 m-0 overflow-hidden">

            <div class="row overflow-hidden">
                <div class="col-12 ms-2">
                    <h1>
                        <span class="primary-text fs-1">PUT YOUR BEST FOOT FORWARD</span>
                    </h1>
                </div>
            </div>
            <div class="container-fluid overflow-hidden">
                <div class="row p-0">
                    <div class="col p-0">

                        <div class="container-fluid p-0">
                            <div class="shadow-sm row row-cols-2 row-cols-lg-3 p-2 filter-row fs-5">
                                <div class="col text-start filter-button">
                                    <div class="btn-group">

                                        <button type="button" data-bs-toggle="dropdown" data-bs-target="#filter-collapse"
                                            role="button">FILTER</button>
                                        <ul class="dropdown-menu p-3 m-2"
                                            style="position: relative; z-index: 1000 !important">

                                            @foreach ($product_filter as $option)
                                                <li class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="category[]"
                                                            value="{{ $option->name }}" id="category{{ $loop->index }}">
                                                        <label class="form-check-label" for="category{{ $loop->index }}">
                                                            <a class="text-decoration-none text-dark">
                                                                {{ strtoupper($option->name) }}
                                                            </a>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col text-center d-lg-block d-none">
                                    <div class="row">
                                        <div class="col p-0">ALL</div>
                                        <div class="col p-0">MULTIPACKS</div>
                                        <div class="col p-0">SINGLE</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <span class="me-3">SORT BY</span>
                                        <select name="sort" id="sort">
                                            <option value="">Select</option>
                                            <option value="{{ route('socks', ['sort' => 'price_asc']) }}">Price
                                                low to high</option>
                                            <option value="{{ route('socks', ['sort' => 'price_desc']) }}">Price
                                                high to low</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="container-fluid p-2 mt-4">

                            <div class="row row-cols-4 product-list">
                                @php
                                    $productData = $product->getData(true);
                                @endphp
                                @foreach ($productData['data'] as $item)
                                    <div class="col-md-3">
                                        <div class="card border-0">
                                            <div class="card-img">
                                                <div class="card-img">
                                                    <img src="{{ url($item['img'][0]) }}" class="img-responsive">
                                                    {{-- <img src="{{ url($item['img'][1]) }}" class="img-fluid hover-img"> --}}
                                                </div>
                                            </div>
                                            <div class="container-fluid card-body">
                                                <div class="row product-detail d-flex align-items-center">
                                                    <div
                                                        class="col-8 name-col normal-text fs-5 d-flex justify-content-start">
                                                        <a
                                                            href="{{ url('/product-detail/' . $item['productId'] . '?detailID=' . $item['productDetailId']) }}">
                                                            {{ $item['name'] }}</a>
                                                    </div>
                                                    <div
                                                        class="col-4 price-col normal-text fs-5 d-flex justify-content-end">
                                                        <p class="text-end mb-0 ">USD
                                                            {{ number_format($item['price'], 2) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script>
        const hi = @json($newarrival);
        console.log(hi);
        const banner = @json($banner);
        const categories = @json($categories);
        document.querySelector('.hero-banner').setAttribute(
            'img-src', banner[0].img);
        document.getElementById('sort').addEventListener('change', fetchData);
        document.getElementById('sort').addEventListener('change', fetchData);
        document.querySelectorAll('input[name="category[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', fetchData);
        });

        function fetchData() {
            var sort = document.getElementById('sort').value;
            console.log('Sort:', sort);
            var selectedCategories = Array.from(document.querySelectorAll('input[name="category[]"]:checked')).map(function(
                checkbox) {
                return checkbox.value;
            });

            var url = new URL('/socks', window.location.origin);
            var params = new URLSearchParams();

            if (selectedCategories.length > 0) {
                selectedCategories.forEach(function(category) {
                    params.append('category[]', category);
                });
            }

            if (sort) {
                params.append('sort', sort);
            }
            console.log('URL:', url.toString());
            url.search = params.toString();

            fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                .then(function(response) {
                    return response.text();
                })
                .then(function(products) {
                    products = JSON.parse(products);
                    console.log(products);
                    var productContainer = document.querySelector('.product-list');
                    productContainer.innerHTML = '';

                    products.original.data.forEach(function(product) {
                        productContainer.innerHTML += productTemplate(product);
                    });
                });
        }
        document.addEventListener('DOMContentLoaded', function() {
            var loadMoreButton = document.getElementById('load-more');
            if (loadMoreButton) {
                loadMoreButton.addEventListener('click', function() {
                    var url = loadMoreButton.getAttribute('data-url');

                    fetch(url, {
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            var productList = document.querySelector('.product-list');
                            data.original.data.forEach(function(product) {
                                productList.innerHTML += productTemplate(product);
                            });


                            if (data.next_page_url) {
                                loadMoreButton.setAttribute('data-url', data.next_page_url);
                            } else {

                                loadMoreButton.style.display = 'none';
                            }
                        });
                });
            }
        });
    </script>
@endsection


</html>
