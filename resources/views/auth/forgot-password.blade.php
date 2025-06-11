@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h3 class="card-title mb-4 text-center">Forgot Password</h3>

        <p class="text-muted text-center mb-4">
            Forgot your password? No problem. Enter your email address and we will send you a password reset link.
        </p>

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection
