@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
    <div class="container-fluid p-2 mt-5">
        <h1>Search Results</h1>
        <div class="row row-cols-4">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card border-0">
                        <div class="card-img">
                            <div class="card-img">
                                <img src="{{ url($product['img'][0]) }}" class="img-fluid">
                                <img src="{{ url($product['img'][1]) }}" class="img-fluid hover-img">
                            </div>
                        </div>
                        <div class="container-fluid card-body">
                            <div class="row product-detail">
                                <div class="col-8 name-col normal-text fs-5">
                                    <a
                                        href="{{ url('/product-detail/' . $product['productId'] . '?detailID=' . $product['productDetailId']) }}">
                                        {{ $product['name'] }}</a>
                                </div>
                                <div class="col-4 price-col normal-text fs-5 d-flex">
                                    <p>{{ $product['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
