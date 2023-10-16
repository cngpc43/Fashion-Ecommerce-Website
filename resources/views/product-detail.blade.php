@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-12 col-md-8">
            {{-- <div class="row justify-content-center"> --}}
                <div id="carouselExampleRide" class="carousel slide product-slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner banner">
                        {{-- <div class="carousel-item">
                            <div class="carousel-item-img" img-src="{{ url('imgs/10007.jpg') }}"></div>

                        </div>
                        <div class="carousel-item">
                            <div class="carousel-item-img" img-src="{{ url('imgs/10004.jpg') }}"></div>


                        </div>
                        <div class="carousel-item active">

                            <div class="carousel-item-img" img-src="{{ url('imgs/10001.jpg') }}"></div>

                        </div> --}}
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
                {{--
            </div> --}}
        </div>
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col">

                    <h1 class="product-name normal-text fs-1">
                        Shelter 1/2 Zip Butter Blend™ Pullover
                    </h1>
                    {{-- RATING --}}
                </div>

            </div>
            <div class="row">
                <div class="price">
                    <span>USD 95,00</span>
                </div>
            </div>
            <div class="row product-attributes">
                <div class="row" data-attr="color">

                    <span>Color: BLUE</span>
                    <div class="color-attribute d-flex">
                        {{--
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                        <label class="btn rounded-circle p-3 m-2" for="option1"></label>

                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn rounded-circle p-3 m-2" for="option2"></label>

                        <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                        <label class="btn rounded-circle p-3 m-2" for="option3"></label> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const data = {
        product: {
            name: 'Shelter 1/2 Zip Butter Blend™ Pullover',
            price: 95000,
            details: [
                {
                    color: 'black',
                    images: ["imgs/Men_product/10066.jpg", "imgs/Men_product/10067.jpg"],
                    size: {
                        M: {
                            quantity: 10,
                            offset: 0,
                        },
                        L: {
                            quantity:5,
                            offset: 10,
                        },
                        XL: {
                            quantity:10,
                            offset: 0,
                        },
                    }
                },
                {
                    color: 'white',
                    images:["https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg","https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg","https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg"],
                    size:{
                        M:{
                            quantity:4,
                            offset: 0,
                        }
                    }
                },
                {
                    color: 'red',
                    images:["https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg","https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg","https://media.loropiana.com/HYBRIS/FAF/FAF6128/9DB87B48-C051-40E1-8484-D80E73B5D2DA/FAF6128_1005_MEDIUM.jpg"],
                    size:{
                        M:{
                            quantity:4,
                            offset: 0,
                        }
                    }
                }
            ]
        }
    }

    
    
    // console.log(document.querySelector('.color-attribute'))
    // console.log(data.product)
    setTimeout(() => {
        
        function createRadio(){
            // console.log('ciao')
            // var colors = []
            data.product.details.forEach((el, i)=>{
                    let input = document.createElement('input')
                    input.setAttribute('type', 'radio')
                    input.className = 'btn-check'
                    input.setAttribute('name', 'options')
                    input.setAttribute('id', `option${i}`)
                    input.setAttribute('autocomplete', 'off')
                    input.setAttribute('color', el.color)
                    if(!i) {

                        input.setAttribute('checked', '')
                        renderCarousel(el.images)
                    }
                    
                    
                    let label = document.createElement('label')
                    label.setAttribute('for', `option${i}`)
                    label.className = 'btn rounded-circle p-3 m-2'
                    
                    label.style.backgroundColor = el.color
                    document.querySelector('.color-attribute').appendChild(input)
                    document.querySelector('.color-attribute').appendChild(label)
                  input.addEventListener("click", ()=>{
                    console.log('dit')
                    document.querySelectorAll('.carousel-item-img').forEach((item,k)=>{
                        item.style.backgroundImage = `url({{ url('${el.images[k]}') }})`
                        // renderCarousel(item)
                        // item.setAttribute('img-src',el.images[k])
                    })
                    })
                } )}
                createRadio();
        }, 500);
</script>
@endsection