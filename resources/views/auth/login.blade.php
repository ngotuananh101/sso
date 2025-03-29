@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')
    <div class="d-flex flex-md-row flex-column justify-content-between">
        <div class="left d-flex flex-column me-0 me-md-5">
            <h1 class="mb-5 fs-2x fw-medium">
                Sign In
            </h1>
            <p class="fs-5">with your Ponta SSO Account. This account will be available to other apps use our account in
                the browser.</p>
        </div>
        <div class="right" style="min-width: 45%;">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-floating mb-5">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <a href="{{ route('forgot-password') }}" class="link-warning fw-semibold fs-6">
                    Forgot Password ?
                </a>
                <div class="d-flex justify-content-end align-items-center mt-5 gap-5">
                    <a href="{{ route('register') }}"
                       class="btn btn-active-light-warning link-warning rounded-pill fw-semibold fs-6">
                        Create account
                    </a>
                    <button type="submit" class="btn btn-warning px-8 rounded-pill">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
