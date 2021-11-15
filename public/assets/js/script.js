// Fixed Header
window.onscroll = function() {
	const docScrollTop = document.documentElement.scrollTop;
	if (window.innerWidth>991) {
		if (docScrollTop>100) {
			document.querySelector(".navbar-login").classList.add("fixed");
		}
		else{
			document.querySelector(".navbar-login").classList.remove("fixed");
		}
	}
}

// Navbar Links
const navbar = document.querySelector(".navbar");
a=navbar.querySelectorAll("a");

a.forEach(function(element) {
	element.addEventListener("click",function() {
		for(let i=0;i<a.length;i++){
			a[i].classList.remove("active");
		}
		this.classList.add("active");

		// Close navbar when click on link
		document.querySelector(".navbar").classList.toggle("show");
	});
});


// Hamburger Menu
const hamBurger = document.querySelector(".ham-burger");

hamBurger.addEventListener("click",function() {
	document.querySelector(".navbar").classList.toggle("show");
});

// Pricing Plans Page Script
const pricingBtns = document.querySelector(".pricing-plans-desig-btns");
a=pricingBtns.querySelectorAll("button");

a.forEach(function(element) {
	element.addEventListener("click",function() {
		for(let i=0;i<a.length;i++){
			a[i].classList.remove("active");
		}
		this.classList.add("active");
	});
});