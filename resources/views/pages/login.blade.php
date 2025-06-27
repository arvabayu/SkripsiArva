@extends('layouts.empty')

@section('main-content')
    <section class="login-section min-vh-100 d-flex align-items-center"style="
  background: url('{{ asset('./img/Book.jpeg') }}') no-repeat center center;
  background-size: cover;
  position: relative;">

        <!-- Overlay -->
        <div class="position-absolute w-100 h-100 top-0 start-0" style="background-color: rgba(0, 0, 0, 0.5);"></div>

        <div class="container position-relative z-index-1">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-md-5">
                            <a href="/" class="text-decoration-none position-absolute top-0 start-0 m-3">
                                <i class="bi bi-arrow-left-circle fs-4"style="color: #f1c40f;"></i>
                            </a>

                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-3">Welcome Back!</h2>
                                <p class="text-muted">Sign in to your account to continue</p>
                            </div>

                            <form action='/login' method="post">
                                @csrf

                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                                    <label for="username"><i class="bi bi-person me-2"></i>Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password">
                                    <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning btn-lg">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                                    </button>
                                </div>

                                <div class="text-center mt-4">
                                    <p>Not registered yet? <a href="/register" class="text-decoration-none fw-bold text-warning">Register
                                            now!</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
