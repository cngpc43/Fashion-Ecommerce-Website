@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0 overflow-hidden">
        <div id="carouselExampleRide" class="carousel slide men-product">
            <div class="carousel-inner banner">
                <div class="carousel-item active">
                    <div class="carousel-item-img men-product-banner" img-src="{{ url('imgs/Men_product/10097.jpg') }}">
                    </div>
                    {{-- <div class="carousel-caption ">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div> --}}
                </div>
            </div>

        </div>
        <div class="container-fluid mt-5 p-2 mb-5">

            <span class="ms-5">
                <p class="primary-text ps-3">MAKE YOURSELF COMFORTABLE</p>
            </span>
            <div class="container-fluid text-center p-3">
                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3 men-prod-row">
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10099.jpg') }}"></div>
                        <p class="normal-text mt-2 mb-3">VAILON</p>
                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10100.jpg') }}"></div>
                        <p class="normal-text mt-2 mb-3">VAILON</p>
                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10101.jpeg') }}"></div>
                        <p class="normal-text mt-2 mb-3">VAILON</p>
                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10102.jpg') }}"></div>
                        <p class="normal-text mt-2 mb-3">VAILON</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid p-2 mt-5">
            <span>
                <p class="normal-text">NEW ARRIVALS</p>
            </span>
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
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
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
        </div>
        <div class="container-fluid mt-5 p-2 m-0 overflow-hidden">
            <span>
                <p class="normal-text">NEW ARRIVALS</p>
            </span>
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
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
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
        </div>
        <div class="container-fluid mt-5 p-2 m-0 overflow-hidden">
            <span>
                <p class="normal-text">UNDERWEAR</p>
            </span>
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
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
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
        </div>
        <div class="container-fluid mt-5 p-2 m-0 overflow-hidden">
            <span>
                <p class="normal-text">ICON CREWS</p>
            </span>
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
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay"></div>
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
                        <div class="shadow-sm row row-cols-2 row-cols-lg-3 p-2 filter-row fs-5">
                            <div class="col text-start filter-button">
                                <button>FILTER</button>
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
                                    <select name="" id=""></select>
                                </div>
                                {{-- <div class="row">
                                    <div class="col">
                                        <span>SORT BY</span>
                                    </div>
                                    <div class="col">
                                        <select name="" id=""></select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-2 mt-4">

                        <div class="row row-cols-4">
                            <div class="col-6 col-md-3">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 product-img-frame">
                                {{-- <img class="product-img" alt="" img-src="/imgs/Men_product/10070.jpg"> --}}
                                <div class="product-img" img-src="/imgs/Men_product/10070.jpg"></div>
                                <div class="row title-body">
                                    <div class="col name">
                                        <p class="normal-text fs-5">FRAGMENT PERFORMANCE T-SHIRT</p>
                                    </div>
                                    <div class="col price text-end">
                                        <P class="normal-text fs-5">USD 55,00</P>
                                    </div>
                                </div>
                                <div class="color-swatches d-flex">
                                    <span>red</span>
                                    <span>green</span>
                                    <span>blue</span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @include('templates.footer') --}}
