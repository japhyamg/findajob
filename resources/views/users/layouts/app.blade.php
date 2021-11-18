<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
  @toastr_css
</head>
<body>
<div class="wrapper">
	<!-- sidebar Starts -->
	<div class="sidebar">
		<div class="sidebar-logo">
			<a href="{{route('index')}}">
				<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
			</a>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="{{route('user.dashboard')}}" class="@if(Route::is('user.dashboard')) active @endif"><img src="{{asset('assets/img/dash-icon-1.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-1-1.png')}}" class="light" />dashboards</a></li>
				<li><a href="{{route('user.profile')}}" class="@if(Route::is('user.profile')) active @endif"><img src="{{asset('assets/img/dash-icon-2.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-2-2.png')}}" class="light" />profile</a></li>
				<li>
					<a href="#" class="dropdown-btn @if(Route::is('user.find') || Route::is('user.savedjobs') || Route::is('user.applications')) active @endif" id="dropdown-btn"><img src="{{asset('assets/img/dash-icon-3.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-3-3.png')}}" class="light" />job <i class="fa fa-angle-down angle-down"></i></a></li>
				</li>
				<li class="job-dropdown find"><a href="{{route('user.find')}}" class="@if(Route::is('user.find')) active @endif"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />find a job</a></li>
				<li class="job-dropdown find"><a href="{{route('user.applications')}}" class="@if(Route::is('user.applications')) active @endif"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />applications</a></li>
				<li class="job-dropdown find"><a href="{{route('user.savedjobs')}}"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />saved jobs</a></li>
				<li>
					<a href="companies.html" class="dropdown-btn"><img src="{{asset('assets/img/dash-icon-4.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-4-4.png')}}" class="light" />companies</a></li>
				</li>
				<li>
					<a href="#" class="dropdown-btn" id="dropdown-btn1"><img src="{{asset('assets/img/dash-icon-3.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-3-3.png')}}" class="light" />my resume <i class="fa fa-angle-down angle-down"></i></a></li>
				</li>
				<li class="job-dropdown resume"><a href="upload-resume.html"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />upload resume</a></li>
				<li class="job-dropdown resume"><a href="video-resume.html"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />video resume</a></li>
				<li><a href="job-centers.html"><img src="{{asset('assets/img/dash-icon-6.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-6-6.png')}}" class="light" />job centers</a></li>
				<li><a href="transactions.html"><img src="{{asset('assets/img/dash-icon-7.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-7-7.png')}}" class="light" />transactions</a></li>
				<li><a href="interviews.html"><img src="{{asset('assets/img/dash-icon-8.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-8-8.png')}}" class="light" />interviews</a></li>
				<li>
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('logout') }}" role="button"><i class="fa fa-sign-out"></i>logout</a></a>
                    <form style="display: none;" action="{{ route('logout') }}" id="logout-form" method="post">
                        @csrf
                    </form>
                    {{-- <a href="logout.html"><i class="fa fa-sign-out"></i>logout</a></li> --}}
			</ul>
		</div>
	</div>
	<!-- sidebar Ends -->

    <!-- Main Content Starts -->
	<div class="main">
		<!-- Header Starts -->
		<div class="header">
			<div class="page-name">
				Dashboard
			</div>
			<div class="links">
				<ul>
					<li>
						<a href="#"><img src="{{asset('assets/img/search-1.png')}}" alt="Search icon"></a>
					</li>
					<li class="notify-icon" >
						<img src="{{asset('assets/img/bell-icon.png')}}" alt="Bell Icon" />
							<span>0</span>
						</i>
					</li>
					<li><span>{{ Auth::user()->full_name}}</span><img src="{{auth()->user()->profile_image}}" class="img-round" width="38px" height="38px" alt="Profile Pic"></li>
				</ul>
			</div>
			<div class="toggle-btn">
				<i onclick="openNav()" class="fa fa-bars"></i>
			</div>
		</div>
		<!-- Header Ends -->
        @yield('content')
		{{-- <div class="main-content">
		</div> --}}
	</div>
	<!-- Main Content Ends -->

</div>
<!-- Mobile Sidebar Starts -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="sidenav-img">
  	<img src="{{asset('assets/img/profile-2.png')}}">
  </div>
  <ul>
  	<li><a href="dashboard.html"><img src="{{asset('assets/img/dash-icon-1.png')}}" />dashboard</a></li>
  	<li><a href="profile.html"><img src="{{asset('assets/img/dash-icon-2.png')}}" />profile</a></li>
  	<li><a href="#"><img src="{{asset('assets/img/dash-icon-3.png')}}" />job</a></li>
  	<li><a href="#"><img src="{{asset('assets/img/dash-icon-4.png')}}" />companies</a></li>
  	<li><a href="#"><img src="{{asset('assets/img/dash-icon-5.png')}}" />my resume</a></li>
  	<li><a href="job-centers.html"><img src="{{asset('assets/img/dash-icon-6.png')}}" />job centers</a></li>
  	<li><a href="transactions.html"><img src="{{asset('assets/img/dash-icon-7.png')}}" />transactions</a></li>
  	<li><a href="interviews.html"><img src="{{asset('assets/img/dash-icon-8.png')}}" />interviews</a></li>
  	<li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('logout') }}" role="button"><img src="{{asset('assets/img/dash-icon-9.png')}}" />logout</a>
        <form style="display: none;" action="{{ route('logout') }}" id="logout-form" method="post">
            @csrf
        </form>
          {{-- <a href="logout.html"><img src="{{asset('assets/img/dash-icon-9.png')}}" />logout</a></li> --}}
  </ul>
</div>
<!-- Mobile Sidebar Ends -->

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
	<script src="{{asset('assets/js/dashboard.js')}}"></script>
	<!-- Include jQuery -->
  <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
   <script type="text/javascript">
  	$(document).ready(function(){
  	  $("#dropdown-btn").click(function(){
  	    $(".job-dropdown.find").toggle();
  	  });
  	  $("#dropdown-btn1").click(function(){
  	    $(".job-dropdown.resume").toggle();
  	  });
  	});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @toastr_js
  @toastr_render
  @stack('scripts')
</body>
</html>
