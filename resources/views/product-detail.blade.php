@extends('layouts.app')
@section('title', $product[0]['name'])
@section('content')
    {{-- <div class="spinner-wrapper d-flex justify-content-center align-items-center">

        <div class="spinner-border" role="status" id="spinner">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> --}}
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

                        <h1 class="product-name normal-text fs-1">{{ $product[0]['name'] }}</h1>
                        {{-- RATING --}}
                    </div>

                </div>
                <div class="row">
                    <div class="price normal-text fs-2">
                        <span>USD {{ $product[0]['price'] }},00</span>
                    </div>
                </div>
                <div class="row product-attributes">
                    <div class="row" data-attr="current-color">

                        <span>Color: </span>
                        <div class="color-attribute d-flex">

                        </div>
                        <div class="size-attribute d-flex justify-content-start mt-">

                        </div>


                        <div class="form-outline quantity-attribute mt-3 quantity-input input-group normal-text fs-4 ms-3">
                            <button class="btn btn-outline-secondary decrease" type="button">-</button>
                            <input type="text" id="typeNumber" class="form-control text-center" min="1"
                                value="1" />
                            <button class="btn btn-outline-secondary increase" type="button">+</button>
                        </div>

                        <div class="invalid-feedback p-0"></div>
                    </div>
                </div>

                {{-- </form> --}}

                <form class="ms-1" id="add-to-cart-form" action="{{ route('api.add-to-cart') }}" method="POST">

                    <input type="hidden" name="id">
                    <button style="width: 150px; height: 40px;" type="submit" class="btn btn-dark mt-3 p-1 add-to-cart">
                        Add to cart
                    </button>

                </form>

            </div>
        </div>
        <div class="row row-description py-5 ps-lg-5 ps-0">
            <div class="col-lg-7 col-md-12 col-12">
                <h1 class="normal-text fs-1">Description</h1>
                <p>{{ $product[0]['description'] }}</p>
                <p>Non occaecat incididunt minim et reprehenderit mollit est aliquip pariatur proident velit sint et anim.
                    Ut
                    reprehenderit
                    reprehenderit dolore occaecat. Esse tempor velit cillum elit labore deserunt irure. Elit laborum id
                    consectetur Lorem
                    cillum cupidatat sit eu proident exercitation excepteur est minim.</p>
            </div>
        </div>

    </div>

    <script>
        let urlParams = new URLSearchParams(window.location.search);
        // var detailID = urlParams.get('detailID');
        let PRODUCT_DETAIL = @json($product);
        let productId = window.location.pathname.split('/').pop();
        // document.querySelector('.price span').innerHTML = `USD ${PRODUCT_DETAIL[0]['price']},00`
        // document.querySelector('.product-name').innerHTML = PRODUCT_DETAIL[0]['name']
        document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
            event.preventDefault();
            let detailId = document.querySelector('.size-attribute input:checked').getAttribute('target-detail-id');
            let quantity = parseInt(document.querySelector('.quantity-attribute input').value);
            let price = document.querySelector('.price span').innerHTML;
            let name = document.querySelector('.product-name').innerText;
            let image = document.querySelector('.carousel-item-img').getAttribute('img-src');
            let color = document.querySelector('.color-attribute input:checked').getAttribute('color')
            let size = document.querySelector('.size-attribute input:checked').getAttribute('size')
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            } else {
                console.error('CSRF token not found');
            }

            @if (Auth::check())
                axios.post('{{ route('api.add-to-cart') }}', {
                        userId: {{ Auth::user()->id }},
                        detailId: detailId,
                        quantity: quantity,
                        price: price,
                        name: name,
                        image: image,
                        color: color,
                        size: size
                    })
                    .then(function(response) {
                        // Handle the response

                        RenderCustomerCart();
                        RenderCartQuantity();
                        if (response.status === 200) {
                            var alertSuccess = document.querySelector('.alert-success')
                            alertSuccess.innerHTML = response.data.Message
                            alertSuccess.classList.remove('visually-hidden');
                            setTimeout(function() {
                                alertSuccess.classList.add('visually-hidden');
                            }, 2000);
                        } else {
                            var alertDanger = document.querySelector('.alert-danger')
                            alertDanger.innerHTML = response.data.Message
                            alertDanger.classList.remove('visually-hidden');

                            setTimeout(function() {
                                alertDanger.classList.add('visually-hidden');
                            }, 2000);
                        }
                        console.log(response);
                    })
                    .catch(function(error) {
                        // Handle the error
                        console.log(error);
                    });
            @else

                // User is not authenticated, add the item to the cart in localStorage
                detailId = document.querySelector('.size-attribute input:checked').getAttribute('target-detail-id');
                console.log(detailId)
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                let existingItem = cart.find(item => item.detailId === detailId);
                // let detailId = detailID;
                if (existingItem) {
                    for (i in PRODUCT_DETAIL) {
                        if (PRODUCT_DETAIL[i]['productDetailId'] == detailId) {
                            var stock = PRODUCT_DETAIL[i]['stock']
                        }
                    }
                    if (existingItem.quantity + quantity > stock) {
                        alert('Cannot add more items than available in stock');
                        return;
                    }
                    existingItem.quantity += quantity;
                } else {
                    cart.push({
                        detailId: detailId,
                        quantity: quantity,
                        price: price,
                        name: name,
                        image: image,
                        color: color,
                        size: size
                    });
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                RenderCartItems(cart);
                RenderCartQuantity();
            @endif
        });

        function RenderSize(color) {

            const selectedColor = document.querySelector('.color-attribute input:checked').getAttribute('color')
            document.querySelector('.size-attribute').innerHTML = ''
            let size = []
            for (i in PRODUCT_DETAIL) {

                if (PRODUCT_DETAIL[i]['color'] == color && !size.includes(PRODUCT_DETAIL[i]['size'])) {
                    size.push(PRODUCT_DETAIL[i]['size'])
                    size.sort(function(a, b) {
                        var sizeOrder = ["Freesize", "S", "M", "L", "XL", "XXL"];
                        return sizeOrder.indexOf(a) - sizeOrder.indexOf(b);
                    });
                }

            }
            let j = 0;
            for (i in size) {
                let input = document.createElement('input')
                input.setAttribute('type', 'radio')
                input.className = 'btn-check'
                input.setAttribute('name', 'size-options')
                input.setAttribute('id', `size-option-${size[i]}`)
                input.setAttribute('autocomplete', 'off')
                input.setAttribute('size', size[i])
                for (let i in PRODUCT_DETAIL) {

                    if (PRODUCT_DETAIL[i]['color'] == selectedColor && PRODUCT_DETAIL[i]['size'] == input
                        .getAttribute('size')) {
                        detailID = PRODUCT_DETAIL[i]['productDetailId']
                        console.log(detailID)
                        input.setAttribute('target-detail-id', detailID)
                    }

                }
                input.addEventListener('click', () => {
                    var detailID = null;
                    const selectedColor = document.querySelector('.color-attribute input:checked').getAttribute(
                        'color')

                    for (i in PRODUCT_DETAIL) {

                        if (PRODUCT_DETAIL[i]['color'] == selectedColor && PRODUCT_DETAIL[i]['size'] == input
                            .getAttribute('size')) {
                            detailID = PRODUCT_DETAIL[i]['productDetailId']
                            console.log(detailID)
                            const params = new URLSearchParams(window.location.search);
                            params.set('detailID', detailID);
                            window.history.replaceState({}, '', `${window.location.pathname}?${params}`);
                            console.log(detailID)
                            input.setAttribute('target-detail-id', detailID)
                        }

                    }
                })
                if (!PRODUCT_DETAIL[i]['stock']) {
                    input.setAttribute('disabled', '')
                }
                let label = document.createElement('label')
                label.setAttribute('for', `size-option-${size[i]}`)
                label.className = 'btn btn-secondary px-3 py-2 m-2'
                label.innerHTML = `${size[i]}`
                document.querySelector('.size-attribute').appendChild(input)
                document.querySelector('.size-attribute').appendChild(label)

            }

            // Checked the first size option
            document.querySelector('.size-attribute input').setAttribute('checked', '')

            return size;
        }


        function renderCarousel(image = [], caption = [{}]) {

            console.log('rendering')
            // Select the carousel
            const carousel = document.querySelector('.carousel-inner');

            // Clear the carousel
            carousel.innerHTML = '';
            image.forEach((imgPath, i) => {
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
                carouselItemImage.setAttribute('img-src', imgPath)
                carouselItemImage.style.mixBlendMode = 'multiply'

                if (i === 0) carouselItem.classList.add('active')
                if (caption) {

                    let carouselCaption = document.createElement('div')
                    carouselCaption.className = 'carousel-caption d-none d-md-block'
                    let captionHeading = document.createElement('h2')
                    let captionParagraph = document.createElement('p')

                }

                setTimeout(() => {
                    carouselItemImage.style.backgroundImage = `url(/${imgPath})`
                }, 10);

                carouselItem.appendChild(carouselItemImage)
                document.querySelector('.carousel-inner').appendChild(carouselItem)
            })
        }
        var temp = 0;



        function QuantityChangeHandler() {
            const $qInput = document.querySelector('.quantity-attribute input')
            const color = document.querySelector('.color-attribute input:checked').getAttribute('color')
            let size = document.querySelector('.size-attribute input:checked').getAttribute('size')
            if (document.querySelector('.size-attribute input:checked')) {
                size = document.querySelector('.size-attribute input:checked').id.replace('size-option-', '')
            } else {
                size = ''
            }


            const quantity = parseInt($qInput.value)
            for (i in PRODUCT_DETAIL) {

                if (PRODUCT_DETAIL[i]['color'] == color && PRODUCT_DETAIL[i]['size'] == size) {

                    var instock = PRODUCT_DETAIL[i]['stock']
                    temp = instock
                }
            }
            const $invalidFeedback = $qInput.parentElement.parentElement.querySelector('.invalid-feedback')

            if (size == '') {
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
            for (i in PRODUCT_DETAIL) {
                if (!color.includes(PRODUCT_DETAIL[i]['color'].toUpperCase())) {

                    color.push(PRODUCT_DETAIL[i]['color'].toUpperCase())
                    let input = document.createElement('input');
                    input.setAttribute('type', 'radio');
                    input.className = 'btn-check';
                    input.setAttribute('name', 'color-options');
                    input.setAttribute('id', `color-option${j}`);
                    input.setAttribute('autocomplete', 'off');
                    input.setAttribute('color', PRODUCT_DETAIL[i]['color']);
                    let label = document.createElement('label');
                    label.setAttribute('for', `color-option${j}`);
                    label.className = 'btn rounded-circle p-3 m-2';
                    label.style.backgroundColor = input.getAttribute('color');
                    document.querySelector('.color-attribute').appendChild(input);
                    document.querySelector('.color-attribute').appendChild(label);
                    input.addEventListener("click", () => {

                        document.querySelector('.row [data-attr=current-color] span').innerHTML =
                            `Color: ${input.getAttribute('color').toUpperCase()}`
                        RenderSize(input.getAttribute('color'))
                        document.querySelectorAll('.carousel-item-img').forEach((item, k) => {
                            for (k in PRODUCT_DETAIL) {
                                if (PRODUCT_DETAIL[k]['color'] == input.getAttribute('color')) {
                                    IMAGE_SLIDER = PRODUCT_DETAIL[k]['img']
                                }
                            }
                            renderCarousel(IMAGE_SLIDER)

                        })
                    })
                }
                const input = document.querySelector(`.color-attribute input[color="${PRODUCT_DETAIL[i]['color']}"]`)
                if (urlParams.get('detailID') === null && !j) {
                    input.setAttribute('checked', '')
                    document.querySelector('.row [data-attr=current-color] span').innerText =
                        `Color: ${PRODUCT_DETAIL[i]['color'].toUpperCase()}`
                    for (k in PRODUCT_DETAIL) {

                        if (PRODUCT_DETAIL[k]['color'].toUpperCase() == PRODUCT_DETAIL[i]['color'].toUpperCase()) {
                            IMAGE_SLIDER = PRODUCT_DETAIL[k]['img']
                        }
                    }

                    renderCarousel(IMAGE_SLIDER)
                    RenderSize(PRODUCT_DETAIL[i]['color'])

                } else {

                    if (PRODUCT_DETAIL[i]['productDetailId'] == parseInt(urlParams.get('detailID'))) {
                        // console.log('checked')
                        // input.setAttribute('target-detail-id', parseInt(urlParams.get('detailID')))
                        // input.setAttribute('test', 'test')
                        input.setAttribute('checked', '')
                        document.querySelector('.row [data-attr=current-color] span').innerText =
                            `Color: ${PRODUCT_DETAIL[i]['color'].toUpperCase()}`
                        for (k in PRODUCT_DETAIL) {

                            if (PRODUCT_DETAIL[k]['color'].toUpperCase() == PRODUCT_DETAIL[i]['color'].toUpperCase()) {
                                IMAGE_SLIDER = PRODUCT_DETAIL[k]['img']
                            }
                        }

                        renderCarousel(IMAGE_SLIDER)
                        RenderSize(PRODUCT_DETAIL[i]['color'])
                    }
                }
                input.addEventListener('click', function() {
                    // Get the selected color
                    var detailID = null;
                    let color = input.getAttribute('color');
                    let sizes = RenderSize(color)
                    // Find the smallest size for the selected color

                    let smallestSizeDetail = sizes[0];

                    for (i in PRODUCT_DETAIL) {
                        if (PRODUCT_DETAIL[i]['color'] == color && PRODUCT_DETAIL[i]['size'] ==
                            smallestSizeDetail) {
                            detailID = PRODUCT_DETAIL[i]['productDetailId']
                            console.log(detailID)
                        }
                    }

                    // console.log(detailID)
                    // event.preventDefault();

                    // // Show the Bootstrap spinner
                    // let spinner = document.querySelector('#spinner');
                    // spinner.style.display = 'block';
                    // Update the detailID in the URL
                    window.location.href = '/product-detail/' + productId +
                        '?detailID=' + detailID;
                    // input.setAttribute('checked', '')

                });
                j = j + 1;
            }

        }

        setTimeout(() => {
            createColorRadio()
        }, 100);
        document.querySelector('.form-outline.quantity-input .decrease').addEventListener('click', () => {
            const $qInput = document.querySelector('.quantity-attribute input')
            $qInput.value = parseInt($qInput.value) - 1
            QuantityChangeHandler()
        })
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
        // document.querySelector
        document.querySelectorAll('.carousel-item').forEach(frame => {
            frame.backgroundColor = '#F6F6FB'
        })
        document.querySelectorAll('.carousel-item-img').forEach(image => {

        })

        setTimeout(() => {
            document.querySelectorAll('.size-attribute input').forEach(a => {

                for (i in PRODUCT_DETAIL) {
                    if (PRODUCT_DETAIL[i]['productDetailId'] == urlParams.get('detailID')) {
                        if (a.getAttribute('size') == PRODUCT_DETAIL[i]['size']) {
                            a.setAttribute('checked', '')
                        }
                    }
                }
            })
        }, 100);
    </script>
@endsection
