


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Gongtham - Login</title>
<meta name="description" content="ThemeMakker, Hospital Admin">
<meta name="keywords" content="adminX, Bootstrap4, Hospital, Angular4, Material Design"><link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

<!-- adminX You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-cyan">
<div class="authentication">
    <div class="container-fluid">
        <div class="row clearfix">               
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-r-0">
                <div class="card position">
                    <h4 class="l-login">{{ ucfirst(config('app.name')) }} Login</h4>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form 
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
                        <div class="form-group form-float">
                            <div class="form-line">
                            <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                            <input type="password"
                                       class="form-control"
                                       name="password">
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                            <label for="rememberme">Remember Me</label>
                        </div>
                       
                        <button type="submit"
                                        class="btn btn-raised g-bg-cyan waves-effect"
                                        style="margin-right: 15px;">
                                    SING IN
                                </button>
                        <a href="sign-up.html" class="btn btn-raised waves-effect">SIGN UP</a>
                        <div class="text-left">  <a href="{{ route('auth.password.reset') }}">Forgot your password?</a> </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 p-l-0">
                <div class="l-detail">
                    <h5 class="position">Welcome</h5>
                    <h1 class="position"><img src="assets/images/logo.svg" alt="profile img"><span>H</span>ospital</h1>
                    <h3 class="position">Sign in to start your session</h3>
                    <p class="position">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>                            
                    <ul class="list-unstyled l-social position">
                        <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>                                
                        <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-pinterest-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>                            
                        <li><a href="#"><i class="zmdi zmdi-google-plus-box"></i></a></li>                                     
                    </ul>
                    <ul class="list-unstyled l-menu">
                        <li><a href="#">Contact Us</a></li>                                
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js --> 
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Bootstrap JS and jQuery v3.2.1 --> <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js --> 

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js --> 
</body>
</html>
