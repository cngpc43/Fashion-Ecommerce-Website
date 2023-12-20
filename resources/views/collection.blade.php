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

                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-2 mt-4">

                        {{-- <div class="row row-cols-4">
                            @foreach ($product as $item)
                                <div class="col-6 col-md-3">
                                    <div class="product-img" img-src="{{ url($item['img'][0]) }}">
                                    </div>
                                    <div class="row title-body">
                                        <div class="col name">
                                            <p class="normal-text fs-5">{{ $item['name'] }}</p>
                                        </div>
                                        <div class="col price text-end">
                                            <P class="normal-text fs-5">{{ $item['price'] }}</P>
                                        </div>
                                    </div>
                                    <div class="color-swatches d-flex">
                                        <span>red</span>
                                        <span>green</span>
                                        <span>blue</span>
                                    </div>
                                </div>
                            @endforeach




                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>
    <script>
        const collection = @json($collection);
        console.log(collection)
        console.log(@json($products))
        // document.querySelector('.hero-banner').setAttribute(
        //     'img-src', banner[0].img);
    </script>
@endsection


</html>
