@extends('layouts.app')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100 d-flex align-items-center justify-content-center">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body p-3 m-1 justify-content-center d-flex flex-column">

                            <div class="user-avatar mb-3 d-flex justify-content-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin"
                                    class="img-fluid">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center p-5">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 normal-text fs-2">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-floating mb-3">

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                </div>

                            </div>

                        </div>
                        <div class="row d-flex justify-content-start">
                            <div class="col-3 d-flex justify-content-start">
                                <button type="button" class="btn btn-dark update-information">Update</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- Import jquery --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    </section>
@endsection
