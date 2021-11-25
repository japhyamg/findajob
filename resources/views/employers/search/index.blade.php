@extends('employers.layouts.app')

@section('content')
<div class="job-search main-content">
    <!-- Job Search Section Starts -->
    <div class="job-search-cont">
        <form method="get" action="{{route('employer.search')}}">
            @csrf
            <select>
                <option>Location</option>
            </select>
            <input type="text" name="search" />
            <a href="#" class="filter-btn"><img src="{{asset('assets/img/filter-icon.png')}}" />Filter</a>
            <input type="submit" name="submit" value="Search" />
        </form>
    </div>
    <!-- Job Search Section Ends -->

    <!-- Featured Job Seeker Section Starts -->
    <div class="featured-job">
        <div class="featured-job-head">
            <p>featured job seeker</p>
        </div>
        <div class="featured-job-desc">
            <p>Recommendations are based on <span>Job Seekers Profile, Proximity to your Office & Company Preferences</span> on FAJ</p>
        </div>
        <div class="featured-job-body">
            <div class="featured-job-items">
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
                <div class="featured-job-item">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}">
                    </div>
                    <div class="featured-job-item-img">
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="featured-job-item-name">
                        <p>john doe</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Job Seeker Section Ends -->

    <!-- Search Results Section Starts -->
    @if ($searchResults)
        <div class="search-result">
            <div class="search-result-head">
                {{-- <p>Showing 1-10 of 44 Job Seekers</p> --}}
                <p>Showing 1-10 of 44 Job Seekers</p>
            </div>
            @foreach ($searchResults as $result)
                <div class="search-result-item">
                    <div class="search-result-item-img">
                        <div class="check">
                            <img src="{{asset('assets/img/check.png')}}" />
                        </div>
                        <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                    </div>
                    <div class="search-result-item-text">
                        <div class="search-result-item-text-head">
                            <p>{{$result->searchable->full_name}} <span>5 yrs.exp</span></p>
                        </div>
                        <div class="search-result-item-text-designation">
                            <p>{{$result->searchable->employment_history->last()->job_title ?? ''}}</p>
                        </div>
                        <div class="search-result-item-text-company">
                            <p>Working in <b>{{$result->searchable->employment_history->last()->employer_name ?? ''}}</b> as {{$result->searchable->employment_history->last()->function ?? ''}}</p>
                        </div>
                        <div class="search-result-item-text-location">
                            <p>New York {{$result->searchable->nationality}}</p>
                        </div>
                        <div class="search-result-item-text-btns">
                            <a href="#">view</a>
                            <a href="#">contact</a>
                            <a href="#">download resume</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="search-result-item">
                <div class="search-result-item-img">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}" />
                    </div>
                    <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                </div>
                <div class="search-result-item-text">
                    <div class="search-result-item-text-head">
                        <p>david smith <span>5 yrs.exp</span></p>
                    </div>
                    <div class="search-result-item-text-designation">
                        <p>PHP Developer</p>
                    </div>
                    <div class="search-result-item-text-company">
                        <p>Working in <b>Google Inc.</b> as Assistant Manager - Digital Operations</p>
                    </div>
                    <div class="search-result-item-text-location">
                        <p>New York United States</p>
                    </div>
                    <div class="search-result-item-text-btns">
                        <a href="#">view</a>
                        <a href="#">contact</a>
                        <a href="#">download resume</a>
                    </div>
                </div>
            </div>
            <div class="search-result-item">
                <div class="search-result-item-img">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}" />
                    </div>
                    <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                </div>
                <div class="search-result-item-text">
                    <div class="search-result-item-text-head">
                        <p>david smith <span>5 yrs.exp</span></p>
                    </div>
                    <div class="search-result-item-text-designation">
                        <p>PHP Developer</p>
                    </div>
                    <div class="search-result-item-text-company">
                        <p>Working in <b>Google Inc.</b> as Assistant Manager - Digital Operations</p>
                    </div>
                    <div class="search-result-item-text-location">
                        <p>New York United States</p>
                    </div>
                    <div class="search-result-item-text-btns">
                        <a href="#">view</a>
                        <a href="#">contact</a>
                        <a href="#">download resume</a>
                    </div>
                </div>
            </div>
            <div class="search-result-item">
                <div class="search-result-item-img">
                    <div class="check">
                        <img src="{{asset('assets/img/check.png')}}" />
                    </div>
                    <img src="{{asset('assets/img/profile-2.png')}}" alt="Profile Image" />
                </div>
                <div class="search-result-item-text">
                    <div class="search-result-item-text-head">
                        <p>david smith <span>5 yrs.exp</span></p>
                    </div>
                    <div class="search-result-item-text-designation">
                        <p>PHP Developer</p>
                    </div>
                    <div class="search-result-item-text-company">
                        <p>Working in <b>Google Inc.</b> as Assistant Manager - Digital Operations</p>
                    </div>
                    <div class="search-result-item-text-location">
                        <p>New York United States</p>
                    </div>
                    <div class="search-result-item-text-btns">
                        <a href="#">view</a>
                        <a href="#">contact</a>
                        <a href="#">download resume</a>
                    </div>
                </div>
            </div> --}}
        </div>
    @endif
    <!-- Search Results Section Ends -->
</div>
@endsection

@push('scripts')

@endpush
