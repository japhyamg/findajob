<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/dashboard2.css')}}">
  @toastr_css
  <style>
    .sidebar-menu ul{
        padding-left: 0;
    }
    .links ul{
        padding-left: 0;
        margin-bottom: 0;
    }
</style>
</head>
<body>
<div class="wrapper">
	<!-- sidebar Starts -->
	<div class="sidebar">
		<div class="sidebar-logo">
			<a href="{{route('admin.dashboard')}}">
				<img src="{{asset('assets/img/logo.png')}}" alt="Logo" />
			</a>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="{{route('admin.dashboard')}}" class="@if(Route::is('admin.dashboard')) active @endif"><img src="{{asset('assets/img/dash-icon-1.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-1-1.png')}}" class="light" />dashboards</a></li>
				<li>
					<a href="#" class="dropdown-btn @if(Route::is('admin.manage-user') || Route::is('admin.manage-employer') || Route::is('admin.manage-admin')) active @endif" id="dropdown-btn"><img src="{{asset('assets/img/dash-icon-2.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-2-2.png')}}" class="light" />Manage users <i class="fa fa-angle-down angle-down"></i></a></li>
				</li>
				<li class="job-dropdown users"><a href="{{route('admin.manage-user')}}" class="@if(Route::is('admin.manage-user')) active @endif"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />job seeker</a></li>
				<li class="job-dropdown users"><a href="{{route('admin.manage-employer')}}" class="@if(Route::is('admin.manage-employer')) active @endif"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />Employers</a></li>
				<li class="job-dropdown users"><a href="{{route('admin.manage-admin')}}" class="@if(Route::is('admin.manage-admin')) active @endif"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />Administrator </a></li>

				<li><a href="post-job.html" class="dropdown-btn"><img src="{{asset('assets/img/dash-icon-3.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-3-3.png')}}" class="light" />manage jobs</a></li>
				<!-- <li><a href="search.html"><img src="{{asset('assets/img/dash-icon-11.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-11-11.png')}}" class="light" />search</a></li>
				<li><a href="payments.html"><img src="{{asset('assets/img/dash-icon-12.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-12-12.png')}}" class="light" />payments</a></li> -->
				<li><a href="{{route('admin.manage-industry')}}" class="@if(Route::is('admin.manage-industry')) active @endif"><img src="{{asset('assets/img/dash-icon-12.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-12-12.png')}}" class="light" />manage industry</a></li>
				<li><a href="{{route('admin.manage-country')}}" class="@if(Route::is('admin.manage-country')) active @endif"><img src="{{asset('assets/img/dash-icon-12.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-12-12.png')}}" class="light" />manage country</a></li>
				<li><a href="{{route('admin.manage-location')}}" class="@if(Route::is('admin.manage-location')) active @endif"><img src="{{asset('assets/img/dash-icon-12.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-12-12.png')}}" class="light" />manage location</a></li>
				<li><a href="{{route('admin.job-centers')}}" class="@if(Route::is('admin.job-centers')) active @endif"><img src="{{asset('assets/img/dash-icon-3.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-3-3.png')}}" class="light" />job centers</a></li>
				{{-- <li><a href="applications.html"><img src="{{asset('assets/img/dash-icon-5.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-5-5.png')}}" class="light" />applications</a></li>
				<li><a href="shortlisted-resume.html"><img src="{{asset('assets/img/dash-icon-3.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-3-3.png')}}" class="light" />shortlisted resume</a></li>
				<li><a href="messages.html"><img src="{{asset('assets/img/dash-icon-14.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-14-14.png')}}" class="light" />messages</a></li> --}}
				<li>
					<a href="#" class="dropdown-btn" id="dropdown-btn1"><img src="{{asset('assets/img/dash-icon-2.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-2-2.png')}}" class="light" />settings <i class="fa fa-angle-down angle-down"></i></a></li>
				</li>
				<li class="job-dropdown settings"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />site settings</a></li>
				<li class="job-dropdown settings"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />parsehub</a></li>
				<li>
					<a href="#" class="dropdown-btn" id="dropdown-btn2"><img src="{{asset('assets/img/dash-icon-2.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-2-2.png')}}" class="light" />cms <i class="fa fa-angle-down angle-down"></i></a></li>
				</li>
				<li class="job-dropdown cms"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />about us</a></li>
				<li class="job-dropdown cms"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />NYSC</a></li>
				<li class="job-dropdown cms"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />terms of service</a></li>
				<li class="job-dropdown cms"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />privacy</a></li>
				<li class="job-dropdown cms"><a href="#"><img src="{{asset('assets/img/dash-icon-10.png')}}" class="dark" /><img src="{{asset('assets/img/dash-icon-10-10.png')}}" class="light" />FAQs</a></li>
				<li>
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('admin.logout') }}" role="button"><i class="fa fa-sign-out"></i>logout</a>
                    <form style="display: none;" action="{{ route('admin.logout') }}" id="logout-form" method="post">
                        @csrf
                    </form>
                </li>
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
					<li><span>Michael Adewale</span><img src="{{asset('assets/img/profile.png')}}" alt="Profile Pic"></li>
				</ul>
			</div>
			<div class="toggle-btn">
				<i onclick="openNav()" class="fa fa-bars"></i>
			</div>
		</div>
		<!-- Header Ends -->
		<div class="main-content">
			@yield('content')
		</div>
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
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="{{ route('admin.logout') }}" role="button"><img src="{{asset('assets/img/dash-icon-9.png')}}" />logout</a>
        <form style="display: none;" action="{{ route('admin.logout') }}" id="logout-form" method="post">
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
	<script src="{{asset('assets/js/dashboard.js')}}"></script>
	<!-- Include jQuery -->
  <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  	  $("#dropdown-btn").click(function(){
  	    $(".job-dropdown.users").toggle();
  	  });
  	  $("#dropdown-btn1").click(function(){
  	    $(".job-dropdown.settings").toggle();
  	  });
  	  $("#dropdown-btn2").click(function(){
  	    $(".job-dropdown.cms").toggle();
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
