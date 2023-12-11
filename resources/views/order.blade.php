@extends('layouts.app')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">

            <div class="card shadow-2-strong mb-5 mb-lg-0 p-4" style="border-radius: 16px;">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <span class="lead fw-normal normal-text fs-2">Your order has been delivered</span>
                            <span class="text-muted small">created on Dec 11st</span>
                        </div>

                    </div>
                    <hr class="my-4">

                    <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                        <span class="dot"></span>
                        <hr class="flex-fill track-line"><span class="dot"></span>


                        <hr class="flex-fill track-line"><span
                            class="d-flex justify-content-center align-items-center big-dot dot">
                            <i class="fa fa-check text-white"></i></span>
                    </div>

                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-column align-items-start"><span>15 Mar</span><span>Order
                                placed</span>
                        </div>

                        <div class="d-flex flex-column justify-content-center align-items-center"><span>15
                                Mar</span><span>Out for delivery</span></div>

                        <div class="d-flex flex-column align-items-end"><span>15 Mar</span><span>Delivered</span>
                        </div>
                    </div>

                </div>

                <div class="card-body p-3 m-1">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center">


                            <h6 class="mb-3 normal-text fs-2 mt-3 me-3">Payment method</h6>

                        </div>
                        <div class="col-4 d-flex align-items-stretch">
                            <div class="card payment-method-item mb-4 shadow-sm w-100" id="method-1">
                                <div class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
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
                                <div class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
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
                                <div class="payment-method p-3 d-flex justify-content-center align-items-center h-100">
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
    </section>
    <script>
        console.log(@json($order))
        console.log(@json($orderDetail))
    </script>
@endsection
