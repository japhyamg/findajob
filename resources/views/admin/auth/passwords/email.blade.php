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
                <form method="POST" action="{{ route('admin.password.email') }}">
                    @csrf
                    <div class="job-seeker-form-head">
                        <p>{{ __('Reset Password') }} | Admin</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-control">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-control">
                        <input type="submit" value="{{ __('Send Password Reset Link') }}" />
                    </div>
                </form>
			</div>
		</div>
	</div>
</section>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('scripts')
<script type="text/javascript">
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
@endpush
