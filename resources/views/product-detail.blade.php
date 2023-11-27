@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div id="carouselExampleRide" class="carousel slide product-slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
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

                        <span>Color: </span>
                        <div class="color-attribute d-flex">

                        </div>
                        <div class="size-attribute d-flex justify-content-start mt-">

                        </div>


                        <div class="form-outline quantity-attribute mt-3 quantity-input input-group normal-text fs-4">
                            <button class="btn btn-outline-secondary decrease" type="button">-</button>
                            <input type="text" id="typeNumber" class="form-control text-center" min="1"
                                value="1" />
                            <button class="btn btn-outline-secondary increase" type="button">+</button>

                        </div>

                        <div class="invalid-feedback p-0"></div>
                    </div>
                </div>
                <button class="btn btn-dark mt-3 p-1">Add to cart</button>
                <button class="btn btn-dark mt-3 p-1">Buy now</button>

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
        {{-- <img src="{{ url('imgs/Men_product/10029.jpg') }}" alt=""> --}}
        {{-- <div class="test" style="background-image: url('{{ url('imgs/Men_product/10010.jpg') }}')">

        </div> --}}
    </div>

    <script>
        // console.log(@json($product))
        // Get the product ID from the URL
        var IMAGE_SLIDER = []
        let PRODUCT_DETAIL = @json($product)



        function RenderSize(color) {
            document.querySelector('.size-attribute').innerHTML = ''
            let size = []
            for (i in PRODUCT_DETAIL) {
                if (PRODUCT_DETAIL[i]['color'] == color && !size.includes(PRODUCT_DETAIL[i]['size'])) {
                    size.push(PRODUCT_DETAIL[i]['size'])
                    let input = document.createElement('input')
                    input.setAttribute('type', 'radio')
                    input.className = 'btn-check'
                    input.setAttribute('name', 'size-options')
                    input.setAttribute('id', `size-option-${PRODUCT_DETAIL[i]['size']}`)
                    input.setAttribute('autocomplete', 'off')
                    input.setAttribute('size', PRODUCT_DETAIL[i]['size'])

                    if (!PRODUCT_DETAIL[i]['stock']) {
                        input.setAttribute('disabled', '')
                    }
                    if (!i) {
                        input.setAttribute('checked', '')
                    }
                    let label = document.createElement('label')
                    label.setAttribute('for', `size-option-${PRODUCT_DETAIL[i]['size']}`)
                    label.className = 'btn btn-secondary px-3 py-2 m-2'
                    label.innerHTML = `${PRODUCT_DETAIL[i]['size']}`
                    document.querySelector('.size-attribute').appendChild(input)
                    document.querySelector('.size-attribute').appendChild(label)
                }
            }


        }

        function renderCarousel(image = [], caption = [{}]) {

            console.log('rendering')
            // Select the carousel
            const carousel = document.querySelector('.carousel-inner');

            // Clear the carousel
            carousel.innerHTML = '';
            image.forEach((el, i) => {
                let carouselItem = document.createElement('div')
                carouselItem.className = 'carousel-item'
                carouselItem.style.backgroundColor = '#F6F6FB'
                carouselItem.style.textAlign = 'center'
                carouselItem.style.height = '70vh'
                carouselItem.style.width = '100%'
                let carouselItemImage = document.createElement('div')
                carouselItemImage.style.display = 'inline-block'
                carouselItemImage.style.position = 'absolute'
                carouselItemImage.style.top = '50%'
                carouselItemImage.style.left = '50%'
                carouselItemImage.style.transform = 'translate(-50%, -50%)'
                carouselItemImage.className = 'carousel-item-img'
                carouselItemImage.style.height = '500px'
                carouselItemImage.style.width = '500px'

                if (caption) {

                    let carouselCaption = document.createElement('div')
                    carouselCaption.className = 'carousel-caption d-none d-md-block'
                    let captionHeading = document.createElement('h2')
                    let captionParagraph = document.createElement('p')

                }
                carouselItem.appendChild(carouselItemImage)
                if (!i) carouselItem.classList.add('active')

                // console.log(el)

                carouselItemImage.setAttribute('img-src', el)
                carouselItemImage.style.backgroundImage = `url({{ asset('${el}') }})`
                carouselItemImage.style.mixBlendMode = 'multiply'
                document.querySelector('.carousel-inner').appendChild(carouselItem)
            })
        }


        function QuantityChangeHandler() {
            const $qInput = document.querySelector('.quantity-attribute input')
            const color = document.querySelector('.color-attribute input:checked').getAttribute('color')
            if (document.querySelector('.size-attribute input:checked')) {
                size = document.querySelector('.size-attribute input:checked').id.replace('size-option-', '')
            } else {
                size = ''
            }


            const quantity = parseInt($qInput.value)
            for (i in PRODUCT_DETAIL) {

                if (PRODUCT_DETAIL[i]['color'] == color && PRODUCT_DETAIL[i]['size'] == size) {
                    var instock = PRODUCT_DETAIL[i]['stock']
                    // console.log(instock)
                }
            }
            const $invalidFeedback = $qInput.parentElement.parentElement.querySelector('.invalid-feedback')

            if (size == '') {
                // console.log('hello')
                $invalidFeedback.innerHTML = 'Please choose a size'
                $invalidFeedback.style.display = 'block'
                $qInput.value = 1
            } else if ($qInput.value > instock) {
                $invalidFeedback.innerHTML = `We only have ${instock} in stock`
                $invalidFeedback.style.display = 'block'
                $qInput.value = instock
            } else if ($qInput.value < 1) {
                $invalidFeedback.innerHTML = `Quantity must be greater than 0`
                $invalidFeedback.style.display = 'block'
                $qInput.value = 1
            } else {
                $invalidFeedback.style.display = 'none'
            }
        }

        function createColorRadio() {
            var j = 0;
            var color = []
            console.log(PRODUCT_DETAIL)
            for (i in PRODUCT_DETAIL) {
                if (!color.includes(PRODUCT_DETAIL[i]['color'].toUpperCase())) {
                    color.push(PRODUCT_DETAIL[i]['color'].toUpperCase())
                    let input = document.createElement('input')
                    input.setAttribute('type', 'radio')
                    input.className = 'btn-check'
                    input.setAttribute('name', 'color-options')
                    input.setAttribute('id', `color-option${j}`)
                    input.setAttribute('autocomplete', 'off')
                    input.setAttribute('color', PRODUCT_DETAIL[i]['color'])

                    if (!j) {
                        input.setAttribute('checked', '')
                        document.querySelector('.row [data-attr=current-color] span').innerText =
                            `Color: ${PRODUCT_DETAIL[i]['color']}`
                        for (k in PRODUCT_DETAIL) {

                            if (PRODUCT_DETAIL[k]['color'].toUpperCase() == PRODUCT_DETAIL[i]['color'].toUpperCase()) {
                                IMAGE_SLIDER = PRODUCT_DETAIL[k]['img']

                                console.log(IMAGE_SLIDER)
                            }
                        }

                        renderCarousel(IMAGE_SLIDER)
                        RenderSize(PRODUCT_DETAIL[i]['color'].toUpperCase())
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
                            for (k in PRODUCT_DETAIL) {
                                if (PRODUCT_DETAIL[k]['color'] == input.getAttribute('color')) {
                                    IMAGE_SLIDER = PRODUCT_DETAIL[k]['img']
                                    console.log(IMAGE_SLIDER)
                                }
                            }
                            // console.log(IMAGE_SLIDER)
                            renderCarousel(IMAGE_SLIDER)
                            var color = input.getAttribute('color')
                            // if (!PRODUCT_DETAIL[i]['img'][k]) {
                            //     item.style.backgroundImage =
                            //         `url({{ url('${PRODUCT_DETAIL[i][`img`][k]}') }})`
                            //     return
                            // }
                        })
                    })
                }

                j = j + 1;

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
