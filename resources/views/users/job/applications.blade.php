@extends('users.layouts.app')

@section('content')

<div class="main-content">
    <div class="jobs-interview">
        <div class="recommended-jobs" style="width: 100%;" >
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
                {{-- <div class="click-more-jobs-btn">
                    <a href="#">see all applications ></a>
                </div> --}}
            </div>
        </div>
        {{-- <div class="scheduled-interviews">
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
        </div> --}}
    </div>
    <!-- Recommended Jos and Interview section ends -->
</div>

@endsection
