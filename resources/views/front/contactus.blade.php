@extends('layouts.app')

@section('content')
<!-- Help header section starts -->
<section class="pricing-plans-header">
	<div class="pricing-plans-heading"><p>contact us</p></div>
	<div class="pricing-plans-description"><p>Start to plan your work selecting the most appropriate budget.</p></div>
</section>
<!-- Help header section ends -->

<section class="contact-us">
	<div class="container">
		<div class="row">
			<div class="contact-us-text">
				<div class="contact-us-text-head">contact us</div>
				<div class="contact-us-text-desc">FAJ Support is Available Free of Charge</div>
				<div class="mobile-email">
					<p>Mobile: <span>+234 8101098765</span></p>
					<p>E-mail: &nbsp;&nbsp;<span>Info@faj.com.ng</span></p>
				</div>
				<div class="timing">9:00am to 4:00pm<br>Monday to Friday</div>
			</div>
			<div class="contact-us-form">
				<form>
					<div class="half-form-control">
						<input type="text" name="name" placeholder="Name" />
						<input type="text" name="email" placeholder="Email" />
					</div>
					<div class="form-control">
						<input type="text" name="name" placeholder="Name" />
					</div>
					<div class="form-control">
						<textarea rows="5">Message</textarea>
					</div>
					<div class="send-btn">
						<input type="submit" name="submit" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

@push('scripts')

@endpush