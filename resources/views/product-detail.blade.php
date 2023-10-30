@extends('layouts.app')
@section('content')
<div class="container-fluid mt-3">

    <div class="row">
        <div class="col-12 col-md-8">
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

                </div>
                <button class="btn btn-secondary control-center control-carousel" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-secondary control-center control-carousel" type="button"
                    data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </button>


            </div>

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
                <div class="price normal-text fs-2">
                    <span>USD 95,00</span>
                </div>
            </div>
            <div class="row product-attributes">
                <div class="row" data-attr="current-color">

                    <span>Color: BLUE</span>
                    <div class="color-attribute d-flex">

                    </div>
                    <div class="size-attribute d-flex justify-content-start mt-">

                    </div>


                    <div class="form-outline quantity-attribute mt-3 quantity-input input-group normal-text fs-4">
                        <button class="btn btn-outline-secondary decrease" type="button">-</button>
                        <input type="text" id="typeNumber" class="form-control text-center" min="1" value="1" />
                        <button class="btn btn-outline-secondary increase" type="button">+</button>
                        {{-- <label class="form-label" for="typeNumber">Number input</label> --}}
                    </div>

                    <div class="invalid-feedback p-0"></div>
                    {{-- <button class="btn btn-dark p-2">Add to cart</button> --}}
                </div>
            </div>

        </div>
    </div>
    <div class="row-description">
        <h1 class="normal-text fs-1">Description</h1>
        <p>Non occaecat incididunt minim et reprehenderit mollit est aliquip pariatur proident velit sint et anim. Ut
            reprehenderit
            reprehenderit dolore occaecat. Esse tempor velit cillum elit labore deserunt irure. Elit laborum id
            consectetur Lorem
            cillum cupidatat sit eu proident exercitation excepteur est minim.</p>

    </div>
