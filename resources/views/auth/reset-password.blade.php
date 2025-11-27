@extends('layouts.guest')
@section('title', 'Sign Up')
@section('content')
    <p class="mb-4">Please sign-up and start the adventure</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your name"
                autofocus
                required
            />
            @if ($errors->get('name'))
                <span class="text-red-600">{{ $errors->get('name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                autofocus
                required
            />
            @if ($errors->get('email'))
                <span class="text-red-600">{{ $errors->get('email') }}</span>
            @endif
        </div>
        <div class="mb-3 form-password-toggle">
            <label for="password" class="form-label">Password</label>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    autocomplete="new-password"
                    required
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @if ($errors->get('password'))
                <span class="text-red-600">{{ $errors->get('password') }}</span>
            @endif
        </div>
        <div class="mb-3 form-password-toggle">
            <label for="password-confirmation" class="form-label">Password Confirmation</label>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password-confirmation"
                    class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password-confirmation"
                    autocomplete="new-password"
                    required
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @if ($errors->get('password_confirmation'))
                <span class="text-red-600">{{ $errors->get('password_confirmation') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
        </div>
    </form>

    <p class="text-center">
        <span>Already Registered?</span>
        <a href="{{ route('login') }}">
            <span>Sign in</span>
        </a>
    </p>
@endsection
