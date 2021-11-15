@extends('layouts.app')

@section('content')

<section class="job-seeker">
	<div class="container">
		<div class="row">
			<div class="job-seeker-slider">
				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose.png')}}" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose.png')}}" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose.png')}}" style="width:100%">
				</div>
				<br>
				<div style="text-align:center">
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				</div>
			</div>
			<div class="job-seeker-form">
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="job-seeker-form-head">
                        <p>Verify Your Email Address</p>
                    </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <div class="form-control">
                        <input type="submit" value="click here to request another" />
                    </div>
                </form>
				<p class="have-text">Don't have an account?</p>
				<p class="signup-btn"><a href="{{route('register')}}">Sign Up</a></p>
			</div>
		</div>
	</div>
</section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
