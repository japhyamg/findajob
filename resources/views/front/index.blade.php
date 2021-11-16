@extends('layouts.app')

@section('content')
    <!-- Home Section Starts -->
<section class="home">
	<div class="container">
		<div class="row"> 
			<div class="home-text">
				<div class="home-text-head">The Easiest way</div>
				<div class="home-main-text">
					To get your new job <img src="{{asset('assets/img/users.png')}}" alt="Users" /> 
				</div>
				<div class="home-text-desc">
					Learn the basics and fundamentals of Adobe Photoshop CC, including how to open images, work with the interface, save work, and more. 
				</div>
				<div class="home-btns">
					<a href="#" class="btn-red">Upload your cv</a> <span>or</span> <a href="#" class="btn-orange">post a job</a>
				</div>
			</div>
			<div class="home-img">
				<img src="{{asset('assets/img/hero.png')}}" alt="Hero Image" />
			</div>
		</div>
	</div>
</section>
<!-- Home Section Ends -->

<!-- SEO Section Starts -->
<section class="seo">
	<div class="row">
		<div class="container">
			<div class="seo-form">
				<form>
					<div class="form-group">
						<input type="text" name="keyword" />
						<label>Search keywords e.g web design</label>
					</div>
					<div class="form-group-2">
						<input type="text" name="sms" />
						<label>Filter by specialisms e.g. developer, designer</label>
					</div>
					<div class="form-group-2">
						<input type="text" name="sms" />
						<label>Zip</label>
					</div>
					<div class="form-group-3">
						<input type="submit" name="submit" />
						<label>+ Advance search</label>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- SEO Section Ends -->

<!-- Jobs Section Starts -->
<section class="jobs">
	<div class="container">
		<div class="row">
			<div class="sidebar">
				<div class="categories">
					<div class="sidebar-head">
						<div class="head-text">location</div>
						<div class="head-btn"><a href="#">industory</a></div>
					</div>
					<div class="sidebar-search">
						<form>
							<input type="search" name="search" placeholder="Search">
						</form>
						<div class="search-icon">
							<img src="{{asset('assets/img/search.png')}}" alt="Search" />
						</div>
					</div>
					<div class="sidebar-categories">
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-1.png')}}" alt="Emoji" /><span>construction</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-2.png')}}" alt="Emoji" /><span>law & compliance</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-3.png')}}" alt="Emoji" /><span>banking finance & insurance</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-4.png')}}" alt="Emoji" /><span>real estate</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-5.png')}}" alt="Emoji" /><span>advertising media and comm.</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-6.png')}}" alt="Emoji" /><span>hospitality & hotel</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-7.png')}}" alt="Emoji" /><span>agriculture, fishing & forestory</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-8.png')}}" alt="Emoji" /><span>education</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-9.png')}}" alt="Emoji" /><span>inforcement & security</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
						<div class="category-item">
							<div class="category-name">
								<a href="#"><img src="{{asset('assets/img/emoji-10.png')}}" alt="Emoji" /><span>shiping & logistics</span></a>
							</div>
							<div class="no-of-jobs">2694</div>
						</div>
					</div>
				</div>
				<div class="ad-banner">
					<p>banner ad</p>
					<p>vertical rectangle</p>
					<p>240x400</p>
				</div>
			</div>
			<div class="main-jobs">
				<div class="main-jobs-head">
					<div class="main-jobs-head-text">
						<p>latest <span>jobs</span></p>
					</div>
					<div class="main-jobs-head-btn"><a href="#">get job alerts</a></div>
				</div>
				@if($jobs)
					@foreach($jobs as $job)
						<div class="main-jobs-item" onclick="show()">
							<div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
							<div class="main-jobs-item-head-btn">
								<a href="#" class="orange">{{$job->level}}</a>
								<a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
							</div>
							<div class="main-jobs-item-head">
								<div class="main-jobs-item-head-img">
									<img src="{{asset('assets/img/d.png')}}" alt="D" />
								</div>
								<div class="main-jobs-item-head-text">
									<p class="project-title">{{$job->title}}</p>
									<p class="project-category">{{$job->industry}}, {{$job->location}}</p>
								</div>
							</div>
							<div class="main-jobs-item-main">
								<p class="desc">{{$job->summary}}</p>
								<p class="btns"><a href="#" class="orange">{{$job->level}}</a>
								<a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a></p>
							</div>
							<div class="main-jobs-item-footer">
								<div class="main-jobs-item-footer-item">
									<img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>{{$job->location}}</span>
								</div>
								<div class="main-jobs-item-footer-item">
									<img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>{{$job->monthly_salary}}</span>
								</div>
								<div class="main-jobs-item-footer-item">
									<img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>{{$job->created_at->diffForHumans()}}</span>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				<!-- <div class="main-jobs-item">
					<div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
					<div class="main-jobs-item-head-btn">
						<a href="#" class="orange">part time</a>
						<a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
					</div>
					<div class="main-jobs-item-head">
						<div class="main-jobs-item-head-img">
							<img src="{{asset('assets/img/d.png')}}" alt="D" />
						</div>
						<div class="main-jobs-item-head-text">
							<p class="project-title">PROJECT ESCORT</p>
							<p class="project-category">Gravure Printing, Lagos</p>
						</div>
					</div>
					<div class="main-jobs-item-main">
						<p class="desc">3 Project Escort jobs currently available at HM Prison Pentonville. Starting ASAP.</p>
					</div>
					<div class="main-jobs-item-footer">
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>Lagos</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>35K - 45K</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>2 hours ago</span>
						</div>
					</div>
				</div>
				<div class="main-jobs-item">
					<div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
					<div class="main-jobs-item-head-btn">
						<a href="#" class="orange">part time</a>
						<a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
					</div>
					<div class="main-jobs-item-head">
						<div class="main-jobs-item-head-img">
							<img src="{{asset('assets/img/d.png')}}" alt="D" />
						</div>
						<div class="main-jobs-item-head-text">
							<p class="project-title">PROJECT ESCORT</p>
							<p class="project-category">Gravure Printing, Lagos</p>
						</div>
					</div>
					<div class="main-jobs-item-main">
						<p class="desc">3 Project Escort jobs currently available at HM Prison Pentonville. Starting ASAP.</p>
					</div>
					<div class="main-jobs-item-footer">
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>Lagos</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>35K - 45K</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>2 hours ago</span>
						</div>
					</div>
				</div>
				<div class="main-jobs-item">
					<div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
					<div class="main-jobs-item-head-btn">
						<a href="#" class="orange">part time</a>
						<a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
					</div>
					<div class="main-jobs-item-head">
						<div class="main-jobs-item-head-img">
							<img src="{{asset('assets/img/d.png')}}" alt="D" />
						</div>
						<div class="main-jobs-item-head-text">
							<p class="project-title">PROJECT ESCORT</p>
							<p class="project-category">Gravure Printing, Lagos</p>
						</div>
					</div>
					<div class="main-jobs-item-main">
						<p class="desc">3 Project Escort jobs currently available at HM Prison Pentonville. Starting ASAP.</p>
					</div>
					<div class="main-jobs-item-footer">
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>Lagos</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>35K - 45K</span>
						</div>
						<div class="main-jobs-item-footer-item">
							<img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>2 hours ago</span>
						</div>
					</div>
				</div> -->
				<div class="click-more-jobs-btn">
					<a href="#">click for more</a>
				</div>
				<div class="more-jobs-img">
					<img src="{{asset('assets/img/jobs-img.png')}}" alt="More Jobs Img" />
				</div>
			</div>
			<div class="sidebar-2">
				<div class="self-employ sidebar-2-item">
					<div class="content">
						<p>do you<br>want to be <br>self employed?</p>
						<p><a href="#">click here</a></p>
					</div>
				</div>
				<div class="have-business sidebar-2-item">
					<div class="have-business-img">
						<img src="{{asset('assets/img/bulb.png')}}" alt="Bulb" />
					</div>
					<div class="have-business-text">
						<p class="text-1">have a<br> business ideas?</p>
						<p class="text-2">Connect with LoopVC</p>
					</div>
				</div>
				<div class="nysc sidebar-2-item" >
					<img src="{{asset('assets/img/nysc.png')}}" alt="NYSC" />
				</div>
				<div class="ayeen sidebar-2-item">
					<img src="{{asset('assets/img/ayeen.png')}}" alt="Ayeen" />
				</div>
				<div class="nde sidebar-2-item">
					<img src="{{asset('assets/img/nde.png')}}" alt="NDE" />
				</div>
				<div class="ad-banner sidebar-2-item">
					<p>banner ad</p>
					<p>vertical rectangle</p>
					<p>240x400</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Jobs Section Ends	 -->

