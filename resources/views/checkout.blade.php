@extends('layouts.app')
@section('content')
    <!-- Credit card form -->

    <section class="h-100">
        <div class="container h-100 py-3">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px; background-color: white">
                        <div class="card-body m-3 p-3 ">

                            @if ($address != null && $nonDefaultAddress != null)
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center">


                                        <h6 class="mb-3 normal-text fs-2 mt-3 me-3">My addresses</h6>
                                        <i data-bs-toggle="modal" data-bs-target="#createAddress"
                                            class="far fa-map-marker-plus fs-3"></i>
                                    </div>
                                    <div class="col-6 d-flex align-items-stretch">
                                        <div class="card addresses-item mb-4 shadow-sm w-100" address="{{ $address->id }}">
                                            <div class="default-address p-3">
                                                <div class="media">
                                                    <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="fw-bolder">Default</p>

                                                            </div>
                                                            <div class="col-2 text-end">

                                                            </div>
                                                        </div>
                                                        <p class="mb-1">{{ $address->receiver }}
                                                            {{ $address->phone }}</p>
                                                        <p class="mb-1">{{ $address->street }},
                                                            {{ $address->ward }}</p>
                                                        <p>
                                                            {{ $address->city }},
                                                            {{ $address->state }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-items-stretch" data-bs-toggle="modal"
                                        data-bs-target="#more-addresses">
                                        <div class="bg-white card addresses-item mb-4 shadow-sm w-100">
                                            <div
                                                class="other-address p-3 d-flex justify-content-center align-items-center h-100">
                                                <div class="media">
                                                    <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i>
                                                    </div>
                                                    <div class="media-body d-flex flex-column align-items-center">
                                                        <p class="other-address-quantity m-2">
                                                            {{ $nonDefaultAddress->count() }} address more
                                                        </p>

                                                        <p>
                                                            <i class="fal fa-info-circle fs-3"></i>
                                                        </p>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Modal for more addresses --}}
                                <div class="modal fade" id="more-addresses" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">More</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body position-relative other-address-information">
                                                <div class="row gutters">

                                                    @foreach ($nonDefaultAddress as $address)
                                                        <div class="col-6 d-flex align-items-stretch">
                                                            <div class="card addresses-item mb-4 shadow-sm w-100 other-address-item"
                                                                address="{{ $address->id }}" type="modal-item">
                                                                <div class="default-address p-3">
                                                                    <div class="media">
                                                                        <div class="mr-3"><i
                                                                                class="icofont-briefcase icofont-3x"></i>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <div class="row">
                                                                                <div class="col-10">
                                                                                </div>
                                                                                <div class="col-2 text-end">

                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-1">
                                                                                {{ $address->receiver }}
                                                                                {{ $address->phone }}</p>
                                                                            <p class="mb-1">
                                                                                {{ $address->street }},
                                                                                {{ $address->ward }}</p>
                                                                            <p>
                                                                                {{ $address->city }},
                                                                                {{ $address->state }}
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        {{-- Update form --}}
                                                        {{-- <div id="update-form-{{ $address->id }}"
                                                                    style="display: none">
                                                                    <div class="modal-body">
                                                                        <div class="media-body">
                                                                            <div class="row d-flex justify-content-center">
                                                                                <div class="col-6">

                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="receiver-{{ $address->id }}"
                                                                                            value="{{ $address->receiver }}">
                                                                                        <label
                                                                                            for="receiver">Receiver</label>
                                                                                    </div>
                                                                                    <div class="form-floating mb-3">
                                                                                        <input
                                                                                            id="street-{{ $address->id }}"
                                                                                            class="form-control"
                                                                                            placeholder="inputhere"
                                                                                            value="{{ $address->street }}">
                                                                                        <label>Đường</label>

                                                                                    </div>
                                                                                    <div class="form-floating mb-3">

                                                                                        <input type="text"
                                                                                            id="district-{{ $address->id }}"
                                                                                            class="form-control district dropdown-toggle"
                                                                                            data-bs-toggle="dropdown"
                                                                                            placeholder="inputhere"
                                                                                            value="{{ $address->city }}"
                                                                                            oninput="disSearch()">
                                                                                        <label>Quận/Huyện</label>
                                                                                        <ul class="dropdown-menu"
                                                                                            id="district_list">
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">

                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="phone"
                                                                                            class="form-control"
                                                                                            id="phone-{{ $address->id }}"
                                                                                            value="{{ $address->phone }}">
                                                                                        <label for="phone">Phone
                                                                                            number</label>
                                                                                    </div>
                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="text"
                                                                                            id="province-{{ $address->id }}"
                                                                                            class="form-control province dropdown-toggle"
                                                                                            data-bs-toggle="dropdown"
                                                                                            placeholder="inputhere"
                                                                                            value="{{ $address->state }}"
                                                                                            oninput="proSearch()">
                                                                                        <label>Tỉnh/Thành</label>
                                                                                        <ul class="dropdown-menu"
                                                                                            id="province_list">
                                                                                        </ul>
                                                                                    </div>
                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="text"
                                                                                            id="ward-{{ $address->id }}"
                                                                                            class="form-control ward dropdown-toggle"
                                                                                            data-bs-toggle="dropdown"
                                                                                            placeholder="inputhere"
                                                                                            value="{{ $address->ward }}"
                                                                                            oninput="warSearch()">
                                                                                        <label>Phường/Xã</label>
                                                                                        <ul class="dropdown-menu"
                                                                                            id="ward_list">
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                onclick="cancelUpdateForm({{ $address->id }})">Close</button>
                                                                            <button type="button" class="btn btn-danger"
                                                                                onclick="deleteAddress({{ $address->id }})">Delete</button>

                                                                            <button type="button"
                                                                                class="btn btn-primary update-address"
                                                                                target-id={{ $address->id }}>Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row gutters mt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">

                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary update-information">Update</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- Modal for create address --}}
                                <div class="modal fade" id="createAddress" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create new address
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <h6 class="mt-3 mb-2 normal-text fs-2">Fill in the blank</h6>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-receiver" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Receiver</label>

                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="phone" id="new-phone" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Phone number</label>

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">

                                                    <div class="col-12">

                                                        <div class="form-floating mb-3">
                                                            <input id="new-street" class="form-control"
                                                                placeholder="inputhere">
                                                            <label>Đường</label>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-province"
                                                                class="form-control province dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="proSearch()">
                                                            <label>Tỉnh/Thành</label>
                                                            <ul class="dropdown-menu" id="province_list"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                        <div class="form-floating mb-3">

                                                            <input type="text" id="new-district"
                                                                class="form-control district dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="disSearch()">
                                                            <label>Quận/Huyện</label>
                                                            <ul class="dropdown-menu" id="district_list"></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                                        <div class="form-floating mb-3">
                                                            <input type="text" id="new-ward"
                                                                class="form-control ward dropdown-toggle"
                                                                data-bs-toggle="dropdown" placeholder="inputhere"
                                                                oninput="warSearch()">
                                                            <label>Phường/Xã</label>
                                                            <ul class="dropdown-menu" id="ward_list"></ul>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        class="btn btn-primary create-new-address">Let's
                                                        go</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters mt-4">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                {{-- <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button> --}}
                                                <button type="button" id="submit" name="submit"
                                                    class="btn btn-primary update-information">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif(is_null($address))
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 normal-text fs-2">Delivery address</h6>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="receiver" class="form-control"
                                                placeholder="inputhere">
                                            <label>Receiver</label>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="phone" id="phone" class="form-control"
                                                placeholder="inputhere">
                                            <label>Phone number</label>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-12">

                                        <div class="form-floating mb-3">
                                            <input id="street" class="form-control" placeholder="inputhere">
                                            <label>Đường</label>

                                        </div>

                                    </div>
                                </div>
                                <div class="row d-flex">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="province"
                                                class="form-control province dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="proSearch()">
                                            <label>Tỉnh/Thành</label>
                                            <ul class="dropdown-menu" id="province_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-floating mb-3">

                                            <input type="text" id="district"
                                                class="form-control district dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="disSearch()">
                                            <label>Quận/Huyện</label>
                                            <ul class="dropdown-menu" id="district_list"></ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                        <div class="form-floating mb-3">
                                            <input type="text" id="ward"
                                                class="form-control ward dropdown-toggle" data-bs-toggle="dropdown"
                                                placeholder="inputhere" oninput="warSearch()">
                                            <label>Phường/Xã</label>
                                            <ul class="dropdown-menu" id="ward_list"></ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="row gutters mt-4">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">

                                            <button type="button" id="submit" name="submit"
                                                class="btn btn-primary create-new-address">Create</button>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                    <div class="card shadow-2-strong mt-4 mb-4" style="border-radius: 16px; background-color :white">

                        <div class="table-responsive mt-5 mb-5 p-5">
                            <table class="table">
                                <h3 class="normal-text">
                                    Shopping cart
                                </h3>
                                <thead>
                                    <tr>
                                        <th scope="col" class="h5">Name</th>

                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody class="items-in-cart">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="row">

                                        </th>

                                        <td class="align-middle">

                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0 normal-text total-money fs-2">vcl</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px; background-color: white">
                        <div class="card-body m-3 p-3">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center">


                                    <h6 class="mb-3 normal-text fs-2 mt-3 me-3">Payment method</h6>

                                </div>
                                <div class="col-4 d-flex align-items-stretch">
                                    <div class="card payment-method-item mb-4 shadow-sm w-100" id="method-1">
                                        <div
                                            class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i>
                                                </div>
                                                <div class="media-body d-flex flex-column align-items-center">
                                                    <p class="method-name m-2">Banking</p>

                                                    <p>
                                                        <i class="fas fa-university fs-3"></i>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-stretch">
                                    <div class="card payment-method-item mb-4 shadow-sm w-100" id="method-2">
                                        <div
                                            class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i>
                                                </div>
                                                <div class="media-body d-flex flex-column align-items-center">
                                                    <p class="method-name m-2">Cash on delivery (COD)</p>

                                                    <p>
                                                        <i class="fas fa-money-bill fs-3"></i>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-stretch">
                                    <div class="card payment-method-item mb-4 shadow-sm w-100" id="method-3">
                                        <div
                                            class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
                                            <div class="media">
                                                <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i>
                                                </div>
                                                <div class="media-body d-flex flex-column align-items-center">
                                                    <p class="method-name m-2">Pay at our store</p>

                                                    <p>
                                                        <i class="fas fa-store fs-3"></i>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-3 d-flex justify-content-around p-0">

                                    <button class="btn btn-dark" href="{{ url()->previous() }}">Continue
                                        shopping</button>
                                    <button class="btn btn-dark checkout">Complete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const updateInformation = document.querySelector('.update-new-address');
        // console.log
        if (updateInformation) {

            updateInformation.addEventListener('click', function() {
                let url = "{{ route('api.update-address') }}";
                let receiver = document.querySelector('#receiver').value;
                let phone = document.querySelector('#phone').value;
                let province = document.querySelector('#province').value;
                let district = document.querySelector('#district').value;
                let ward = document.querySelector('#ward').value;
                let address = document.querySelector('#street').value;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let userId = "{{ Auth::user()->id }}";
                axios.post(url, {
                        userId: userId,
                        receiver: receiver,
                        phone: phone,
                        state: province,
                        city: district,
                        ward: ward,
                        street: address,
                        // userId: userId
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(function(response) {

                        console.log(response.data);
                        if (response.data["statusCode"] == 200) {
                            console.log('hello')
                            // Store a flag in localStorage to show the alert after reload
                            localStorage.setItem('showAlert', 'true');
                            // Reload the page
                            location.reload();

                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                        alertDanger.classList.remove('visually-hidden')
                        alertDanger.innerHTML = error.response
                        setTimeout(() => {
                            alertDanger.classList.add('visually-hidden')
                        }, 3000);
                    });
            });
        }
        const cartList = document.querySelector('.items-in-cart');

        @if (Auth::check())
            const cart = @json($cart)["original"]["data"];
            const checkout = document.querySelector('.checkout');
            checkout.addEventListener('click', function() {

                let url = "{{ route('api.checkout') }}";
                let addressId = $('.addresses-item.checked').attr('address');
                let paymentMethod = $('.payment-method-item.checked').find('.method-name').text();
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let detail = []
                let totalPrice = parseInt(document.querySelector('.total-money').innerText)
                console.log(totalPrice)
                cart.forEach(el => {
                    detail.push({
                        detailID: el.detailID,
                        quantity: el.quantity
                    })

                })
                axios.post(url, {
                        addressId: addressId,
                        paymentMethod: paymentMethod,
                        totalPrice: totalPrice,
                        detail: detail,

                    }, {
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(function(response) {
                        if (response.data["statusCode"] == 200) {
                            let orderId = response.data.data.id;
                            console.log(orderId)
                            axios.post("{{ route('api.clear-cart') }}", {
                                    headers: {
                                        'X-CSRF-TOKEN': token
                                    }
                                })
                                .then(function(response) {
                                    console.log(response.data);
                                    if (response.data["statusCode"] == 200) {
                                        console.log('Cart cleared')
                                    }
                                })
                                .catch(function(error) {
                                    console.log(error);
                                });
                            window.location.href = `/order/${orderId}`
                        }
                    })
                    .catch(function(error) {
                        console.log(error);

                        let alertDanger = document.querySelector('.alert-danger');
                        alertDanger.classList.remove('visually-hidden')
                        alertDanger.innerHTML = `Check out failed`
                        setTimeout(() => {
                            alertDanger.classList.add('visually-hidden')
                        }, 3000);
                    });
            });

            // console.log(cart)

            if (cart) {
                cart.forEach(el => {
                    cartList.innerHTML += `
                 <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center">
                                                        <img src="${JSON.parse(el.image)[0]}" class="img-fluid rounded-3" style="width: 120px;">
                                                        <div class="flex-column ms-4">
                                                            <p class="mb-2">${el.name}</p>
                                                            <p class="mb-0">${el.color} ${el.size}</p>
                                                        </div>
                                                    </div>
                                                </th>
    
                                                <td class="align-middle">
                                                    <div class="d-flex flex-row">
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
    
                                                        <input id="form1" min="0" name="quantity" value="${el.quantity}"
                                                            type="text" class="form-control form-control-sm text-center"
                                                            style="width: 50px;" />
    
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">USD ${el.price}</p>
                                                </td>
                                            </tr>
                                            
    
                `
                })
                let totalMoney = 0;
                cart.forEach(el => {
                    totalMoney += parseInt(el.price) * parseInt(el.quantity)
                })
                document.querySelector('.total-money').innerHTML = `${totalMoney} USD`
                console.log(totalMoney)
            } else {
                console.log('nothing')
            }
        @else
            let cart = JSON.parse(localStorage.getItem('cart'))
            // console.log(cart)
            cart.forEach(el => {
                cartList.innerHTML += `
                 <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center">
                                                        <img src="${el.image}" class="img-fluid rounded-3" style="width: 120px;">
                                                        <div class="flex-column ms-4">
                                                            <p class="mb-2">${el.name}</p>
                                                            <p class="mb-0">${el.color} ${el.size}</p>
                                                        </div>
                                                    </div>
                                                </th>
    
                                                <td class="align-middle">
                                                    <div class="d-flex flex-row">
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
    
                                                        <input id="form1" min="0" name="quantity" value="${el.quantity}"
                                                            type="text" class="form-control form-control-sm text-center"
                                                            style="width: 50px;" />
    
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">${el.price}</p>
                                                </td>
                                            </tr>
                                            
    
                `
            })
        @endif


        document.querySelectorAll('.card.addresses-item').forEach(item => {
            item.addEventListener('click', () => {
                SelectAddress(item.getAttribute('address'))
            })
        })
        document.querySelectorAll('.card.payment-method-item').forEach(item => {
            item.addEventListener('click', () => {
                SelectMethod(item.getAttribute('id'))
            })
        })

        function SelectMethod(id) {
            let items = document.querySelectorAll(".card.payment-method-item");
            items.forEach((item) => {
                items.forEach((item) => {
                    item.classList.remove("checked");
                });
            });

            let item = $(`.payment-method-item[id='${id}']`);
            let check = item.find('.col-2.text-end')
            check.html('<i class="far fa-check-circle"></i>')
            item.addClass("checked");
        }

        function SelectAddress(id) {
            let items = document.querySelectorAll(".card.addresses-item");
            items.forEach((item) => {
                let check = item.querySelector('.col-2.text-end')
                item.classList.remove("checked");
                if (check) {
                    check.innerHTML = ''
                }

            });

            if ($(`.addresses-item[address='${id}']`).attr('type') == 'modal-item') {
                let item = $(`.addresses-item[address='${id}']`);
                let modalitem = $(`.addresses-item[address='${id}'][type='modal-item']`);
                let check = item.find('.col-2.text-end')
                check.html('<i class="far fa-check-circle"></i>')
                item.addClass("checked");
                let otherAddress = $('.other-address')
                otherAddress.parent().removeClass('bg-white')
                otherAddress.parent().addClass('checked')
                otherAddress.parent().attr('address', id)
                var content = modalitem.find('.media-body')
                otherAddress.find('.media-body')[0].innerHTML = content[0].innerHTML

            } else {

                let item = $(`.addresses-item[address='${id}']`);
                let modalitem = $(`.addresses-item[address='${id}'][type='modal-item']`);
                let check = item.find('.col-2.text-end')
                check.html('<i class="far fa-check-circle"></i>')
                item.addClass("checked");
                let otherAddress = $('.other-address')
                otherAddress.parent().addClass('bg-white')
                otherAddress.find('.media-body')[0].innerHTML = `
                                                                <p class="other-address-quantity m-2">
                                                                    ${@json($nonDefaultAddress).length} address more
                                                                </p>
                                                                <p>
                                                                    <i class="fal fa-info-circle fs-3"></i>
                                                                </p>
                `

            }

        }
        const createNewAddress = document.querySelector('.create-new-address');
        if (createNewAddress) {
            createNewAddress.addEventListener('click', function() {
                let url = "{{ route('api.create-new-address') }}";
                let receiver = document.querySelector('#receiver').value;
                let phone = document.querySelector('#phone').value;
                let province = document.querySelector('#province').value;
                let district = document.querySelector('#district').value;
                let ward = document.querySelector('#ward').value;
                let address = document.querySelector('#street').value;
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let userId = "{{ auth()->user()->id }}";

                axios.post(url, {
                        receiver: receiver,
                        phone: phone,
                        state: province,
                        city: district,
                        ward: ward,
                        street: address,
                        userId: userId
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(function(response) {

                        console.log(response.data);
                        if (response.data["statusCode"] == 200) {
                            console.log('hello')
                            // Store a flag in localStorage to show the alert after reload
                            localStorage.setItem('showAlert', 'true');
                            // Reload the page
                            location.reload();

                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        }

        function toQuery(str) {
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
            str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
            str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
            str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
            str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
            str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
            str = str.replace(/Đ/g, "D");
            str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
            str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
            str = str.replace(/ + /g, "");
            str = str.replace(/\s/g, "");
            str = str.toLowerCase();
            str = str.trim();
            str = str.replace(
                /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
                ""
            );
            return str;
        }

        function httpGet(theUrl) {

            var xmlHttp = new XMLHttpRequest();

            xmlHttp.open("GET", theUrl, false);
            xmlHttp.setRequestHeader("Access-Control-Allow-Origin", "*");
            xmlHttp.send(null);
            return xmlHttp.responseText;
        }


        var dvhcData = [];
        var pdaData = {};
        fetch('/dvhc.json')
            .then(response => response.json())
            .then(data => {
                dvhcData = data;
                proSearch();
                disSearch();
                warSearch();
            })
            .catch(error => {
                console.error('Error:', error);
            });


        function proSearch() {
            $(".province").each(function() {
                var $provinceList = $('<ul class="dropdown-menu province-list"></ul>');
                for (i in dvhcData["province"]) {
                    var dpro = dvhcData["province"][i]["name"],
                        dproid = dvhcData["province"][i]["id"];
                    $provinceList.append(
                        '<li><a class="dropdown-item" onclick="' +
                        "addpda('province', '" +
                        dpro +
                        "', {'province_id': '" +
                        dproid +
                        "'}); disSearch()" +
                        '">' +
                        dpro +
                        "</a></li>"
                    );
                }
                $(this).after($provinceList);
                disSearch();
            });
        }

        function disSearch() {
            $(".district").each(function() {
                var dis = $(this).val();
                var $districtList = $('<ul class="district-list dropdown-menu"></ul>');
                if ($(".province").val()) {
                    if (pdaData["province_id"]) {
                        for (i in dvhcData["province"]) {
                            if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    var d = dvhcData["province"][i]["district"][j]["name"],
                                        did = dvhcData["province"][i]["district"][j]["id"];
                                    if (dis) {
                                        if (toQuery(d).indexOf(toQuery(dis)) >= 0) {
                                            $districtList.append(
                                                '<li><a class="dropdown-item" onclick="' +
                                                "addpda('district', '" +
                                                d +
                                                "', {'district_id': '" +
                                                did +
                                                "'}); warSearch()" +
                                                '">' +
                                                d +
                                                "</a></li>"
                                            );
                                        }
                                    } else {
                                        $districtList.append(
                                            '<li><a class="dropdown-item" onclick="' +
                                            "addpda('district', '" +
                                            d +
                                            "', {'district_id': '" +
                                            did +
                                            "'}); warSearch()" +
                                            '">' +
                                            d +
                                            "</a></li>"
                                        );
                                    }
                                }
                            }
                        }
                    } else {
                        $districtList.append(
                            '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                        );
                    }
                } else {
                    pdaData["province_id"] = "";
                    $districtList.append(
                        '<li><a class="dropdown-item">Vui lòng chọn Tỉnh/Thành</a></li>'
                    );
                }
                $(this).after($districtList);
                warSearch();
            });
        }

        function warSearch() {
            $(".ward").each(function() {
                var war = $(this).val();
                var $wardList = $('<ul class="ward-list dropdown-menu"></ul>');

                if ($(".district").val() && $(".province").val()) {
                    if (pdaData["province_id"] && pdaData["district_id"]) {
                        for (i in dvhcData["province"]) {
                            if (pdaData["province_id"] == dvhcData["province"][i]["id"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    if (pdaData["district_id"] == dvhcData["province"][i]["district"][j][
                                            "id"
                                        ]) {
                                        for (k in dvhcData["province"][i]["district"][j]["ward"]) {
                                            var d = dvhcData["province"][i]["district"][j]["ward"][k]["name"],
                                                did = dvhcData["province"][i]["district"][j]["ward"][k]["id"];
                                            if (war) {
                                                if (toQuery(d).indexOf(toQuery(war)) >= 0) {
                                                    $wardList.append(
                                                        '<li><a class="dropdown-item" onclick="' +
                                                        "addpda('ward', '" +
                                                        d +
                                                        "', {'ward_id': '" +
                                                        did +
                                                        "'});" +
                                                        '">' +
                                                        d +
                                                        "</a></li>"
                                                    );
                                                }
                                            } else {
                                                $wardList.append(
                                                    '<li><a class="dropdown-item" onclick="' +
                                                    "addpda('ward', '" +
                                                    d +
                                                    "', {'ward_id': '" +
                                                    did +
                                                    "'});" +
                                                    '">' +
                                                    d +
                                                    "</a></li>"
                                                );
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $wardList.append(
                            '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                        );
                    }
                } else {
                    if (!$(".province").val()) {
                        pdaData["province_id"] = "";
                    }
                    if (!$(".district").val()) {
                        pdaData["district_id"] = "";
                    }
                    $wardList.append(
                        '<li><a class="dropdown-item">Vui lòng chọn Quận/Huyện</a></li>'
                    );
                }
                $(this).after($wardList);
            });
        }

        function addpda(id, val, d) {
            $('.' + id).val(val);
            var prop = id + "_id",
                res = "";
            pdaData[prop] = d[prop];
            for (ig in pdaData) {
                if (pdaData[ig]) {
                    switch (ig) {
                        case "province_id":
                            res += "Mã tỉnh/thành: " + pdaData[ig];
                            break;
                        case "district_id":
                            res += ", quận/huyện: " + pdaData[ig];
                            break;
                        case "ward_id":
                            res += ", phường/xã: " + pdaData[ig];
                            break;
                    }
                }
            }
            if (res) {
                $("#diaphuong_result").text(res);
            } else {
                $("#diaphuong_result").text("");
            }
            if (id == 'province') {
                $('.district').val('');
                $('.ward').val('');
                pdaData["district_id"] = '';
                pdaData["ward_id"] = '';
                setTimeout(disSearch, 100);
            }
            if (id == 'district') {
                $('.ward').val('');
                pdaData["ward_id"] = '';
                setTimeout(function() {
                    warSearch(pdaData["district_id"]);
                }, 100);
            }
        }

        function dvhccodeSearch() {
            var d = $("#dvhc_code").val(),
                res = [];

            switch ($("#dvhc_code_type").val()) {
                case "province":
                    if (d) {
                        if (d.length > 2) {
                            res.push(["text", "Nhập tối đa 2 ký tự !"]);
                        } else {
                            for (i in dvhcData["province"]) {
                                if (dvhcData["province"][i]["id"].indexOf(d) >= 0) {
                                    res.push([
                                        dvhcData["province"][i]["id"],
                                        dvhcData["province"][i]["name"],
                                    ]);
                                }
                            }
                        }
                    }
                    break;
                case "district":
                    if (d) {
                        if (d.length > 3) {
                            res.push(["text", "Nhập tối đa 3 ký tự !"]);
                        } else {
                            for (i in dvhcData["province"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    if (
                                        dvhcData["province"][i]["district"][j]["id"].indexOf(d) >= 0
                                    ) {
                                        res.push([
                                            dvhcData["province"][i]["id"],
                                            dvhcData["province"][i]["name"],
                                            dvhcData["province"][i]["district"][j]["id"],
                                            dvhcData["province"][i]["district"][j]["name"],
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                    break;
                case "ward":
                    if (d) {
                        if (d.length > 5) {
                            res.push(["text", "Nhập tối đa 5 ký tự !"]);
                        } else if (d.length > 2) {
                            for (i in dvhcData["province"]) {
                                for (j in dvhcData["province"][i]["district"]) {
                                    for (k in dvhcData["province"][i]["district"][j]["ward"]) {
                                        if (
                                            dvhcData["province"][i]["district"][j]["ward"][k][
                                                "id"
                                            ].indexOf(d) >= 0
                                        ) {
                                            res.push([
                                                dvhcData["province"][i]["id"],
                                                dvhcData["province"][i]["name"],
                                                dvhcData["province"][i]["district"][j]["id"],
                                                dvhcData["province"][i]["district"][j]["name"],
                                                dvhcData["province"][i]["district"][j]["ward"][k]["id"],
                                                dvhcData["province"][i]["district"][j]["ward"][k]["name"],
                                            ]);
                                        }
                                    }
                                }
                            }
                        } else {
                            res.push(["text", "Vui lòng nhập tối thiểu 3 ký tự !"]);
                        }
                    }
                    break;
                case "plate":
                    if (d) {
                        if (d.length > 2) {
                            res.push(["text", "Nhập tối đa 2 ký tự !"]);
                        } else if (d == "80") {
                            res.push(["80", "Các đơn vị, cơ quan cấp trung ương"]);
                        } else {
                            for (i in dvhcData["province"]) {
                                var plate = dvhcData["province"][i]["plate"];
                                for (j in plate) {
                                    if (plate[j].toString().indexOf(d) >= 0) {
                                        res.push([plate.join(", "), dvhcData["province"][i]["name"]]);
                                        break;
                                    }
                                }
                            }
                        }
                    }
                    break;
            }

            if (res.length > 0) {
                if (res[0][0] != "text") {
                    switch ($("#dvhc_code_type").val()) {
                        case "province":
                            var t =
                                '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tên</th></tr></thead>';
                            for (i in res) {
                                t +=
                                    "<tr><td>" +
                                    res[i][0] +
                                    "</td>" +
                                    "<td>" +
                                    res[i][1] +
                                    "</td></tr>";
                            }
                            t += "</table>";
                            $("#dvhc_code_result").html(t);
                            break;
                        case "district":
                            var t =
                                '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tỉnh/Thành</th><th>Mã</th><th>Quận/Huyện</th></tr></thead>';
                            for (i in res) {
                                t +=
                                    "<tr><td>" +
                                    res[i][0] +
                                    "</td>" +
                                    "<td>" +
                                    res[i][1] +
                                    "<td>" +
                                    res[i][2] +
                                    "<td>" +
                                    res[i][3] +
                                    "</td></tr>";
                            }
                            t += "</table>";
                            $("#dvhc_code_result").html(t);
                            break;
                        case "ward":
                            var t =
                                '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tỉnh/Thành</th><th>Mã</th><th>Quận/Huyện</th><th>Mã</th><th>Phường/Xã</th></tr></thead>';
                            for (i in res) {
                                t +=
                                    "<tr><td>" +
                                    res[i][0] +
                                    "</td>" +
                                    "<td>" +
                                    res[i][1] +
                                    "<td>" +
                                    res[i][2] +
                                    "<td>" +
                                    res[i][3] +
                                    "<td>" +
                                    res[i][4] +
                                    "<td>" +
                                    res[i][5] +
                                    "</td></tr>";
                            }
                            t += "</table>";
                            $("#dvhc_code_result").html(t);
                            break;
                        case "plate":
                            var t =
                                '<table class="table table-striped table-hover"><thead><tr><th>Mã</th><th>Tên</th></tr></thead>';
                            for (i in res) {
                                t +=
                                    "<tr><td>" +
                                    res[i][0] +
                                    "</td>" +
                                    "<td>" +
                                    res[i][1] +
                                    "</td></tr>";
                            }
                            t += "</table>";
                            $("#dvhc_code_result").html(t);
                            break;
                    }
                } else {
                    $("#dvhc_code_result").html("<p>" + res[0][1] + "</p>");
                }
            } else {
                $("#dvhc_code_result").text("");
            }
        }
    </script>
    <!-- Credit card form -->
@endsection
