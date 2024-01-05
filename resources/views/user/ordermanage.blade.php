@extends('layouts.app')
@section('content')
    {{-- <section class="vh-100"> --}}
    {{-- <div class="container py-5 h-100 d-flex align-items-center justify-content-center"> --}}
    <div class="container mt-5 py-3 p-0 ">

        <ul class="nav nav-pills d-flex justify-content-between bg-white" id="pills-tab" role="tablist">
            <li class="nav-item order-status" role="presentation">
                <button class="nav-link status active p-lg-3 p-md-2 fs-4" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">All orders <span class="ms-2"><i class="fal fa-file-invoice"></i></span></button>
            </li>
            <li class="nav-item order-status" role="presentation">
                <button class="nav-link status fs-4 p-lg-3 p-md-2" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pending-order-tab-pane" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Pending <span class="ms-2"><i class="far fa-spinner"></i></span></button>
            </li>
            <li class="nav-item order-status" role="presentation">
                <button class="nav-link status p-lg-3 p-md-2 fs-4" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#picked-order-tab-pane" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">Picked up <span class="ms-2"><i class="fas fa-box-check"></i></span></button>
            </li>
            <li class="nav-item order-status" role="presentation">
                <button class="nav-link status p-lg-3 p-md-2 fs-4" id="pills-contact-tab" data-bs-toggle="pill"
                    data-bs-target="#completed-order-tab-pane" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">Delivered <span class="ms-2"><i class="fas fa-check-square"></i></span></button>
            </li>
            <li class="nav-item order-status" role="presentation">
                <button class="nav-link status p-lg-3 p-md-2 fs-4" id="pills-contact-tab" data-bs-toggle="pill"
                    data-bs-target="#canceled-order-tab-pane" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">Canceled <span class="ms-2"><i class="fas fa-times-hexagon"></i></span></button>
            </li>

        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="table-responsive mb-5 p-5 p-3">
                @php
                    $groupedOrders = $orders->groupBy('id');
                @endphp
                @foreach ($groupedOrders as $order)
                    <table class="table" style="cursor: pointer"
                        onclick="window.location.href='/order/{{ $order[0]->id }}'">
                        <div class=" d-flex justify-content-between bg-white p-4 align-items-center">
                            <h3 class="normal-text">
                                Orders #{{ $order[0]->id }}
                            </h3>
                            <span class="normal-text fs-5">
                                Status: {{ $order[0]->status }}
                            </span>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>
                                <th class="text-center" scope="col" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($order as $el)
                            <tbody class="items-in-cart">
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = json_decode($el->img)[0];
                                            @endphp
                                            <img src="{{ url($img) }}" class="img-fluid rounded-3"
                                                style="width: 120px;">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $el->name }}</p>
                                                <p class="mb-0">{{ $el->color }} {{ $el->size }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="d-flex flex-row justify-content-center">


                                            <span>
                                                {{ $el->quantity }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-center" style="font-weight: 500;">USD {{ $el->price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td scope="row">

                                </td>

                                <td class="align-middle">

                                </td>
                                <td class="text-end pe-5">
                                    <p class="mb-0 normal-text total-money fs-2">Total: USD {{ $order[0]->totalPrice }}</p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="pending-order-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
            tabindex="0">
            <div class="table-responsive mb-5 p-5 p-3">
                @php
                    $groupedOrders = $pending_orders->groupBy('id');
                @endphp
                @foreach ($groupedOrders as $order)
                    <table class="table" style="cursor: pointer"
                        onclick="window.location.href='/order/{{ $order[0]->id }}'">
                        <div class=" d-flex justify-content-between bg-white p-3 align-items-center">

                            <h3 class="normal-text">
                                Orders #{{ $order[0]->id }}
                            </h3>
                            <span class="normal-text fs-5">
                                Status: {{ $order[0]->status }}
                            </span>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>
                                <th class="text-center" scope="col" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($order as $el)
                            <tbody class="items-in-cart">
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = json_decode($el->img)[0];
                                            @endphp
                                            <img src="{{ url($img) }}" class="img-fluid rounded-3"
                                                style="width: 120px;">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $el->name }}</p>
                                                <p class="mb-0">{{ $el->color }} {{ $el->size }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="d-flex flex-row justify-content-center">


                                            <span>
                                                {{ $el->quantity }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-center" style="font-weight: 500;">USD {{ $el->price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td scope="row">

                                </td>

                                <td class="align-middle">

                                </td>
                                <td class="text-end pe-5">
                                    <p class="mb-0 normal-text total-money fs-2">Total: USD {{ $order[0]->totalPrice }}
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="picked-order-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
            tabindex="0">
            <div class="table-responsive mb-5 p-5 p-3">
                @php
                    $groupedOrders = $picked_orders->groupBy('id');
                @endphp
                @foreach ($groupedOrders as $order)
                    <table class="table" style="cursor: pointer"
                        onclick="window.location.href='/order/{{ $order[0]->id }}'">
                        <div class=" d-flex justify-content-between bg-white p-3 align-items-center">

                            <h3 class="normal-text">
                                Orders #{{ $order[0]->id }}
                            </h3>
                            <span class="normal-text fs-5">
                                Status: {{ $order[0]->status }}
                            </span>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>
                                <th class="text-center" scope="col" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($order as $el)
                            <tbody class="items-in-cart">
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = json_decode($el->img)[0];
                                            @endphp
                                            <img src="{{ url($img) }}" class="img-fluid rounded-3"
                                                style="width: 120px;">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $el->name }}</p>
                                                <p class="mb-0">{{ $el->color }} {{ $el->size }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="d-flex flex-row justify-content-center">


                                            <span>
                                                {{ $el->quantity }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-center" style="font-weight: 500;">USD {{ $el->price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td scope="row">

                                </td>

                                <td class="align-middle">

                                </td>
                                <td class="text-end pe-5">
                                    <p class="mb-0 normal-text total-money fs-2">Total: USD {{ $order[0]->totalPrice }}
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="completed-order-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
            tabindex="0">
            <div class="table-responsive mb-5 p-5 p-3">
                @php
                    $groupedOrders = $delivered_orders->groupBy('id');
                @endphp
                @foreach ($groupedOrders as $order)
                    <table class="table" style="cursor: pointer"
                        onclick="window.location.href='/order/{{ $order[0]->id }}'">
                        <div class=" d-flex justify-content-between bg-white p-3 align-items-center">

                            <h3 class="normal-text">
                                Orders #{{ $order[0]->id }}
                            </h3>
                            <span class="normal-text fs-5">
                                Status: {{ $order[0]->status }}
                            </span>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>
                                <th class="text-center" scope="col" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($order as $el)
                            <tbody class="items-in-cart">
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = json_decode($el->img)[0];
                                            @endphp
                                            <img src="{{ url($img) }}" class="img-fluid rounded-3"
                                                style="width: 120px;">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $el->name }}</p>
                                                <p class="mb-0">{{ $el->color }} {{ $el->size }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="d-flex flex-row justify-content-center">


                                            <span>
                                                {{ $el->quantity }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-center" style="font-weight: 500;">USD {{ $el->price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td scope="row">

                                </td>

                                <td class="align-middle">

                                </td>
                                <td class="text-end pe-5">
                                    <p class="mb-0 normal-text total-money fs-2">Total: USD {{ $order[0]->totalPrice }}
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="canceled-order-tab-pane" role="tabpanel" tabindex="0">
            <div class="table-responsive mb-5 p-5 p-3">
                @php
                    $groupedOrders = $canceled_orders->groupBy('id');
                @endphp
                @foreach ($groupedOrders as $order)
                    <table class="table" style="cursor: pointer"
                        onclick="window.location.href='/order/{{ $order[0]->id }}'">
                        <div class=" d-flex justify-content-between bg-white p-3 align-items-center">

                            <h3 class="normal-text">
                                Orders #{{ $order[0]->id }}
                            </h3>
                            <span class="normal-text fs-5">
                                Status: {{ $order[0]->status }}
                            </span>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>
                                <th class="text-center" scope="col" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($order as $el)
                            <tbody class="items-in-cart">
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @php
                                                $img = json_decode($el->img)[0];
                                            @endphp
                                            <img src="{{ url($img) }}" class="img-fluid rounded-3"
                                                style="width: 120px;">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $el->name }}</p>
                                                <p class="mb-0">{{ $el->color }} {{ $el->size }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="d-flex flex-row justify-content-center">


                                            <span>
                                                {{ $el->quantity }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0 text-center" style="font-weight: 500;">USD {{ $el->price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td scope="row">

                                </td>

                                <td class="align-middle">

                                </td>
                                <td class="text-end pe-5">
                                    <p class="mb-0 normal-text total-money fs-2">Total: USD {{ $order[0]->totalPrice }}
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr class="my-4">
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}
    {{-- Import jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script></script>
    {{-- </section> --}}
@endsection
