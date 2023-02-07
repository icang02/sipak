@extends('layouts.auth')

@section('main-content')
  <div class="row">
    <div class="col-md-5 col-sm-12 mx-auto">
      <div class="card pt-4">
        <div class="card-body">
          <div class="text-center mb-5">
            <img src="{{ asset('voler') }}/assets/images/favicon.ico" height="48" class='mb-4'>
            <h3>Selamat Datang DiWebsite</h3>
            <p>Sistem Monitoring DUPAK BKKBN Provinsi Sulawesi Tenggara.</p>
          </div>
          <form action="{{ route('loginAuth') }}" method="post">
            @csrf
            <div class="form-group position-relative has-icon-left">
              <label for="username">Username</label>
              <div class="position-relative">
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                  id="username" autocomplete="off" value="{{ old('username') }}">
                <div class="form-control-icon">
                  <i data-feather="user"></i>
                </div>
              </div>
              {{-- @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror --}}
            </div>
            <div class="form-group position-relative has-icon-left">
              <div class="clearfix">
                <label for="password">Password</label>
                {{-- <a href="auth-forgot-password.html" class='float-end'>
                  <small>Forgot password?</small>
                </a> --}}
              </div>
              <div class="position-relative">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  id="password" autocomplete="off">
                <div class="form-control-icon">
                  <i data-feather="lock"></i>
                </div>
              </div>
            </div>

            <div class='form-check clearfix my-4'>
              <div class="checkbox float-start">
                <input type="checkbox" id="checkbox1" class='form-check-input'>
                <label for="checkbox1">Remember me</label>
              </div>
              {{-- <div class="float-end">
                <a href="auth-register.html">Don't have an account?</a>
              </div> --}}
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">LOGIN</button>
            </div>
          </form>
          <div class="divider">
            {{-- <div class="divider-text">BKKBN</div> --}}
          </div>
          {{-- <div class="row">
            <div class="col-sm-6">
              <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
            </div>
            <div class="col-sm-6">
              <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
