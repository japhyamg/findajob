@extends('layouts.app')

@section('content')
<!-- Help header section starts -->
<section class="pricing-plans-header">
	<div class="pricing-plans-heading"><p>job search</p></div>
	<div class="pricing-plans-description"><p>Start to plan your work selecting the most appropriate budget.</p></div>
</section>
<!-- Help header section ends -->

<!-- Help Accordion Starts -->
<section class="help-accordion">
	<div class="container">
		<button class="accordion">Lorem Ipsum dolor sit amet</button>
		<div class="panel">
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		</div>

		<button class="accordion">Lorem Ipsum dolor sit amet</button>
		<div class="panel">
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		</div>

		<button class="accordion">Lorem Ipsum dolor sit amet</button>
		<div class="panel">
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi commodi facere odit alias velit ducimus accusantium maiores, mollitia vitae eum quae maxime labore, quia non consequatur culpa similique, molestiae dicta.</p>
		</div>
	</div>
</section>
<!-- Help Accordion Ends -->
@endsection

@push('scripts')
<script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
</script>
@endpush
