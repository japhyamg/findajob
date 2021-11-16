@extends('layouts.app')

@section('content')
<!-- Pricing plans header section starts -->
<section class="pricing-plans-header">
	<div class="pricing-plans-heading"><p>pricing plans</p></div>
	<div class="pricing-plans-description"><p>Start to plan your work selecting the most appropriate budget.</p></div>
</section>
<!-- pricing plans header section ends -->

<!-- Pricing plans section starts -->
<section class="pricing-plans">
	<div class="pricing-plans-head"><p>pricing plans</p></div>
	<div class="pricing-plans-desc"><p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis. Erat eget vitae<br /> malesuada, tortor tincidunt porta lorem lectus.</p></div>
	<div class="pricing-plans-desig-btns">
		<button class="active">job seeker</button>
		<button>employer</button>
	</div>
	<div class="pricing-plans-toggle-btns">
		<div class="switch-field">
      <input type="radio" id="switch_left" name="switch_2" value="yes" onclick="myFunction()" checked/>
      <label for="switch_left">Monthly</label>
      <input type="radio" id="switch_right" name="switch_2" onclick="myFunction()" value="no" />
      <label for="switch_right">Booster</label>
    </div>
	</div>
	<div class="pricing-plans-cards" id="monthly">
		<div class="pricing-plans-cards-items">
			<div class="pricing-plans-cards-item">
				<div class="pricing-plans-cards-item-head">
					<p>free</p>
				</div>
				<div class="pricing-plans-cards-item-head-img">
					<img src="img/brief-case.png" alt="Brief Case" />
				</div>
				<div class="pricing-plans-cards-item-desc">
					<p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
				</div>
				<div class="pricing-plans-cards-item-features">
					<ul>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
					</ul>
				</div>
				<br>
				<div class="pricing-plans-cards-item-free-btn">
					<button>get started</button>
				</div>
			</div>
			<div class="pricing-plans-cards-item bg-red">
				<div class="pricing-plans-cards-item-head">
					<p>premium</p>
				</div>
				<div class="pricing-plans-cards-item-head-img">
					<img src="img/person.png" alt="Person" />
				</div>
				<div class="pricing-plans-cards-item-desc">
					<p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
				</div>
				<div class="pricing-plans-cards-item-features">
					<ul>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
					</ul>
				</div>
				<div class="pricing-plans-cards-item-free-btn">
					<button>get started</button>
				</div>
			</div>
		</div>
	</div>
	<div class="pricing-plans-cards" id="booster">
		<div class="pricing-plans-cards-items">
			<div class="pricing-plans-cards-item">
				<div class="pricing-plans-cards-item-head">
					<p>booster</p>
				</div>
				<div class="pricing-plans-cards-item-head-img">
					<img src="img/rocket.png" alt="Rocket" />
				</div>
				<div class="pricing-plans-cards-item-desc">
					<p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
				</div>
				<div class="pricing-plans-cards-item-features">
					<ul>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
						<li>Lorem ipsum dolor sit amet</li>
						<li>Lorem ipsum dolor sit</li>
					</ul>
				</div>
				<br>
				<div class="pricing-plans-cards-item-free-btn">
					<button>boost</button>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- pricing plans section ends -->
@endsection

@push('scripts')

@endpush