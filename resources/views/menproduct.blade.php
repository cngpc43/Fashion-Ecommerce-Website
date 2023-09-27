@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0">
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
        <div class="container mt-5">

            <span class="primary-text">
                <p>MAKE YOURSELF COMFORTABLE</p>
            </span>
            <div class="container text-center">
                <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3 men-prod-row">
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10099.jpg') }}"></div>

                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10100.jpg') }}"></div>
                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10101.jpeg') }}"></div>
                    </div>
                    <div class="col">
                        <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10102.jpg') }}"></div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
