@extends('users.layouts.app')

@section('content')

<div class="main-content">
    <!-- Intro Section Starts -->
    <div class="intro">
        <div class="intro-img-text">
            <div class="intro-img">
                <img src="{{auth()->user()->profile_image}}" width="149px" height="149px" alt="Profile Image" />
            </div>
            <div class="intro-text">
                <div class="intro-text-head">{{auth()->user()->full_name}}</div>
                <ul>
                    <li><img src="{{asset('assets/img/entypo_briefcase.png')}}" /><span>accountant</span></li>
                    <li><img src="{{asset('assets/img/carbon_location-filled.png')}}" /><span>{{auth()->user()->nationality}}</span></li>
                    <li><img src="{{asset('assets/img/bx_bxs-phone-call.png')}}" /><span>{{auth()->user()->phone}}</span></li>
                    <li><span>not verified</span></li>
                </ul>
            </div>
        </div>
        <div class="subscription-plan">
            <div class="subscription-plan-head">
                <p>Subscription plan <a href="#" class="standard-btn">standard</a><a href="#" class="upgrade-btn">Upgrade</a></p>
            </div>
            <div class="subscription-plan-body">
                <p>Upgrade your account to post job and access<br> Resume instanly</p>
            </div>
            <div class="subscription-plan-footer">
                <div class="status">
                    <p><img src="{{asset('assets/img/ic_baseline-work.png')}}" /><span>job status:</span></p>
                </div>
                <div class="availability">
                    <p>available for job&nbsp;&nbsp;<i class="fa fa-angle-down"></i></p>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section ends -->

    <!-- Boxes section starts -->
    <div class="boxes">
        <div class="boxes-items">
            <div class="boxes-item bg-white">
                <img src="{{asset('assets/img/Badge2.png')}}" class="badge" alt="Badge" />
                <p>Congratulations 🎉 Michael!<br>Next Step: Add Employment History</p>
                <div class="progress">
                    <div class="progress-item bg-red"></div>
                    <div class="progress-item"></div>
                    <div class="progress-item"></div>
                    <div class="progress-item"></div>
                </div>
                <div class="complete-profile-btn">
                    <a href="#">complete profile</a>
                </div>
            </div>
            <div class="boxes-item bg-green">
                <div class="boxes-item-number">{{auth()->user()->applications->count()}}</div>
                <div class="boxes-item-icon">
                    <img src="{{asset('assets/img/entypo_briefcase2.png')}}" alt="Brief Case" />
                </div>
                <div class="boxes-item-title">jobs</div>
            </div>
            <div class="boxes-item bg-red">
                <div class="boxes-item-number">{{auth()->user()->companies_applied}}</div>
                <div class="boxes-item-icon">
                    <img src="{{asset('assets/img/Group1902.png')}}" alt="Brief Case" />
                </div>
                <div class="boxes-item-title">companies</div>
            </div>
            <div class="boxes-item bg-orange">
                <div class="boxes-item-number">25</div>
                <div class="boxes-item-icon">
                    <img src="{{asset('assets/img/Group.png')}}" alt="Brief Case" />
                </div>
                <div class="boxes-item-title">Interview</div>
            </div>
        </div>
    </div>
    <!-- Boxes section ends -->

    <!-- Recommended Jos and Interview section starts -->
    <div class="jobs-interview">
        <div class="recommended-jobs">
            <div class="recommended-jobs-head">
                <p class="recommended-jobs-head-text">recommended job</p>
                <p class="recommended-jobs-head-desc">Based on your profile and career interests</p>
            </div>
            <div class="recommended-jobs-body">
                @if ($jobs)
                    @foreach ($jobs as $job)
                        <div class="recommended-jobs-item" onclick="showjob(this);" data-route="{{route('user.fetchjob', $job->slug)}}">
                            <div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
                            <div class="recommended-jobs-item-head-btn">
                                <a href="#" class="orange">{{$job->level}}</a>
                                <a href="#" onclick="save('{{route('user.save', $job->slug)}}');" class="{{$job->slug}} @if($job->jobs_saved()->where('user_id', auth()->user()->id)->exists() == 1) bg-danger @else bg-secondary @endif"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
                            </div>
                            <div class="recommended-jobs-item-head">
                                <div class="recommended-jobs-item-head-img">
                                    <img src="{{asset('assets/img/kpmg-logo1.png')}}" alt="KPMG" />
                                </div>
                                <div class="recommended-jobs-item-head-text">
                                    <p class="project-title">{{$job->title}}</p>
                                    <p class="project-category">{{$job->employer->profile->companyname}}<img src="{{asset('assets/img/question.png')}}" alt="Question Mark"><img src="{{asset('assets/img/check.png')}}" alt="Check Mark"></p>
                                </div>
                            </div>
                            <div class="recommended-jobs-item-main">
                                <p class="desc">{{Str::limit($job->summary)}}</p>
                                <p class="btns">
                                    <a href="#" class="orange">{{$job->level}}</a>
                                    <a href="#" onclick="save('{{route('user.save', $job->slug)}}');" class="{{$job->slug}} @if($job->jobs_saved()->where('user_id', auth()->user()->id)->exists() == 1) bg-danger @else bg-secondary @endif"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
                                    <a href="#" class="grey">View</a>
                                </p>
                            </div>
                            <div class="recommended-jobs-item-footer">
                                <div class="recommended-jobs-item-footer-item">
                                    <img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>{{$job->location}}</span>
                                </div>
                                <div class="recommended-jobs-item-footer-item">
                                    <img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>₦{{number_format($job->monthly_salary, 2)}}</span>
                                </div>
                                <div class="recommended-jobs-item-footer-item">
                                    <img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>{{$job->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                            <!-- <div class="apply-btn">
                                <a href="#" onclick="showjob(this);" data-route="{{route('user.fetchjob', $job->slug)}}">View</a>
                            </div> -->
                        </div>
                    @endforeach
                @endif
                {{-- <div class="recommended-jobs-item">
                    <div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
                    <div class="recommended-jobs-item-head-btn">
                        <a href="#" class="orange">part time</a>
                        <a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
                    </div>
                    <div class="recommended-jobs-item-head">
                        <div class="recommended-jobs-item-head-img">
                            <img src="{{asset('assets/img/d.png')}}" alt="D" />
                        </div>
                        <div class="recommended-jobs-item-head-text">
                            <p class="project-title">client accountant </p>
                            <p class="project-category">Deloitte And Touche<img src="{{asset('assets/img/question.png')}}" alt="Question Mark"><img src="{{asset('assets/img/check.png')}}" alt="Check Mark"></p>
                        </div>
                    </div>
                    <div class="recommended-jobs-item-main">
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet auctor leo, ornare eget amet. In aliqua.</p>
                        <p class="btns"><a href="#" class="orange">part time</a>
                        <a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a></p>
                    </div>
                    <div class="recommended-jobs-item-footer">
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>Lagos</span>
                        </div>
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>35K - 45K</span>
                        </div>
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>2 hours ago</span>
                        </div>
                    </div>
                </div>
                <div class="recommended-jobs-item">
                    <div class="badge"><img src="{{asset('assets/img/badge.png')}}" alt="Badge"></div>
                    <div class="recommended-jobs-item-head-btn">
                        <a href="#" class="orange">part time</a>
                        <a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a>
                    </div>
                    <div class="recommended-jobs-item-head">
                        <div class="recommended-jobs-item-head-img">
                            <img src="{{asset('assets/img/d.png')}}" alt="D" />
                        </div>
                        <div class="recommended-jobs-item-head-text">
                            <p class="project-title">client accountant </p>
                            <p class="project-category">Deloitte And Touche<img src="{{asset('assets/img/question.png')}}" alt="Question Mark"><img src="{{asset('assets/img/check.png')}}" alt="Check Mark"></p>
                        </div>
                    </div>
                    <div class="recommended-jobs-item-main">
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Imperdiet auctor leo, ornare eget amet. In aliqua.</p>
                        <p class="btns"><a href="#" class="orange">part time</a>
                        <a href="#" class="red"><img src="{{asset('assets/img/heart.png')}}" /><span>save job</span></a></p>
                    </div>
                    <div class="recommended-jobs-item-footer">
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/location.png')}}" alt="Location" /><span>Lagos</span>
                        </div>
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>35K - 45K</span>
                        </div>
                        <div class="recommended-jobs-item-footer-item">
                            <img src="{{asset('assets/img/clock.png')}}" alt="Clock" /><span>2 hours ago</span>
                        </div>
                    </div>
                </div> --}}
                <div class="click-more-jobs-btn">
                    <a href="{{route('user.find')}}">see all jobs ></a>
                </div>
            </div>
        </div>
        <div class="scheduled-interviews">
            <div class="scheduled-interviews-head">
                <p>scheduled interview</p>
            </div>
            <div class="scheduled-interviews-header">
                <img src="{{asset('assets/img/Illustration.png')}}" />
            </div>
            <div class="scheduled-interviews-body">
                <div class="date-briefing">
                    <div class="date"><p>thu<br><span>24</span></p></div>
                    <div class="briefing">
                        <p class="heading">interview & job briefing</p>
                        <p class="desc">Zuxx Nigeria Limited</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/Icon.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">Sat, May 25, 2020</p>
                        <p class="time">10:AM to 6:PM</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/google-meet-logo1.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">GoogleMeet</p>
                        <p class="time">meet.google.com/jth-chlt-hfg</p>
                    </div>
                </div>
                <div class="date-time-images">
                    <img src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(1).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(2).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(3).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(4).png')}}">
                    <span>+5</span>
                </div>
            </div>
        </div>
    </div>
    <div class="jobs-interview">
        <div class="recommended-jobs">
            <div class="recommended-jobs-head">
                <p class="recommended-jobs-head-text">my applications</p>
                <p class="recommended-jobs-head-desc">Your recently sent applications</p>
            </div>
            <div class="recommended-jobs-body" style="overflow-x:auto;">
                <div style="overflow-x:auto;">
                  <table class="table">
                    <tr>
                        <th>title</th>
                        <th>status</th>
                        <th>role</th>
                        <th>salary</th>
                        <th>applied on</th>
                    </tr>
                    @foreach (auth()->user()->applications as $application)
                        <tr>
                            <td>{{$application->title}}<br><span>{{$application->employer->profile->companyname}}</span></td>
                            <td class="active">{{$application->status}}</td>
                            <td>{{$application->functions}}</td>
                            <td>₦{{number_format($application->monthly_salary, 2)}}</td>
                            <td>{{$application->pivot->created_at}} <small>{{$application->pivot->created_at->diffForHumans()}}</small></td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="active">active</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr>
                    <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="expired">expired</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr>
                    <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="expired">expired</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr>
                    <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="active">active</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr>
                    <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="active">active</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr>
                    <tr>
                        <td>IT Support Engineer<br><span>Cloud Interactive Associates</span></td>
                        <td class="active">active</td>
                        <td>accountant</td>
                        <td>35K-45K</td>
                        <td>11-Jun-2021</td>
                    </tr> --}}
                  </table>
                </div>
                <div class="click-more-jobs-btn">
                    <a href="#">see all applications ></a>
                </div>
            </div>
        </div>
        <div class="scheduled-interviews">
            <div class="scheduled-interviews-head" style="padding: 5px 20px;">
                <p class="scheduled-interviews-head-text">scheduled interview</p>
                <p class="scheduled-interviews-head-desc">Get Jobs matching your preferences</p>
            </div>
            <div class="scheduled-interviews-body">
                <form>
                    <div class="scheduled-interviews-form-head">
                        <p><img src="{{asset('assets/img/Frame.png')}}" alt="Frame" /> Don’t Miss out!</p>
                    </div>
                    <div class="form-group">
                        <label>Job title:</label>
                        <input type="text" name="job-title" />
                    </div>
                    <div class="form-group">
                        <label>location:</label>
                        <input type="text" name="location" />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create Job Alert" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Recommended Jos and Interview section ends -->
</div>

@endsection
