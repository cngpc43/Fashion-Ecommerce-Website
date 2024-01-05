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
                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3 category-row">
                        @foreach ($categories as $category)
                            <div class="col mb-5"
                                onclick="location.href='{{ route('category', ['categoryName' => $category->name]) }}'">
                                <div class="p-4 h-100" img-src="{{ url($category->img) }}"></div>
                                <p class="normal-text mt-2">{{ strtoupper($category->name) }}</p>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4 p-2 m-0 overflow-hidden">

                <span>
                    <p class="normal-text">NEW ARRIVALS</p>
                </span>
                <div class="container text-center my-3 product-slider">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="Carousel-Collection-1" class="carousel slide multiple-image">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($newarrival as $index => $item)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="col-md-3">
                                            <div class="card border-0">
                                                <div class="card-img">
                                                    <img src="{{ url($item['img'][0]) }}" class="img-fluid">
                                                    <img src="{{ url($item['img'][1]) }}" class="img-fluid hover-img">
                                                </div>
                                                <div class="container-fluid card-body p-2">
                                                    <div class="row product-detail d-flex align-items-center">
                                                        <div
                                                            class="col-8 name-col normal-text fs-5 d-flex justify-content-start">
                                                            <a style="text-align: start"
                                                                href="{{ url('/product-detail/' . $item['productId']) }}">{{ $item['name'] }}</a>
                                                        </div>
                                                        <div class="col-4 price-col normal-text fs-5">

                                                            <p class="text-end mb-0 me-4 me-sm-0">USD
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
                <span>
                    <p class="normal-text">UNDERWEAR</p>
                </span>
                <div class="container text-center my-3">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="recipeCarousel1" class="carousel slide multiple-image">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($underwear as $index => $item)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="col-md-3">
                                            <div class="card border-0">
                                                <div class="card-img">
                                                    <div class="card-img">
                                                        <img src="{{ url($item['img'][0]) }}" class="img-fluid">
                                                        <img src="{{ url($item['img'][1]) }}" class="img-fluid hover-img">
                                                    </div>
                                                </div>
                                                <div class="container-fluid card-body">
                                                    <div class="row product-detail d-flex align-items-center">
                                                        <div
                                                            class="col-8 name-col normal-text fs-5 d-flex justify-content-start">
                                                            <a class="text-start"
                                                                href="{{ url('/product-detail/' . $item['productId']) . '?detailID=' . $item['productDetailId'] }}">{{ $item['name'] }}</a>
                                                        </div>
                                                        <div
                                                            class="col-4 price-col normal-text fs-5 d-flex justify-content-end">
                                                            <p class="text-end mb-0 me-3">USD
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
                                data-bs-target="#recipeCarousel1" data-bs-slide="prev">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-secondary control-center control-carousel" type="button"
                                data-bs-target="#recipeCarousel1" data-bs-slide="next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-5 p-2 m-0 overflow-hidden">
                <span>
                    <p class="normal-text">ICON CREWS</p>
                </span>
                <div class="container text-center my-3">
                    <div class="row mx-auto my-auto justify-content-center">
                        <div id="iconcrew" class="carousel slide multiple-image">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($iconcrew as $index => $item)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="col-md-3">
                                            <div class="card border-0">


                                                <div class="card-img">
                                                    <img src="{{ url($item['img'][0]) }}" class="img-fluid">
                                                    <img src="{{ url($item['img'][1]) }}" class="img-fluid hover-img">
                                                </div>

                                                <div class="container-fluid card-body">
                                                    <div class="row product-detail">
                                                        <div class="col-8 name-col normal-text fs-5">
                                                            <a
                                                                href="{{ url('/product-detail/' . $item['productId']) . '?detailID=' . $item['productDetailId'] }}">{{ $item['name'] }}</a>
                                                        </div>
                                                        <div class="col-4 price-col normal-text fs-5 d-flex">
                                                            <p class="text-end mb-0">USD
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
                                data-bs-target="#iconcrew" data-bs-slide="prev">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-secondary control-center control-carousel" type="button"
                                data-bs-target="#iconcrew" data-bs-slide="next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row overflow-hidden">
                    <div class="col-12 ms-2">
                        <h1>
                            <span class="primary-text fs-1">FROM TOE TO HEAD</span>
                        </h1>
                    </div>
                </div>
                <div class="container-fluid overflow-hidden">
                    <div class="row p-0">
                        <div class="col p-0">

                            <div class="container-fluid p-0">
                                <div class="shadow-sm row row-cols-2 row-cols-lg-2 p-2 filter-row fs-5">
                                    <div class="col text-start filter-button">
                                        <div class="btn-group">

                                            <button type="button" data-bs-toggle="dropdown"
                                                data-bs-target="#filter-collapse" role="button">FILTER</button>
                                            <ul class="dropdown-menu p-3 m-2"
                                                style="position: relative; z-index: 1000 !important">

                                                @foreach ($product_filter as $option)
                                                    <li class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="category[]" value="{{ $option->name }}"
                                                                id="category{{ $loop->index }}">
                                                            <label class="form-check-label"
                                                                for="category{{ $loop->index }}">
                                                                <a class="text-decoration-none text-dark"
                                                                    href="{{ route('category', ['categoryName' => $option->name]) }}">
                                                                    {{ strtoupper($option->name) }}
                                                                </a>
                                                            </label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="row">
                                            <label for="customRange1" class="form-label">Example range</label>
                                            <div class="range-slider">
                                            
                                                <input type="range" class="form-range" id="customRange1"
                                                    oninput="showValue(this.value)">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col">
                                        <div class="d-flex justify-content-end">
                                            <span class="me-3">SORT BY</span>
                                            <select name="sort" id="sort">
                                                <option value="">Select</option>
                                                <option value="{{ route('menproduct', ['sort' => 'price_asc']) }}">Price
                                                    low to high</option>
                                                <option value="{{ route('menproduct', ['sort' => 'price_desc']) }}">Price
                                                    high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid p-2 mt-4">

                                <div class="row row-cols-4 product-list" style="min-height: 200px">
                                    @foreach ($product as $item)
                                        <div class="col-md-3">
                                            <div class="card border-0">
                                                <div class="card-img">
                                                    <div class="card-img">
                                                        <img src="{{ url($item['img'][0]) }}" class="img-fluid">
                                                        <img src="{{ url($item['img'][1]) }}"
                                                            class="img-fluid hover-img">
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
        const hi = @json($product_filter);
        console.log(hi);
        console.log('dm')
        const banner = @json($banner);
        const categories = @json($categories);
        document.querySelector('.hero-banner').setAttribute(
            'img-src', banner[0].img);

        // document.getElementById('sort').addEventListener('change', function(event) {
        //     event.preventDefault();
        //     var sort = this.value;
        //     fetchSortedData(sort);
        // });

        // function fetchSortedData(url) {
        //     console.log(url);
        //     var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        //     fetch(url, {
        //             headers: {
        //                 'X-Requested-With': 'XMLHttpRequest'
        //             }
        //         })
        //         .then(response => response.text())
        //         .then(data => {
        //             var productList = document.querySelector('.product-list');
        //             console.log(JSON.parse(data));
        //             productList.innerHTML = '';
        //             JSON.parse(data).forEach(item => {
        //                 productList.innerHTML += productTemplate(item);
        //             });
        //         })
        //         .catch(error => console.error(error));
        // }


        // document.querySelectorAll('input[name="category[]"]').forEach(function(checkbox) {
        //     checkbox.addEventListener('change', function() {
        //         var selectedCategories = Array.from(document.querySelectorAll(
        //             'input[name="category[]"]:checked')).map(function(checkbox) {
        //             return checkbox.value;
        //         });
        //         if (selectedCategories.length > 0) {

        //             fetch('/menproduct?category[]=' + selectedCategories.join('&category[]='), {
        //                     headers: {
        //                         'Accept': 'application/json',
        //                         'X-Requested-With': 'XMLHttpRequest',
        //                     },
        //                 })
        //                 .then(function(response) {
        //                     return response.text();
        //                 })
        //                 .then(function(products) {
        //                     products = JSON.parse(products);
        //                     var productContainer = document.querySelector('.product-list');
        //                     productContainer.innerHTML = '';

        //                     products.forEach(function(product) {
        //                         productContainer.innerHTML += productTemplate(product);
        //                     });
        //                 });
        //         } else {
        //             fetch('/menproduct', {
        //                     headers: {
        //                         'Accept': 'application/json',
        //                         'X-Requested-With': 'XMLHttpRequest',
        //                     },
        //                 })
        //                 .then(function(response) {
        //                     return response.text();
        //                 })
        //                 .then(function(products) {
        //                     products = JSON.parse(products);
        //                     var productContainer = document.querySelector('.product-list');
        //                     productContainer.innerHTML = '';

        //                     products.forEach(function(product) {
        //                         productContainer.innerHTML += productTemplate(product);
        //                     });
        //                 });
        //         }
        //     });
        // });
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

            var url = new URL('/menproduct', window.location.origin);
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

                    products.forEach(function(product) {
                        productContainer.innerHTML += productTemplate(product);
                    });
                });
        }
    </script>
@endsection


</html>
