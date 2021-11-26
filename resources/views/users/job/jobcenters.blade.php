@extends('users.layouts.app')

@section('content')
<div class="job-centers main-content">
    <div class="job-centers-head">
        <p class="job-centers-head-text">job centers</p>
        <p class="job-centers-head-desc">Check Up Job Centres around you.</p>
    </div>
    <div class="job-centers-search">
        <form action="{{route('user.job-centers')}}" method="GET">
            <select>
                <option>Location</option>
            </select>
            <input type="text" name="search" />
            <a href="#" class="filter-btn"><img src="{{asset('assets/img/filter-icon.png')}}" />Filter</a>
            <input type="submit"/>
        </form>
    </div>
    <div class="search-results-nums">Showing {{($jobcenters->currentpage()-1)*$jobcenters->perpage()+1}} - {{$jobcenters->currentpage()*$jobcenters->perpage()}}
        of {{$jobcenters->total()}} Job Centres</div>
    <div class="job-centers-items">
        @if ($jobcenters)
            @foreach ($jobcenters as $jobcenter)
                <div class="job-centers-item">
                    <div class="job-centers-item-img">
                        <img src="{{$jobcenter->logo_image}}" width="85px" height="85px" alt="Image" />
                    </div>
                    <div class="job-centers-item-head">
                        <p>{{$jobcenter->name}}</p>
                    </div>
                    <div class="job-centers-item-location">
                        <p>{{$jobcenter->address}}, {{Str::title($jobcenter->location)}}</p>
                    </div>
                    <div class="job-centers-item-number">
                        <p>{{$jobcenter->phone}}</p>
                    </div>
                    <div class="job-centers-item-timimg">
                        <div class="opening">
                            <p>Open <span>{{$jobcenter->open}}</span></p>
                        </div>
                        <div class="closing">
                            <p>Closes <span>{{$jobcenter->close}}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>FAJ</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div>
        <div class="job-centers-item">
            <div class="job-centers-item-img">
                <img src="{{asset('assets/img/job-center-item-img.png')}}" alt="Image" />
            </div>
            <div class="job-centers-item-head">
                <p>Regus Limited</p>
            </div>
            <div class="job-centers-item-location">
                <p>48  Adetokunbo Ademola, VI , Lagos</p>
            </div>
            <div class="job-centers-item-number">
                <p>+234 8169-373-363</p>
            </div>
            <div class="job-centers-item-timimg">
                <div class="opening">
                    <p>Open <span>8:00am</span></p>
                </div>
                <div class="closing">
                    <p>Closes <span>6:00pm</span></p>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="mt-1">
        {{$jobcenters->links()}}
    </div>

</div>

@endsection
