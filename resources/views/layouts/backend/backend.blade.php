
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Gongtham - @yield('title')</title>
<link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/fonts/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@yield('css')
<style>
 body {
      min-height: 500px;
      /* padding-top: 77px; */
      font-family: 'Taviraj', serif;
    }
</style>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">
		<div class="preloader">
			<div class="spinner-layer pl-light-blue">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
		<p>กำลังโหลด กรุณารอสักครู่...</p>
	</div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Search  -->
<div class="search-bar">
	<div class="search-icon"> <i class="material-icons">Search</i> </div>
	<input type="text" placeholder="START TYPING...">
	<div class="close-search"> <i class="material-icons">close</i> </div>
</div>

@include('layouts.backend.topbar')

@include('layouts.backend.sidebar')
<!-- main content -->
<section class="content" style="min-height: 1000px;">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Gongtham</h2>
			<ol class="breadcrumb">
				<li><a href="index.html">หน้าแรก</a></li>
				<li class="">@yield('title2')  </li> 
				<li class="active">@yield('title')</li>
			</ol>
		</div>
	<div id="app" style="padding:0px;">
					@yield('content')
					</div>
		<div class="row clearfix">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="card">
					<div class="body" id="footer">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<h5>Email Newsletters</h5>
								<p>Sign up for new MaterialWrap content, updates, and offers.</p>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control date" placeholder="Enter your email...">
									</div>
									<span class="input-group-addon"> <i class="material-icons">send</i> </span> </div>
							</div>
							<div class="col-xs-12 col-sm-2">
								<h5>Company</h5>
								<ul class="list-unstyled company">
									<li><a href="javascript:void(0)">About Us </a></li>
									<li><a href="javascript:void(0)">Privacy Policy</a></li>
									<li><a href="javascript:void(0)">Contact Us</a></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-6">
								<h5>Want to Work with Us?</h5>
								<p>Please send <a href="#">ThemeMakker@gmail.com</a></p>
								<p class="copy m-b-0">© Copyright<time class="year">2017</time> ThemeMakker - All Rights Reserved</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</section>

<!-- Jquery Core Js --> 
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v2.1.4.js ) --> 
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js --> 
<script src="{{ asset('js/admin.js') }}
	"></script>
	
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js --> 
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/sweetalert/sweetalert.min.js') }}"></script>
<script>

$('#leftsidebar .list li').click(function(){
    var $this = $(this);
    if(!$this.is('active open'))
    {
        $('#leftsidebar .list li').removeClass('active open').removeData("top");
        $this.addClass('active open').data("top", $this.offset().top);
    }
});

document.createElement('section');
var duration = '500',
	easing = 'swing';
</script>
@yield('js')
</body>

</html>