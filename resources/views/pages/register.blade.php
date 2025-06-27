@extends('layouts.empty')

@section('main-content')
  <section class="register-section min-vh-100 d-flex align-items-center"style="
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
                <i class="bi bi-arrow-left-circle fs-4 "style="color: #f1c40f;"></i>
              </a>

              <div class="text-center mb-4">
                <h2 class="fw-bold mb-3">Create Account</h2>
                <p class="text-muted">Sign up for a new account</p>
              </div>

              <form action='/register' method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" 
                        id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                      <label for="name"><i class="bi bi-person-badge me-2"></i>Name</label>
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" 
                        id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                      <label for="username"><i class="bi bi-person me-2"></i>Username</label>
                      @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                
                <div class="form-floating mb-3">
                  <input type="number" class="form-control @error('nis_nip') is-invalid @enderror" 
                    id="nis_nip" placeholder="NIS / NIP" name="nis_nip" value="{{ old('nis_nip') }}">
                  <label for="nis_nip"><i class="bi bi-card-text me-2"></i>NIK</label>
                  @error('nis_nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control @error('notel') is-invalid @enderror" 
                    id="notel" placeholder="No Telpon" name="notel" value="{{ old('notel') }}">
                  <label for="notel"><i class="bi bi-card-text me-2"></i>No Telepeon</label>
                  @error('notel')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" 
                    id="email" placeholder="Email address" name="email" value="{{ old('email') }}">
                  <label for="email"><i class="bi bi-envelope me-2"></i>Email address</label>
                  @error('email')
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
                  <div class="mb-3">
                                <label for="cover" class="form-label">Cover Buku</label>
                                <input class="form-control" type="file" id="cover" name="cover">
                              </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-warning btn-lg">
                    <i class="bi bi-person-plus me-2"></i>Register
                  </button>
                </div>

                <div class="text-center mt-4">
                  <p>Already registered? <a href="/login" class="text-decoration-none fw-bold text-warning">Sign in now!</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
