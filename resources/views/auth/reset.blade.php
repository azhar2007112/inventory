@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<!DOCTYPE html>
  <html lang="id">
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Reset-password </title>
  
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
      <link rel="stylesheet" href="/assetsh/plugins/fontawesome-free/css/all.min.css">
  
      {{-- <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
  
      <link rel="stylesheet" href="/assetsh/dist/css/adminlte.min.css">
  
  </head>
  
  <body class="hold-transition login-page">
  
    
  
      <div class="login-box">
  
          <div class="card card-outline card-primary">
              <div class="card-header text-center">
                  
              </div>
              <div class="card-body">
                  <p class="login-box-msg">Reset Password</p>
                  @include('sweetalert::alert')
     
                  <form class="needs-validation" novalidate action="" method="POST">
                      @csrf
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="New Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="input-group mb-3">
                      <input type="password" name="passwordConfirm" id="passwordConfirm"
                          class="form-control @error('passwordConfirm') is-invalid @enderror"
                          placeholder="Retype password" required>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                          </div>
                      </div>
                      @error('passwordConfirm')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                      <div class="row">
                          
                          
                          <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-block">Reset</button>
                          </div>
                         
                      </div>
                  </form>
              </div>
  
          </div>
  
      </div>
    
@endsection
@section('script')
    
<script src="/assetsh/plugins/jquery/jquery.min.js"></script>

<script src="/assetsh/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/assetsh/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

@endsection