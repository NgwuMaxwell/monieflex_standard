
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
<meta charset="utf-8">
<meta name="keywords" content="solargreen, Solar Green, SolarGreen" />
<meta name="author" content="solargreen.io" />
<meta name="robots" content="" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="SolarGreen -  Green energy investment platform" />
<meta property="og:title" content="SolarGreen -  Member Login" />
<meta property="og:description" content="SolarGreen -  Green energy investment platform" />
<meta property="og:image" content="#" />
<meta name="format-detection" content="telephone=no">
<title>SolarGreen -  Member Login </title>

<link rel="icon" type="image/png" sizes="16x16" href="/static/images/favicon.png">
<link href="/static/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="/static/css/style.css" rel="stylesheet">
</head>
<body class="vh-100">
<div class="authincation h-100">
<div class="container h-100">
<div class="row justify-content-center h-100 align-items-center">
<div class="col-md-6">
<div class="authincation-content">
<div class="row no-gutters">
<div class="col-xl-12">
<div class="auth-form">
<div class="text-center mb-3">
<img src="/static/images/logo-login.png" alt="Logo Login">
</div>
<h4 class="text-center mb-4">Sign in your account</h4>
<form method="POST" action="{{ route('user.data.submit') }}">
@csrf
<div class="form-group">
<div class="input-group mb-3">
<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
<input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control ps-15 bg-transparent" placeholder="First Name">
</div>
</div>
<div class="form-group">
<div class="input-group mb-3">
<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
<input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control ps-15 bg-transparent" placeholder="Last Name">
</div>
</div>
<div class="row">

<div class="col-6">
<div class="fog-pwd text-end">
</div>
</div>

<div class="col-12 text-center">
<button type="submit" class="btn btn-danger mt-10">Continue</button>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@include('partials.notify')

<script src="/static/vendor/global/global.min.js" type="08f8acdcdf4aa8b90d2aecbd-text/javascript"></script>
<script src="/static/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="08f8acdcdf4aa8b90d2aecbd-text/javascript"></script>
<script src="/static/js/custom.js" type="08f8acdcdf4aa8b90d2aecbd-text/javascript"></script>
<script src="/static/js/deznav-init.js" type="08f8acdcdf4aa8b90d2aecbd-text/javascript"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="08f8acdcdf4aa8b90d2aecbd-|49" defer=""></script></body>
</html>