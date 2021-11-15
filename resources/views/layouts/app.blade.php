<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
<!-- Start Header -->
<header>
	<div class="container">
		<div class="row logo-bonus">
			<div class="logo">
				<a href="index.html">
					<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
				</a>
			</div>
			<div class="bonus">
				<img src="{{asset('assets/img/bonus.png')}}" alt="Logo" />
			</div>
		</div>
		<div class="row navbar-login">
			<div class="brand-name">
				<a href="#" class="logo">
					<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
				</a>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="index.html" class="active"><i class="fa fa-home"></i></a></li>
					<li><a href="job-centers.html">Job centers</a></li>
					<li><a href="pricing-plans.html">Pricing plans</a></li>
					<li><a href="help.html">Help</a></li>
					<li><a href="contact-us.html">Contact Us</a></li>
					<li class="login-signup-sm"><a href="{{route('get-started')}}">Login / Signup</a></li>
				</ul>
			</div>
			<div class="ham-burger">
				<i class="fa fa-bars"></i>
			</div>
			<div class="login-signup">
				<a href="{{route('get-started')}}"><img src="{{asset('assets/img/user.png')}}"> <span>Login / Signup</span></a>
			</div>
		</div>
	</div>
</header>
<!-- End Header -->

@yield('content')

<!-- Footer Section Starts -->
<footer class="footer">
	<div class="footer-bottom-img1">
		<img src="{{asset('assets/img/footer-bg.png')}}" alt="Footer BG" />
	</div>
	<div class="footer-bottom-img2">
		<img src="{{asset('assets/img/footer-bg1.png')}}" alt="Footer BG " />
	</div>
	<div class="footer-items">
		<div class="footer-item">
			<div class="footer-item-head">
				<p>company</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="about-us.html">about us</a></li>
					<li><a href="terms.html">terms of services</a></li>
					<li><a href="privacy.html">privacy</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>faj</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="job-search.html">job search</a></li>
					<li><a href="pricing-plans.html">price plans</a></li>
					<li><a href="employers.html">employers</a></li>
					<li><a href="job-seekers.html">job seekers</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>resources</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="self-employed.html">become self employed</a></li>
					<li><a href="loop-vc.html">loop VC</a></li>
					<li><a href="nysc.html">NYSC</a></li>
					<li><a href="ayeen.html">ayeen</a></li>
					<li><a href="nde.html">NDE</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>job seakers</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="cv-creator.html">CV creator</a></li>
					<li><a href="job-centers.html">job centers</a></li>
					<li><a href="job-seeker-videos.html">job seeker videos</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>help</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="faq.html">FAQs</a></li>
					<li><a href="contact-us.html">contact us</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="app-btns">
		<a href="#"><img src="{{asset('assets/img/app.png')}}" alt="App Store" /></a>
		<a href="#"><img src="{{asset('assets/img/play.png')}}" alt="Play Store" /></a>
	</div>
	<div class="copyright">
		<p>Copyright 2021 FindAJob, LLC</p>
	</div>
</footer>	
<!-- Footer Section Ends	 -->
	<script src="{{asset('assets/js/script.js')}}"></script>
	<!-- Include jQuery -->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>

    <!-- Include Multislider -->
    <script src="{{asset('assets/js/multislider.min.js')}}"></script>

    <!-- Initialize element with Multislider -->
    <script>
    $('#employers-slider').multislider({
        interval: 4000,
        slideAll: true,
        duration: 1500
    });
    </script>

    @stack('scripts')
</body>
</html>