@extends('layouts.app')

@section('content')
<section class="job-seeker-signup">
	<div class="container">
		<div class="row">
			<div class="job-seeker-slider">
				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose2.png')}}" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose2.png')}}" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <img src="{{asset('assets/img/pose2.png')}}" style="width:100%">
				</div>
				<br>
				<div style="text-align:center">
				  <span class="dot"></span>
				  <span class="dot"></span>
				  <span class="dot"></span>
				</div>
			</div>
			<div class="job-seeker-form">
                <form method="POST" action="{{ route('employer.register') }}">
                    @csrf
                    <div class="job-seeker-form-head">
                        <p>create employer's account</p>
                    </div>
                    <div class="job-seeker-form-sub-head">
                        <p>Take the first step in finding that special talent</p>
                    </div>
                    @if($errors->any())
                        <div style="position:relative;padding:1rem 1rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem; color:#842029;background-color:#f8d7da;border-color:#f5c2c7;text-align:center!important;">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-control">
                        <input type="text" name="firstname" placeholder="First Name">
                        {{-- @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <input type="text" name="lastname" placeholder="Last Name">
                        {{-- @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-control">
                        <input type="email" name="email" placeholder="Email">
                        {{-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <input type="password" name="password" placeholder="Password">
                        {{-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-control">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="form-control">
                        <select name="position">
                            <option>Position in Company</option>
                            <option>Position 1</option>
                            <option>Position 2</option>
                            <option>Position 3</option>
                            <option>Position 4</option>
                        </select>
                        {{-- @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <select name="sex">
                            <option>Sex</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        {{-- @error('sex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-control">
                        <input type="text" name="nationality" placeholder="Nationality">
                        {{-- @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <input type="number" name="phone" placeholder="Phone Number">
                        {{-- @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-control">
                        <input type="text" name="companyname" placeholder="Company Name">
                        {{-- @error('companyname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                        <select name="industry">
                            <option value="">Select Industry</option>
                            @foreach ($industries as $industry)
                                <option value="{{$industry->slug}}">{{$industry->name}}</option>
                            @endforeach
                        </select>
                        {{-- @error('industry')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>
                    <p class="have-text">By clicking "Submit", you agree to our <b><a href="#">TERMS & CONDITIONS</a></b> and <b><a href="#">PRIVACY POLICY</a></b></p>
                    <div class="form-control">
                        <input type="submit" value="Sign Up" />
                    </div>
                </form>

                <p class="have-text">Have an account already?</p>
				<p class="signup-btn" style="text-align:center"><a href="{{route('employer.login')}}">Login</a></p>
			</div>
		</div>
	</div>
</section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
