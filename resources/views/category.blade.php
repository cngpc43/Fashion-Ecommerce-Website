<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ strtoupper(request()->segment(2)) }}</title>
</head>

@extends('layouts.app')
@section('content')
    <section class="py-5">

        <div class="row overflow-hidden">
            <div class="col-12 ms-2">
                <h1>
                    <span class="primary-text fs-1">{{ strtoupper(request()->segment(2)) }}</span>
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

                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-2 mt-4">

                        <div class="row row-cols-4">
                            @foreach ($products as $item)
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <div class="card-img">
                                                <img src="{{ url(json_decode($item->img)[0]) }}" class="img-fluid">
                                                <img src="{{ url(json_decode($item->img)[1]) }}"
                                                    class="img-fluid hover-img">
                                            </div>
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col-8 name-col normal-text fs-5">
                                                    <a
                                                        href="{{ url('/product-detail/' . $item->productId . '?detailID=' . $item->productDetailId) }}">
                                                        {{ $item->name }}</a>
                                                </div>
                                                <div class="col-4 price-col normal-text fs-5 d-flex">
                                                    <p>{{ $item->price }}</p>
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
    </section>
    {{-- </div> --}}


    <script>
        console.log(@json($products))

        // document.querySelector('.hero-banner').setAttribute(
        //     'img-src', banner[0].img);
    </script>
@endsection


</html>
