<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>vl</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        <div class="carousel-item-img" img-src="{{ url('imgs/10007.jpg') }}"></div>
                        <div class="carousel-caption ">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-item-img" img-src="{{ url('imgs/10004.jpg') }}"></div>
                        {{-- <img src="{{ asset('imgs/10004.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                        <div class="carousel-caption d-md-block">
                            <h2>First slide label</h2>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        {{-- <img src="{{ asset('imgs/10001.jpg') }}" class="carousel-item-img d-none" alt="..."> --}}
                        <div class="carousel-item-img" img-src="{{ url('imgs/10001.jpg') }}"></div>
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
                                    <div class="p-4 h-100" img-src="{{ url($category->img) }}"></div>
                                    <p class="normal-text mt-2">{{ strtoupper($category->name) }}</p>

                                </div>
                            @endforeach
                            {{-- <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10099.jpg') }}"></div>
                            <p class="normal-text mt-2">SOCKS</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10100.jpg') }}"></div>
                            <p class="normal-text mt-2">UNDERWEAR</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10101.jpeg') }}"></div>
                            <p class="normal-text mt-2">APPAREL</p>
                        </div>
                        <div class="col">
                            <div class="p-4 h-100" img-src="{{ url('imgs/Men_product/10102.jpg') }}"></div>
                            <p class="normal-text mt-2">HATS & BEANIES</p>
                        </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row banner mt-5 mb-5 me-3 ms-3">
                {{-- <div class="col-12 col-lg-6 p-0">
                    <img src="{{ asset('imgs/WhiteQTR.jpg') }}" alt="" class="img-responsive">
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="d-flex h-100 align-items-center justify-content-center">
                        <div class="container">
                            <h5 class="text-center">
                                From the icon shop
                            </h5>
                            <p style="letter-spacing: -0.36px;" class="primary-text fs-1 text-center">
                                QUARTER HEIGHT
                            </p>
                            <div class="d-flex justify-content-center">
                                <a style="letter-spacing: 0.96px;" href="#"
                                    class="btn btn-dark px-lg-4 px-3 py-lg-2 py-1 primary-text fs-5 fw-bold">EXPLORE
                                    COLLECTION</a>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="container text-center my-3 product-slider" id="quarter height">
                {{-- <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel1" class="carousel slide multiple-image">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10003.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10004.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10005.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10006.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10007.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10009.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="container-fluid card-body">
                                            <div class="row product-detail">
                                                <div class="col">
                                                    <a href="">Socks 3 pack</a>
                                                </div>
                                                <div class="col">
                                                    <p>29,99usd</p>
                                                </div>
                                            </div>
                                        </div>
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
                </div> --}}
            </div>

            <div class="row banner mt-5 mb-5 me-3 ms-3">
                {{-- AMONGST THE STAR COLLECTION --}}
            </div>
            <div class="container text-center my-3 product-slider" id="amongst the star">
                {{-- <div class="row mx-auto my-auto justify-content-center">
                    <div id="CarouselCollection-2" class="carousel slide multiple-image">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10015.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10016.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10017.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10018.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 4</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10019.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 5</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ url('/imgs/Home/10019.jpg') }}" class="img-fluid">
                                        </div>
                                        <div class="card-img-overlay">Slide 6</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#CarouselCollection-2" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#CarouselCollection-2" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div> --}}
            </div>

        </div>

        <script>
            const data = {
                "category": [{
                        "name": "SOCKS",
                        "img": "imgs/Men_product/10099.jpg",
                    },
                    {
                        "name": "UNDERWEAR",
                        "img": "imgs/Men_product/10100.jpg",

                    },
                    {
                        "name": "APPAREL",
                        'img': "imgs/Men_product/10101.jpeg",
                    },
                    {
                        "name": "HATS & BEANIES",
                        "img": "imgs/Men_product/10102.jpg",
                    }
                ],
                "collection": [{
                        "intro": "From the icon shop",
                        "name": "QUARTER HEIGHT",
                        "img": "imgs/WhiteQTR.jpg",
                        "button-label": "EXPLORE COLLECTION"
                    },
                    {
                        "intro": "New Collaboration",
                        "name": "AMONGST THE STARS",
                        "img": "imgs/10049.png",
                        "description": "Stance is excited to be partnering with Bethesda Game Studios on Starfield, an exciting new next-generation rpg where you embark on a journey to answer humanity’s greatest mystery.",
                        "button-label": "SHOP NOW"
                    }
                ],
                "product": [{

                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10003.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",
                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10004.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",
                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10005.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",

                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10006.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",

                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10007.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",

                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10009.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",
                    },
                    {
                        "name": "Socks 3 pack",
                        "img": "imgs/Home/10015.jpg",
                        "price": "29,99usd",
                        "collection": "quarter height",
                    },
                    {
                        // "name"
                    }
                ]
            }
            document.querySelectorAll('.product-slider').forEach((slider, i) => {
                slider.appendChild(RenderProduct(data.product, slider.id, i));

            })
            @json($collection).forEach((element, i) => {

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
                // container.appendChild(row);
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
