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
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	@toastr_css
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
<!-- Start Header -->
<header>
	<div class="container">
		<div class="row logo-bonus">
			<div class="logo">
				<a href="{{route('index')}}">
					<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
				</a>
			</div>
			<div class="bonus">
				<img src="{{asset('assets/img/bonus.png')}}" alt="Logo" />
			</div>
		</div>
		<div class="row navbar-login">
			<div class="brand-name">
				<a href="{{route('index')}}" class="logo">
					<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
				</a>
			</div>
			<div class="navbar">
				<ul>
					<li><a href="{{route('index')}}" class="active"><i class="fa fa-home"></i></a></li>
					{{-- <li><a href="{{route('job-centers')}}">Job centers</a></li> --}}
					<li><a href="{{route('register')}}">Job centers</a></li>
					<li><a href="{{route('pricing-plans')}}">Pricing plans</a></li>
					<li><a href="{{route('help')}}">Help</a></li>
					<li><a href="{{route('contact-us')}}">Contact Us</a></li>
					<li class="login-signup-sm"><a href="{{route('get-started')}}">Login / Signup</a></li>
				</ul>
			</div>
			<div class="ham-burger">
				<i class="fa fa-bars"></i>
			</div>
			<div class="login-signup">
				@auth()
					<a href="{{route('user.dashboard')}}"><span>Dashboard</span></a>
				@endauth
                @auth('employer')
                <a href="{{route('employer.dashboard')}}"><span>Dashboard</span></a>
				@endauth
                @guest
                    <a href="{{route('get-started')}}"><img src="{{asset('assets/img/user.png')}}"> <span>Login / Signup</span></a>
                @endguest
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
					<li><a href="{{route('about-us')}}">about us</a></li>
					<li><a href="{{route('terms')}}">terms of services</a></li>
					<li><a href="{{route('privacy')}}">privacy</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>faj</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="{{route('register')}}">job search</a></li>
					<li><a href="{{route('pricing-plans')}}">pricing plans</a></li>
					<li><a href="{{route('employers')}}">employers</a></li>
					<li><a href="{{route('job-seekers')}}">job seekers</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>resources</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="{{route('self-employed')}}">become self employed</a></li>
					<li><a href="{{route('loop-vc')}}">loop VC</a></li>
					<li><a href="{{route('nysc')}}">NYSC</a></li>
					<li><a href="{{route('ayeen')}}">ayeen</a></li>
					<li><a href="{{route('nde')}}">NDE</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>job seakers</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="{{route('register')}}">CV creator</a></li>
					<li><a href="{{route('register')}}">job centers</a></li>
					<li><a href="{{route('register')}}">job seeker videos</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-item">
			<div class="footer-item-head">
				<p>help</p>
			</div>
			<div class="footer-item-links">
				<ul>
					<li><a href="{{route('faqs')}}">FAQs</a></li>
					<li><a href="{{route('contact-us')}}">contact us</a></li>
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
	<script src="{{asset('js/app.js')}}"></script>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @toastr_js
  @toastr_render
  @stack('scripts')
</body>
</html>
