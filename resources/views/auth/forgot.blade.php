@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<!DOCTYPE html>
  <html lang="id">
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>forgot-password </title>
  
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
                  <p class="login-box-msg">Forgot Password</p>
                  @include('sweetalert::alert')
     
                  <form class="needs-validation" novalidate action="" method="POST">
                      @csrf
                      <div class="input-group mb-3">
                          <input type="email" name="email" class="form-control" placeholder="Email" required>
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                              </div>
                          </div>
                      </div>
                     
                      <div class="row">
                          
                          
                          <div class="col-4">
                              <button type="submit" class="btn btn-primary btn-block">Forgot</button>
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