@extends('layouts.app')

@section('content')
    <section class="vh-100">

        <div class="container py-5 h-100">
            <div class="row justify-content-center d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 ">

                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3 ms-3 ">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-start ms-3">{{ __('Email Address') }}</label>

                                <div class="col-md-8 ">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3 ms-3">
                                <label for="password"
                                    class="col-md-3 col-form-label text-md-start ms-3">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4 d-flex justify-content-around align-items-center pe-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4 pe-5">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>


                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4 pe-5 d-flex justify-content-center">
                                    <a class="btn btn-link" href="{{ route('register') }}">Register</a>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
