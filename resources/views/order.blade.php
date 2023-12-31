@extends('layouts.app')
@section('content')
    <section class="mt-5">
        <div class="container mb-3 py-3">

            <div class="card shadow-2-strong mb-5 mb-lg-0 p-5 m-3" style="border-radius: 16px; background-color: white">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <span class="lead fw-normal normal-text fs-2">Order #{{ $order->id }}</span>

                            <span class="text-muted medium">Created on
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</span>
                            <span class="text-muted medium">Status: {{ $order->status }}</span>
                        </div>
                        <div class="d-flex flex-column text-end">
                            <span class="lead fw-normal normal-text fs-2">Shipping address</span>
                            <span class="text-muted medium">{{ $order->receiver }} {{ $order->phone }}</span>
                            <span class="text-muted medium">{{ $order->street }}, {{ $order->ward }}</span>
                            <span class="text-muted medium"> {{ $order->city }},
                                {{ $order->state }}</span>
                        </div>

                    </div>
                    @if ($order->status == 'Pending')
                        <hr class="my-4">

                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                            <span class="d-flex justify-content-center align-items-center big-dot dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('M d') }}</span><span>Pending</span>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center"></span><span>Picked
                                    up</span></div>

                            <div class="d-flex flex-column align-items-end"><span>
                                    ETM:
                                    {{ \Carbon\Carbon::parse($order->created_at)->addDays(3)->format('M d') }}</span><span>Delivered</span>
                            </div>
                        </div>
                    @elseif ($order->status == 'Picked up')
                        <hr class="my-4">

                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                            <span class="dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line">
                            <span class="d-flex justify-content-center align-items-center big-dot dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line"><span class="dot"></span>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('M d') }}</span><span>Pending</span>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <span>{{ \Carbon\Carbon::parse($order->updated_at)->format('M d') }}</span><span>Picked
                                    up</span>
                            </div>

                            <div class="d-flex flex-column align-items-end"><span>
                                    ETM:
                                    {{ \Carbon\Carbon::parse($order->created_at)->addDays(3)->format('M d') }}</span><span>Delivered</span>
                            </div>
                        </div>
                    @elseif ($order->status == 'Delivered')
                        <hr class="my-4">

                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                            <span class="dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line">
                            <span class="dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line">
                            <span class="d-flex justify-content-center align-items-center big-dot dot">
                                <i class="fa fa-check text-white"></i></span>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('M d') }}</span><span>Pending</span>
                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <span>Picked
                                    up</span>
                            </div>

                            <div class="d-flex flex-column align-items-end">
                                <span>{{ \Carbon\Carbon::parse($order->updated_at)->format('M d') }}</span><span>Delivered</span>
                            </div>
                        </div>
                    @elseif ($order->status == 'Canceled')
                        <hr class="my-4">

                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                            <span class="dot">
                                <i class="fa fa-check text-white"></i></span>
                            <hr class="flex-fill track-line">

                            <span class="d-flex justify-content-center align-items-center big-dot dot">
                                <i class="fa fa-times text-white"></i></span>
                        </div>

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column align-items-start">
                                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('M d') }}</span><span>Pending</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span>{{ \Carbon\Carbon::parse($order->updated_at)->format('M d') }}</span><span>Canceled</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="table-responsive mt-5 mb-5 p-3 m-1">
                    <table class="table">
                        <h3 class="normal-text fs-2">
                            Shopping cart
                        </h3>
                        <thead>
                            <tr>
                                <th scope="col" class="h5">Name</th>

                                <th class="text-center" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody class="items-in-cart">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="row" colspan="2" class="text-end">Total</th>
                                <td class="normal-text text-center">USD {{ $order->totalPrice }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-body p-3 m-1">

                    <div class="row d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end p-0">

                            <button class="btn btn-dark" href="{{ url()->previous() }}">Continue
                                shopping</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        console.log(@json($order))
        const orderDetail = @json($orderDetail);
        console.log(orderDetail);
        const cartList = document.querySelector('.items-in-cart');
        orderDetail.forEach(el => {
            cartList.innerHTML += `
             <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ url('${JSON.parse(el.img)[0]}') }}" class="img-fluid rounded-3" style="width: 120px;">
                                                    <div class="flex-column ms-4">
                                                        <p class="mb-2">${el.name}</p>
                                                        <p class="mb-0">${el.color} ${el.size}</p>
                                                    </div>
                                                </div>
                                            </th>

                                            <td class="align-middle">
                                                <div class="d-flex flex-row justify-content-center">
                                                    

                                                   
                                                    <span class="text-center">${el.quantity}</span>
                                                    
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <p class="mb-0 text-center" style="font-weight: 500;">USD ${el.price}</p>
                                            </td>
                                        </tr>
                                        

            `

        })
    </script>
@endsection
