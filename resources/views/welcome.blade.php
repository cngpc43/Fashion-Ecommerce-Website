<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
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
                        <div class="carousel-item-img"></div>
                        <div class="carousel-caption ">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-item-img"></div>
                        {{-- <img src="{{ asset('imgs/10004.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                        <div class="carousel-caption d-md-block">
                            <h2>First slide label</h2>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        {{-- <img src="{{ asset('imgs/10001.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                        <div class="carousel-item-img"></div>
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
                            @foreach ($categories as $category)
                                <div class="col">
                                    <div class="p-4 h-100" img-src="{{ url($category['img']) }}"></div>
                                    <p class="normal-text mt-2">{{ strtoupper($category->name) }}</p>

                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="row banner mt-5 mb-5 me-3 ms-3">
                {{-- QUARTER HEIGHT --}}
            </div>

            <div class="container text-center my-3 product-slider">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="Carousel-Collection-1" class="carousel slide multiple-image">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($first as $index => $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="col-md-3">
                                        <div class="card border-0">
                                            @foreach (json_decode($item->img) as $image)
                                                <div class="card-img">
                                                    <img src="{{ url($image) }}" class="img-fluid">
                                                </div>
                                            @endforeach
                                            <div class="container-fluid card-body">
                                                <div class="row product-detail">
                                                    <div class="col-8 name-col normal-text fs-5">
                                                        <a
                                                            href="{{ url('/product-detail/' . $item->productId) }}">{{ $item->name }}</a>
                                                    </div>
                                                    <div class="col-4 price-col normal-text fs-5 d-flex">
                                                        <p>{{ $item->price }}</p>
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

            <div class="row banner mt-5 mb-5 me-3 ms-3">
                {{-- AMONGST THE STAR COLLECTION --}}
            </div>
            <div class="container text-center my-3 product-slider">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="CarouselCollection-2" class="carousel slide multiple-image">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($second as $index => $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="col-md-3">
                                        <div class="card border-0">
                                            @foreach (json_decode($item->img) as $image)
                                                <div class="card-img">
                                                    <img src="{{ url($image) }}" class="img-fluid">
                                                </div>
                                            @endforeach
                                            <div class="container-fluid card-body">
                                                <div class="row product-detail">
                                                    <div class="col-8 name-col normal-text fs-5">
                                                        <a
                                                            href="{{ url('/product-detail/' . $item->productId) }}">{{ $item->name }}</a>
                                                    </div>
                                                    <div class="col-4 price-col normal-text fs-5 d-flex">
                                                        <p>{{ $item->price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-secondary control-center control-carousel" type="button"
                            data-bs-target="#CarouselCollection-2" data-bs-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-secondary control-center control-carousel" type="button"
                            data-bs-target="#CarouselCollection-2" data-bs-slide="next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script>
            var first = @json($first);
            var second = @json($second);
            console.log(first)
            console.log(second)
            const banner = @json($banner);

            document.querySelectorAll('.carousel-item-img').forEach((el,
                i) => {

                el.setAttribute('img-src', banner[i].img)
            })
            const collection = @json($collection);
            console.log(collection);
            collection.forEach((element, i) => {

                let banner = document.querySelectorAll('.row.banner');
                let col = document.createElement('div');
                col.classList.add('col-12', 'col-lg-6', 'p-0');
                let frame = document.createElement('div');
                frame.classList.add('banner-frame');
                let div = document.createElement('div');
                div.classList.add('sock-banner');
                div.setAttribute('style', `background-image: url(${element.img})`);
                col.appendChild(frame);
                frame.appendChild(div);

                let div2 = document.createElement('div');
                div2.classList.add('col-12', 'col-lg-6', 'p-0');
                let div3 = document.createElement('div');
                div3.classList.add('d-flex', 'h-100', 'align-items-center', 'justify-content-center');
                div2.appendChild(div3);
                let container = document.createElement('div');
                container.classList.add('container');
                div3.appendChild(container);
                let h5 = document.createElement('h5');
                h5.classList.add('text-center');
                h5.innerText = element.intro;
                container.appendChild(h5);
                let p = document.createElement('p');
                p.classList.add('primary-text', 'fs-1', 'text-center');
                p.setAttribute('style', 'letter-spacing: -0.36px;');
                p.innerText = element.name;
                container.appendChild(p);
                if (element.description) {
                    let p2 = document.createElement('p');
                    p2.classList.add('text-center', 'mb-3');
                    p2.innerText = element.description;
                    container.appendChild(p2);
                }
                let div4 = document.createElement('div');
                div4.classList.add('d-flex', 'justify-content-center');
                container.appendChild(div4);
                let a = document.createElement('a');
                a.classList.add('btn', 'btn-dark', 'px-lg-4', 'px-3', 'py-lg-2', 'py-1', 'primary-text', 'fs-5',
                    'fw-bold');
                a.setAttribute('style', 'letter-spacing: 0.96px;');
                a.setAttribute('href', '#');
                a.innerText = element['button-label'];
                div4.appendChild(a);
                banner[i].appendChild(col);
                banner[i].appendChild(div2);

            });


            function RenderProduct(data, condition, i) {
                let row = document.createElement('div');
                row.classList.add('row', 'mx-auto', 'my-auto', 'justify-content-center');
                let div = document.createElement('div');
                div.classList.add('carousel', 'slide', 'multiple-image');
                div.id = "recipeCarousel" + i;
                row.appendChild(div);
                let div2 = document.createElement('div');
                div2.classList.add('carousel-inner');
                div2.role = "listbox";
                div.appendChild(div2);
                data.forEach((el, i) => {
                    if (el.collection == condition) {
                        let div3 = document.createElement('div');
                        div3.classList.add('carousel-item');
                        if (i == 0) {
                            div3.classList.add('active');
                        }
                        let div4 = document.createElement('div');
                        div4.classList.add('col-md-3');
                        let div5 = document.createElement('div');
                        div5.classList.add('card', 'border-0');
                        let div6 = document.createElement('div');
                        div6.classList.add('card-img');
                        let img = document.createElement('img');
                        img.classList.add('img-fluid');
                        img.src = el.img;
                        div6.appendChild(img);
                        let div7 = document.createElement('div');
                        div7.classList.add('container-fluid', 'card-body');
                        let div8 = document.createElement('div');
                        div8.classList.add('row', 'product-detail');
                        let div9 = document.createElement('div');
                        div9.classList.add('col');
                        let a = document.createElement('a');
                        a.href = "#";
                        a.innerText = el.name;
                        div9.appendChild(a);
                        let div10 = document.createElement('div');
                        div10.classList.add('col');
                        let p = document.createElement('p');
                        p.innerText = el.price;
                        div10.appendChild(p);
                        div8.appendChild(div9);
                        div8.appendChild(div10);
                        div7.appendChild(div8);
                        div5.appendChild(div6);
                        div5.appendChild(div7);
                        div4.appendChild(div5);
                        div3.appendChild(div4);
                        div2.appendChild(div3);
                    }
                });
                let a = document.createElement('a');
                a.classList.add('carousel-control-prev', 'bg-transparent', 'w-aut');
                a.href = "#recipeCarousel" + i;
                a.role = "button";
                a.setAttribute('data-bs-slide', 'prev');
                let span = document.createElement('span');
                span.classList.add('carousel-control-prev-icon');
                span.setAttribute('aria-hidden', 'true');
                a.appendChild(span);
                div.appendChild(a);
                let a2 = document.createElement('a');
                a2.classList.add('carousel-control-next', 'bg-transparent', 'w-aut');
                a2.href = "#recipeCarousel" + i;
                a2.role = "button";
                a2.setAttribute('data-bs-slide', 'next');
                let span2 = document.createElement('span');
                span2.classList.add('carousel-control-next-icon');
                span2.setAttribute('aria-hidden', 'true');
                a2.appendChild(span2);
                div.appendChild(a2);
                return row;
            };
        </script>
    @endsection
</body>

</html>
