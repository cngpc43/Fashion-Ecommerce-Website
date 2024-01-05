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
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-3 col-form-label text-md-start normal-text fs-4">{{ __('Email') }}</label>

                                <div class="col-md-8 d-flex justify-content-center">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>


                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-3 col-form-label text-md-start normal-text fs-4">{{ __('Password') }}</label>

                                <div class="col-md-8 d-flex justify-content-center">
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
                                <div
                                    class="col-md-8 offset-lg-3 offset-md-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="text-decoration:none; color:black"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-lg-3 offset-md-3 d-flex justify-content-around">
                                    <button type="submit" class="btn btn-dark w-100">
                                        {{ __('Login') }}
                                    </button>

                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8 offset-lg-3 offset-md-3 normal-text d-flex justify-content-center">
                                    <a class="btn btn-link text-decoration-none fs-4 p-0"
                                        href="{{ route('register') }}">Register</a>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