</div>
<script>
    // const data = {
        //     product: {
        //         name: 'Shelter 1/2 Zip Butter Blend™ Pullover',
        //         price: 95000,



        //         details: [
        //             {
        //                 color: 'BLACK',
        //                 images: ["imgs/Men_product/10066.jpg", "imgs/Men_product/10067.jpg"],
        //                 size: {
        //                     M: {
        //                         quantity: 10,
        //                         offset: 0,
        //                     },
        //                     L: {
        //                         quantity:5,
        //                         offset: 10,
        //                     },
        //                     XL: {
        //                         quantity:10,
        //                         offset: 0,
        //                     },
        //                 }
        //             },
        //             {
        //                 color: 'WHITE',
        //                 images:["imgs/Men_product/10062.jpg","imgs/Men_product/10062.jpg","imgs/Men_product/10063.jpg"],
        //                 size:{
        //                     M:{
        //                         quantity:0,
        //                         offset: 0,
        //                     }
        //                 }
        //             },
        //             {
        //                 color: 'GRAY',
        //                 images:["imgs/Men_product/10061.jpg","imgs/Men_product/10060.jpg","imgs/Men_product/10060.jpg"],
        //                 size:{
        //                     M:{
        //                         quantity:1,
        //                         offset: 0,
        //                     }
        //                 }
        //             }
        //         ]
        //     }
        // }

        var PRODUCT_DETAIL = {}

        const data = {
            "productId": 1,
            "name": "Shelter 1/2 Zip Butter Blend™ Pullover",
            "type": "short",
            "price": 95000,
            "description": null,
            "spec": null,
            "salePercent": 0,
            "product_detail": [{

                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10066.jpg", "imgs/Men_product/10067.jpg"],
                    "size": "M",
                    "color": "BLACK",
                    "stock": 4,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                },
                {
                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10066.jpg", "imgs/Men_product/10067.jpg"],
                    "size": "L",
                    "color": "BLACK",
                    "stock": 5,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                },
                {
                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10061.jpg", "imgs/Men_product/10060.jpg"],
                    "size": "M",
                    "color": "GRAY",
                    "stock": 7,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                },
                {
                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10061.jpg", "imgs/Men_product/10060.jpg"],
                    "size": "L",
                    "color": "GRAY",
                    "stock": 0,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                },
                {
                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10061.jpg", "imgs/Men_product/10060.jpg"],
                    "size": "XL",
                    "color": "GRAY",
                    "stock": 8,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                },
                {
                    "productDetailId": 1,
                    "productId": 1,
                    "img": ["imgs/Men_product/10062.jpg", "imgs/Men_product/10063.jpg"],
                    "size": "L",
                    "color": "WHITE",
                    "stock": 9,
                    "created_at": "2023-10-14T09:15:23.00000oZ",
                    "updated_at": "2023-10-14T09:15:23.00000oz",
                }
            ]
        }
        
        function dataParser(data) {
            data.forEach((d) => {
                if (!PRODUCT_DETAIL[d.color]) {
                    PRODUCT_DETAIL[d.color] = {
                        size: {}
                    }
                    
                }
                if (!PRODUCT_DETAIL[d.color]['size'][d.size]) {
                    PRODUCT_DETAIL[d.color]['size'][d.size] = {
                        stock: d.stock,
                    }
                }
                if (!PRODUCT_DETAIL[d.color].images) {
                    PRODUCT_DETAIL[d.color].images = d.img
                }
            })
        }
        dataParser(data.product_detail)
        function RenderSize(color) {
            document.querySelector('.size-attribute').innerHTML = ''
            for (i in PRODUCT_DETAIL[color]['size']) {
                let input = document.createElement('input')
                input.setAttribute('type', 'radio')
                input.className = 'btn-check'
                input.setAttribute('name', 'size-options')
                input.setAttribute('id', `size-option-${i}`)
                input.setAttribute('autocomplete', 'off')
                if(!PRODUCT_DETAIL[color]['size'][i]['stock']){
                    input.setAttribute('disabled','')
                }
                if(!i){
                    input.setAttribute('checked', '')
                }
                let label = document.createElement('label')
                label.setAttribute('for', `size-option-${i}`)
                label.className = 'btn btn-secondary px-3 py-2 m-2'
                label.innerHTML = `${i}`
                document.querySelector('.size-attribute').appendChild(input)
                document.querySelector('.size-attribute').appendChild(label)
            }


        }
        
        
        function QuantityChangeHandler() {
            const $qInput = document.querySelector('.quantity-attribute input')
            const color = document.querySelector('.color-attribute input:checked').getAttribute('color')
            if(document.querySelector('.size-attribute input:checked')){
                size = document.querySelector('.size-attribute input:checked').id.replace('size-option-', '')
            }
            else{
                size = ''
            }
            
            const quantity = parseInt($qInput.value)
            for (i in PRODUCT_DETAIL){
                if(i==color){
                    for(j in PRODUCT_DETAIL[i].size){
                        if(j == size){

                            var instock = PRODUCT_DETAIL[i].size[j].stock
                            console.log(instock)
                        }
                        
                    }
                }
            }

            const $invalidFeedback = $qInput.parentElement.parentElement.querySelector('.invalid-feedback')
            // console.log($invalidFeedback)
            if(size==''){
                console.log('hello')
                $invalidFeedback.innerHTML = 'Please choose a size'
                $invalidFeedback.style.display = 'block'
                $qInput.value = 1
            }
            else if($qInput.value > instock){
                $invalidFeedback.innerHTML = `We only have ${instock} in stock`
                $invalidFeedback.style.display = 'block'
                $qInput.value = instock
            }
            else if($qInput.value < 1){
                $invalidFeedback.innerHTML = `Quantity must be greater than 0`
                $invalidFeedback.style.display = 'block'
                $qInput.value = 1
            }
            else{
                $invalidFeedback.style.display = 'none'
            }
    }
        function createColorRadio() {
            var j = 0;
            for (i in PRODUCT_DETAIL) {
                let input = document.createElement('input')
                input.setAttribute('type', 'radio')
                input.className = 'btn-check'
                input.setAttribute('name', 'color-options')
                input.setAttribute('id', `color-option${j}`)
                input.setAttribute('autocomplete', 'off')
                input.setAttribute('color', i)
                if (!j) {
                    input.setAttribute('checked', '')
                    document.querySelector('.row [data-attr=current-color] span').innerText = `Color: ${i}`
                    renderCarousel(PRODUCT_DETAIL[i].images)
                    RenderSize(i)
                  
                }
                let label = document.createElement('label')
                label.setAttribute('for', `color-option${j}`)
                label.className = 'btn rounded-circle p-3 m-2'
                label.style.backgroundColor = input.getAttribute('color')
                document.querySelector('.color-attribute').appendChild(input)
                document.querySelector('.color-attribute').appendChild(label)
                input.addEventListener("click", () => {

                    document.querySelector('.row [data-attr=current-color] span').innerHTML =
                        `Color: ${input.getAttribute('color')}`
                    RenderSize(input.getAttribute('color'))
                    document.querySelectorAll('.carousel-item-img').forEach((item, k) => {
                      
                        var color = input.getAttribute('color')
                        if (!PRODUCT_DETAIL[color].images[k]) {
                            item.style.backgroundImage = `url({{ url('${PRODUCT_DETAIL[color].images[0]}') }})`
                            return
                        }
                        
                        item.style.backgroundImage = `url({{ url('${PRODUCT_DETAIL[color].images[k]}') }})`

                    })
                })
                j=j+1;
            }
        }
        setTimeout(() => {
            createColorRadio()
        }, 500);

        document.querySelector('.quantity-input input').addEventListener('input', QuantityChangeHandler)
        document.querySelector('.form-outline.quantity-input .increase').addEventListener('click', () => {
            const $qInput = document.querySelector('.quantity-attribute input')
            $qInput.value = parseInt($qInput.value) + 1
            QuantityChangeHandler()
        })
        document.querySelector('.form-outline.quantity-input .decrease').addEventListener('click', () => {
            const $qInput = document.querySelector('.quantity-attribute input')
            $qInput.value = parseInt($qInput.value) - 1
            QuantityChangeHandler()
        })
        document.querySelectorAll('.carousel-item').forEach(frame => {
            frame.backgroundColor = '#F6F6FB'
        })
        document.querySelectorAll('.carousel-item-img').forEach(image => {

        })
</script>
@endsection