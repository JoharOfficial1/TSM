@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
    <div class="auth-inner py-2">
        <!-- Login v1 -->
        <div class="card mb-0">
            <div class="card-body">
                <a href="javascript:void(0);" class="brand-logo">
                    <h2 class="brand-text text-primary ml-1">Task Management System</h2>
                </a>

                <h4 class="card-title mb-1">Welcome to Task Management System! 👋</h4>
                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        placeholder="john@example.com"
                        aria-describedby="email"
                        tabindex="1"
                        autofocus
                        required
                        />
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <label for="password">Password</label>
                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input
                            type="password"
                            class="form-control form-control-merge @error('email') is-invalid @enderror"
                            id="password"
                            name="password"
                            tabindex="2"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                            required
                            />
                            <div class="input-group-append">
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                </form>

                <p class="text-center mt-2">
                    <span>New on our platform?</span>
                    <a href="{{url('/register')}}">
                        <span>Create an account</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Login v1 -->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-auth-login.js'))}}"></script>
@endsection
