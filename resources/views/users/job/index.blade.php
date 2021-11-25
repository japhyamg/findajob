@extends('users.layouts.app')

@section('content')

<div class="saved-jobs main-content">
    <div class="saved-jobs-search">
        <form>
            <input type="search" name="search" placeholder="Search" />
            <input type="submit" name="search" value="Search" />
        </form>
    </div>
    {{-- <div class="saved-jobs-text">
        <p>You have <span>5 Saved Jobs</span>. Please note that when a job expires it will automatically be removed from this list.</p>
    </div> --}}
    <div class="jobs-accountant">
        <div class="jobs-item">
        {{-- <div class="jobs-item"> --}}
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
                                <img id src="{{$job->employer->profile->profile_image}}" width="80px" height="32px" alt="KPMG" />
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
                                <img src="{{asset('assets/img/money.png')}}" alt="Money" /><span>₦{{number_format($job->monthly_salary,2)}}</span>
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
        </div>
        <div class="accountant">
            <div class="accountant-head">
                <div class="accountant-head-img"><img id="job-logo" width="70px" height="70px" src="{{$job->employer->profile->profile_image}}" /></div>
                <div class="accountant-head-text">
                    <p id="job-title">{{$jobs[0]->title}}</p>
                </div>
                <div style="overflow-x: auto;">
                    <table>
                        <tr>
                            <th>qualification</th>
                            <th>experience level</th>
                            <th>experience length</th>
                        </tr>
                        <tr>
                            <td id="job-qualification">{{$jobs[0]->min_qualification}}</td>
                            <td id="job-level">{{$jobs[0]->level}}</td>
                            <td id="job-experience">{{$jobs[0]->experience}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="accountant-body">
                <div class="accountant-body-head">
                    <p>Job Summary</p>
                </div>
                <div class="accountant-body-desc" >
                    <p id="job-summary">{{$jobs[0]->summary}}</p>
                </div>
                <div class="accountant-body-head">
                    <p>Responsibilities & Duties</p>
                </div>
                <div class="accountant-body-desc" >
                    <p id="job-requirement">
                    {{$jobs[0]->requirement}}
                    </p>
                </div>
                <div class="accountant-body-btns">
                    <a href="#"  d="{{route('user.apply',$jobs[0]->slug)}}" onclick="apply(this);" id="applyroute">Apply Now</a>
                    <a href="#" onclick="save('{{route('user.save', $job->slug)}}');" class="bg-secondary">Save Job</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="" method="POST" id="applyform" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Apply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">Upload Resume & Cover Letter</h3>
                <div class="mb-3">
                    <label for="coverletter" class="form-label">Cover letter</label>
                    <input type="file" name="coverletter" class="form-control" id="coverletter" aria-describedby="coverletterHelp" accept="application/pdf">
                    <div class="form-text">Please upload a pdf document</div>
                    <div id="coverletterHelp" class="form-text" style="display: none;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Apply</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
    localStorage.setItem("selectedJob", JSON.stringify(@json($jobs[0])));
    function showjob(event){

        var jobtitle = document.getElementById('job-title');
        var jobqualification = document.getElementById('job-qualification');
        var joblevel = document.getElementById('job-level');
        var jobexperience = document.getElementById('job-experience');
        var jobsummary = document.getElementById('job-summary');
        var jobrequirement = document.getElementById('job-requirement');
        var joblogo = document.getElementById('job-logo');
        var applyroute = document.getElementById('applyroute');


        var jobslist = document.querySelector(".jobs-item");
        var accountant = document.querySelector(".accountant");

        // if(accountant.style.display = 'block'){
            jobtitle.innerText = '';
            jobqualification.innerText = '';
            joblevel.innerText = '';
            jobexperience.innerText = '';
            jobsummary.innerText = '';
            jobrequirement.innerText = '';
            joblogo.src = '';

            // jobslist.style.width = '58%';
            // accountant.style.display = 'block';

            var url = event.getAttribute("data-route");
            localStorage.removeItem("selectedJob");

            axios.get(`${url}`)
                .then(function (response) {
                    // handle success
                    var data = response.data
                    console.log(response);
                    localStorage.setItem("selectedJob", JSON.stringify(data));
                    jobtitle.innerText = data.title;
                    jobqualification.innerText = data.min_qualification;
                    joblevel.innerText = data.level;
                    jobexperience.innerText = data.experience;
                    jobsummary.innerText = data.summary;
                    jobrequirement.innerText = data.requirement;
                    joblogo.src = data.profile_image;

                    // applyroute.href = data.applyroute
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });

    }

    function apply(event){
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            keyboard: false
        })

        var data = JSON.parse(localStorage.getItem('selectedJob'))
        // console.log(data);

        var title = document.getElementById('staticBackdropLabel');
        var coverletter = document.getElementById('coverletter');
        var coverletterHelp = document.getElementById('coverletterHelp');
        var applyform = document.getElementById('applyform');

        // console.log(data.apply_with_cover);

        if(data.apply_with_cover == 1){
            coverletterHelp.innerText = 'A cover letter is required for this job.';
            coverletterHelp.style.display = 'block'
            coverletter.setAttribute('required', true)
        }
        title.innerText = data.title
        var url = "{{url('/job/apply/slug')}}";

        var apurl = url.replace("slug", data.slug);

        applyform.setAttribute('action', apurl);
        // console.log(apurl);


        myModal.show()

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