<!-- Feature Employres Section Starts -->
<section class="employers">
	<div class="container">
		<div class="employers-head">
			<p class="employers-head-text">Featured <span>Employers</span></p>
			<p class="employers-head-text1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			<p class="employers-head-text1">when an unknown printer took a galley of type and scrambled it.</p>
		</div>
		<div id="employers-slider">
		   <div class="MS-content">
		       <div class="item">
		           <img src="{{asset('assets/img/kpmg.png')}}" alt="KPMG" />
		       </div>
		       <div class="item">
		           <img src="{{asset('assets/img/uba.png')}}" alt="UBA" />
		       </div>
		       <div class="item">
		           <img src="{{asset('assets/img/ivm.png')}}" alt="IVM" />
		       </div>
		       <div class="item">
		           <img src="{{asset('assets/img/access.png')}}" alt="Access" />
		       </div>
		       <div class="item">
		           <img src="{{asset('assets/img/total.png')}}" alt="Total" />
		       </div>
		   </div>
		   <div class="MS-controls">
		       <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
		       <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
		   </div>
		</div>
	</div>
</section>
<!-- Feature Employres Section Ends -->
@endsection

@push('scripts')
<script>
    function show(){
		axios.get(`{{route('show')}}`)
                .then(function (response) {
                    // handle success
                    var data = response.data
					// if(data == 'true'){
					// 	location.href = '{{route('user.find')}}'
					// }else{
					// 	location.href = '{{route('get-started')}}'
					// }
                    console.log(data);

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
				});            
    }

    function save(slug) {
        var c = slug.split('/')
        c = c[c.length - 1];

        axios.post(`${slug}`)
            .then(function (response) {
                // handle success
                var data = response.data
                var savedele = document.querySelectorAll('.'+c)

                if(data == 'Added to saved jobs'){
                    savedele.forEach(el => {
                        el.classList.remove('bg-secondary')
                        el.classList.add('bg-danger')
                    });
                }else{
                    savedele.forEach(el => {
                        el.classList.remove('bg-danger')
                        el.classList.add('bg-secondary')
                    });
                }
                // console.log(response);
                // jobrequirement.innerText = data.requirement;

                // applyroute.href = data.applyroute
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
                // console.log(savedele);
    }
</script>
@endpush