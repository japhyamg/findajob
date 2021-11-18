@extends('employers.layouts.app')

@section('content')
    <!-- Intro Section Starts -->
			<div class="intro">
				<div class="intro-img-text">
					<div class="intro-img">
						<img src="{{auth('employer')->user()->profile->profile_image}}" alt="Profile Image" />
					</div>
					<div class="intro-text">
						<div class="intro-text-head">{{auth('employer')->user()->profile->companyname}}</div>
						<ul>
							<li><img src="{{asset('assets/img/square.png')}}" /><span>{{auth('employer')->user()->email}}</span></li>
							@if(auth('employer')->user()->profile->address != null)
							<li><img src="{{asset('assets/img/square.png')}}" /><span>{{auth('employer')->user()->profile->address}}</span></li>
							@endif
							<li><img src="{{asset('assets/img/square.png')}}" /><span>{{auth('employer')->user()->phone}}</span></li>
						</ul>
					</div>
				</div>
				<div class="subscription-plan">
					<div class="subscription-plan-head">
						<p>Subscription plan <a href="#" class="standard-btn">standard</a></p>
					</div>
					<div class="subscription-plan-body">
						<p>Upgrade your account to post job and access<br> Resume instanly</p>
					</div>
					<div class="subscription-plan-footer">
						<a href="{{route('employer.post-job')}}" class="post-job-btn">post a job</a>
					</div>
				</div>
			</div>
			<!-- intro section ends -->

			<!-- Boxes section starts -->
			<div class="boxes">
				<div class="boxes-items">
					<div class="boxes-item bg-white">
						<img src="{{asset('assets/img/badge2.png')}}" class="badge" alt="Badge" />
						<p>Congratulations 🎉 Jane!<br><span>Your Profile is almost complete</span></p>
						<div class="percent">
							80%
						</div>
						<div class="complete-profile-btn">
							<a href="{{route('employer.company-details')}}">complete profile</a>
						</div>
					</div>
					<div class="boxes-item bg-green">
						<div class="boxes-item-number">{{auth('employer')->user()->jobs->count()}}</div>
						<div class="boxes-item-icon">
							<img src="{{asset('assets/img/entypo_briefcase2.png')}}" alt="Brief Case" />
						</div>
						<div class="boxes-item-title">jobs</div>
					</div>
					<div class="boxes-item bg-red">
						<div class="boxes-item-number">0</div>
						<div class="boxes-item-icon">
							<img src="{{asset('assets/img/view.png')}}" alt="Brief Case" />
						</div>
						<div class="boxes-item-title">profile viewed</div>
					</div>
					<div class="boxes-item bg-orange">
						<div class="boxes-item-number">{{auth('employer')->user()->applicants}}</div>
						<div class="boxes-item-icon">
							<img src="{{asset('assets/img/apps.png')}}" alt="Brief Case" />
						</div>
						<div class="boxes-item-title">Applications</div>
					</div>
				</div>
			</div>
			<!-- Boxes section ends -->

			<!-- Activity and Status Section Starts -->
			<div class="activity-status">
				<div class="activity-status-items">
					<div class="activity-status-item">
						<div class="activity-status-item-head">
							<p>job activity</p>
						</div>
						<div class="activity-status-item-body">
							<div class="table-responsive">
								<table>
									<tr>
										<td>all jobs</td>
										<td>{{auth('employer')->user()->jobs->count()}}</td>
									</tr>
									<tr>
										<td>expired jobs</td>
										<td>1</td>
									</tr>
									<tr>
										<td>active jobs</td>
										<td>52</td>
									</tr>
									<tr>
										<td>applications</td>
										<td>{{auth('employer')->user()->applicants}}</td>
									</tr>
									<tr>
										<td>track applicant</td>
										<td>0</td>
									</tr>
									<tr>
										<td>all jobs</td>
										<td>{{auth('employer')->user()->jobs->count()}}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="activity-status-item">
						<div class="activity-status-item-head">
							<p>job status</p>
						</div>
						<div class="activity-status-item-body">
						</div>
					</div>
					<div class="activity-status-item">
						<div class="activity-status-item-head">
							<p>resume activity</p>
						</div>
						<div class="activity-status-item-body">
							<div class="table-responsive">
								<table>
									<tr>
										<td>search resume</td>
										<td></td>
									</tr>
									<tr>
										<td>search job seekers</td>
										<td></td>
									</tr>
									<tr>
										<td>shortlisted resume</td>
										<td></td>
									</tr>
									<tr>
										<td>suggested job seeker</td>
										<td></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="activity-status-item">
						<div class="activity-status-item-head">
							<p>resume status</p>
						</div>
						<div class="activity-status-item-body">
						</div>
					</div>
				</div>
			</div>
			<!-- Activity and Status Section Ends -->

			<!-- Latest Jobs Section Starts -->
			<div class="latest-jobs">
				<div class="latest-jobs-head">
					<p>your latest jobs</p>
				</div>
				<div class="latest-jobs-body">
					<div class="table-responsive">
						<table>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="active">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="active">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="active">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="active">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="active">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
							<tr>
								<td>07/05/2021</td>
								<td><b>graphic designer</b></td>
								<td><span class="active">1</span> new appication <span class="danger">(</span><span class="active">approved 0</span> <span class="danger">not suitable 0)</span></td>
								<td><b>20 views</b></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!-- Latest Jobs Section Ends -->
@endsection

@push('scripts')
<script src="{{asset('assets/js/dashboard.js')}}"></script>
@endpush
