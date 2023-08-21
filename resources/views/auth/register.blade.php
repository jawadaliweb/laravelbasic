
<head>

<title>Register | Login </title>

<!-- App favicon -->

<!-- Bootstrap Css -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
<div class="bg-overlay"></div>
<div class="wrapper-page">
<div class="container-fluid p-0">
<div class="card">
<div class="card-body">

<div class="text-center mt-4">
<div class="mb-3">
<a href="index.html" class="auth-logo">
<img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
<img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
</a>
</div>
</div>

<h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

<div class="p-3">
            
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            $errorWithCustomNames = str_replace(['oldpassword', 'newpassword', 'confirmpassword'], ['Current Password', 'New Password', 'Confirm Password'], $error);
            toastr()->error($errorWithCustomNames);
        @endphp
    @endforeach
@endif

<form class="form-horizontal mt-3"  method="POST" action="{{ route('register') }}">
@csrf
<div class="form-group mb-3 row">
<div class="col-12">
<input id="name" class="form-control" type="text" placeholder="Name" name="name" >

</div>
</div>

<div class="form-group mb-3 row">
<div class="col-12">
<input  id="username" class="form-control" type="text" name="username" placeholder="Username">
</div>
</div>


<div class="form-group mb-3 row">
<div class="col-12">
<input  id="email" class="form-control" type="email"  placeholder="email" type="email" name="email" >
</div>
</div>

<div class="form-group mb-3 row">
<div class="col-12">
<input class="form-control" type="password" name="password" id="password" placeholder="Password">
</div>
</div>

<div class="form-group mb-3 row">
<div class="col-12">
<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
</div>
</div>

<div class="form-group text-center row mt-3 pt-1">
<div class="col-12">
<button  class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
</div>
</div>

<div class="form-group mt-2 mb-0 row">
<div class="col-12 mt-3 text-center">
<a href="{{ route('login') }}" class="text-muted">Already have account?</a>
</div>
</div>
</form>
<!-- end form -->
</div>
</div>
<!-- end cardbody -->
</div>
<!-- end card -->
</div>
<!-- end container -->
</div>
<!-- end -->


<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/app.js ') }}"></script>

</body>
</html>
