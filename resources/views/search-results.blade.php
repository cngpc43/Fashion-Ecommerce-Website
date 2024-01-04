@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
    @php
        $groupedProducts = $products->groupBy('productId');
        $count = $groupedProducts->count();
    @endphp
    <div class="container-fluid p-2 mt-5">
        <h1>Found {{ $count }} products for "{{ $query }}"</h1>
        <div class="row row-cols-4">
            @foreach ($groupedProducts as $gproducts)
                @php
                    $product = $gproducts->first();
                    $images = json_decode($product->img);
                @endphp
                <div class="col-md-3">
                    <a href="{{ url('/product-detail/' . $product->productId . '?detailID=' . $product->productDetailId) }}"
                        class="card border-0">
                        <div class="card-img">
                            <div class="card-img">
                                @if (!empty($images))
                                    <img src="{{ url($images[0]) }}" class="img-fluid">
                                    <img src="{{ url($images[1]) }}" class="img-fluid hover-img">
                                @endif
                            </div>
                        </div>
                        <div class="container-fluid card-body">
                            <div class="row product-detail">
                                <div class="col-8 name-col normal-text fs-5">
                                    <span>{{ $product->name }}</span>
                                </div>
                                <div class="col-4 price-col normal-text fs-5 d-flex">
                                    <p>USD {{ $product->price }},00</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
