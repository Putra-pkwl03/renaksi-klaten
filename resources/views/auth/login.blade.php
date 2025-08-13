@extends('layouts.base', ['title' => 'Log In'])

@section('css')
@endsection

@section('content')

<div class="auth-bg d-flex min-vh-100">
    <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
        <div class="col-xxl-3 col-lg-5 col-md-6">
            <a href="{{ route('any', ['index'])}}" class="auth-brand d-flex justify-content-center mb-2">
                <img src="/images/logo-dark.png" alt="dark logo" height="26" class="logo-dark">
                <img src="/images/logo.png" alt="logo light" height="26" class="logo-light">
            </a>

            <p class="fw-semibold mb-4 text-center text-muted fs-15">Admin Panel Design by Coderthemes</p>

            <div class="card overflow-hidden text-center p-xxl-4 p-3 mb-0">

                <h4 class="fw-semibold mb-3 fs-18">Log in to your account</h4>

                <form action="{{ url('/auth/login') }}" method="POST" class="text-start mb-3">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>

                        <a href="{{ route('second', ['auth','recoverpw']) }}" class="text-muted border-bottom border-dashed">Forget
                            Password</a>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary fw-semibold" type="submit">Login</button>
                    </div>
                </form>

                <p class="text-muted fs-14 mb-0">Don't have an account?
                    <a href="{{ route('second', ['auth','register']) }}" class="fw-semibold text-danger ms-1">Sign Up !</a>
                </p>

            </div>
            <p class="mt-4 text-center mb-0">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Adminto - By <span
                    class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
            </p>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
