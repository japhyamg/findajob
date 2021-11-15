<!DOCTYPE html>
<html>
<head>
  <title>FAJ - Sign Up</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<section class="login-signup2">
	<div class="boxes-container">
		<div class="boxes-items">
			<div class="boxes-item" onclick="location.href='{{route('register')}}'">
				<div class="boxes-item-img">
					<img src="{{asset('assets/img/user1.png')}}" alt="User" />
				</div>
				<div class="boxes-item-title">
					<p>Job Seeker</p>
				</div>
				<div class="boxes-item-desc">
					<p>Are you looking for your dream job? Create a career profile with FindAJob </p>
				</div>
			</div>
			<div class="boxes-item" onclick="location.href='{{route('employer.register')}}'">
				<div class="boxes-item-img">
					<img src="{{asset('assets/img/brief-case.png')}}" alt="Brief case" />
				</div>
				<div class="boxes-item-title">
					<p>employer</p>
				</div>
				<div class="boxes-item-desc">
					<p>Are you looking for quality candidates? </p>
				</div>
			</div>
		</div>
	</div>
</section>

    <script src="{{asset('assets/js/script.js')}}"></script>
	<!-- Include jQuery -->
	<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
</body>
</html>