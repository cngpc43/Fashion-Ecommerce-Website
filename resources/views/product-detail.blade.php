@extends('layouts.app')
@section('content')
<div class="container-fluid mt-3">

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

                    </div>
                    <button class="btn btn-secondary control-center control-carousel" type="button"
                        data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-secondary control-center control-carousel" type="button"
                        data-bs-target="#carouselExampleRide" data-bs-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="prev">
                        <span aria-hidden="true"><i class="fas fa-arrow-left fa-lg"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="next">
                        <span aria-hidden="true"><i class="fas fa-arrow-right fa-lg"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}

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
                <div class="price normal-text fs-2">
                    <span>USD 95,00</span>
                </div>
            </div>
            <div class="row product-attributes">
                <div class="row" data-attr="current-color">

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
                    <div class="size-attribute d-flex justify-content-start mt-">
                        {{-- <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off"
                            checked>
                        <label class="btn rounded-circle p-3 m-2" for="option1"><button type="button"
                                class="btn btn-secondary">M</button></label>
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn rounded-circle p-3 m-2" for="option1"><button type="button"
                                class="btn btn-secondary">L</button></label>
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn rounded-circle p-3 m-2" for="option1"><button type="button"
                                class="btn btn-secondary">XL</button></label> --}}


                        {{-- <button type="button" class="btn btn-dark">Dark</button> --}}
                    </div>

                    <div class="form-outline quantity-attribute mt-3 quantity-input input-group normal-text fs-4">
                        <button class="btn btn-outline-secondary decrease" type="button">-</button>
                        <input type="text" id="typeNumber" class="form-control text-center" min="1" value="1" />
                        <button class="btn btn-outline-secondary increase" type="button">+</button>
                        {{-- <label class="form-label" for="typeNumber">Number input</label> --}}
                    </div>
                    <div class="invalid-feedback p-0"></div>
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
                    color: 'BLACK',
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
                    color: 'WHITE',
                    images:["imgs/Men_product/10062.jpg","imgs/Men_product/10062.jpg","imgs/Men_product/10063.jpg"],
                    size:{
                        M:{
                            quantity:0,
                            offset: 0,
                        }
                    }
                },
                {
                    color: 'GRAY',
                    images:["imgs/Men_product/10061.jpg","imgs/Men_product/10060.jpg","imgs/Men_product/10060.jpg"],
                    size:{
                        M:{
                            quantity:1,
                            offset: 0,
                        }
                    }
                }
            ]
        }
    }
    function RenderSize(color){
        document.querySelector('.size-attribute').innerHTML = ''
        data.product.details.forEach((el,i)=>{
            if(el.color == color){
                for (j in el.size){

                    let input = document.createElement('input')
                    input.setAttribute('type', 'radio')
                    input.className = 'btn-check'
                    input.setAttribute('name', 'size-options')
                    input.setAttribute('id', `size-option${j}`)
                    input.setAttribute('autocomplete', 'off')
                    if(j=='M') {
                        input.setAttribute('checked', '')
                    }
                    let label = document.createElement('label')
                    label.setAttribute('for', `size-option${j}`)
                    label.className = 'btn btn-secondary px-3 py-2 m-2'
                    label.innerHTML = `${j}`
                    document.querySelector('.size-attribute').appendChild(input)
                    document.querySelector('.size-attribute').appendChild(label)
                }
            }

        })

    }

    function QuantityChangeHandler() {
        const $qInput = document.querySelector('.quantity-attribute input')
        const color = document.querySelector('.color-attribute input:checked').getAttribute('color')
        const size = document.querySelector('.size-attribute input:checked').id.replace('size-option', '')
        const quantity = parseInt($qInput.value)
        const instock = data.product.details.find(el => el.color == color).size[size].quantity
        const $invalidFeedback = $qInput.parentElement.parentElement.querySelector('.invalid-feedback')
        if (quantity > instock) {
            $qInput.value = instock
            $qInput.classList.add('is-invalid')
            $invalidFeedback.innerText = `Quantity must be less than ${instock}`
            $invalidFeedback.style.display = 'block'
        } 
        else if(quantity < 1){
            $qInput.value = 1
            $qInput.classList.add('is-invalid')
            $invalidFeedback.innerText = `Quantity must be greater than 0`
            $invalidFeedback.style.display = 'block'
        }
        else {
            $qInput.classList.remove('is-invalid')
            $invalidFeedback.style.display = 'none'
        }
    }

    setTimeout(() => {
        
        function createRadio(){
            data.product.details.forEach((el, i)=>{
                    let input = document.createElement('input')
                    input.setAttribute('type', 'radio')
                    input.className = 'btn-check'
                    input.setAttribute('name', 'color-options')
                    input.setAttribute('id', `color-option${i}`)
                    input.setAttribute('autocomplete', 'off')
                    input.setAttribute('color', el.color)
                    if(!i) {
                        input.setAttribute('checked', '')
                        renderCarousel(el.images)
                        document.querySelector('.row [data-attr=current-color] span').innerText = `Color: ${el.color}`
                        RenderSize(el.color)
                    }
                    
                    let label = document.createElement('label')
                    label.setAttribute('for', `color-option${i}`)
                    label.className = 'btn rounded-circle p-3 m-2'
                    
                    label.style.backgroundColor = el.color
                
                    document.querySelector('.color-attribute').appendChild(input)
                    document.querySelector('.color-attribute').appendChild(label)

                    input.addEventListener("click", ()=>{
                
                        document.querySelector('.row [data-attr=current-color] span').innerHTML = `Color: ${input.getAttribute('color')}`
                        RenderSize(input.getAttribute('color'))
                        document.querySelectorAll('.carousel-item-img').forEach((item,k)=>{
                        item.style.backgroundImage = `url({{ url('${el.images[k]}') }})`
                        
                        document.querySelectorAll('.size-attribute input').forEach(input=>{
                                for(i in el.size){
                                    if(input.id == `size-option${i}`){
                                        if(el.size[i].quantity - document.querySelector('.quantity-attribute input').value < 0){
                                            input.setAttribute('disabled', '')
                                        }else{
                                            input.removeAttribute('disabled')
                                        }
                                    }
                                }
                        })
                    })
                    })
                } )}
                createRadio();
        }, 500);
        document.querySelector('.quantity-input input').addEventListener('input', QuantityChangeHandler)
        document.querySelector('.form-outline.quantity-input .increase').addEventListener('click', ()=>{
            const $qInput = document.querySelector('.quantity-attribute input')
            $qInput.value = parseInt($qInput.value) + 1
            QuantityChangeHandler()
        })
        document.querySelector('.form-outline.quantity-input .decrease').addEventListener('click', ()=>{
            const $qInput = document.querySelector('.quantity-attribute input')
            $qInput.value = parseInt($qInput.value) - 1
            QuantityChangeHandler()
        })
        document.querySelectorAll('.carousel-item').forEach(frame=>{
            frame.backgroundColor = '#F6F6FB'
        })
        document.querySelectorAll('.carousel-item-img').forEach(image=>{
            
        })
</script>
@endsection