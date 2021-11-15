@extends('employers.layouts.app')

@section('content')

<!-- Header Ends -->
<div class="company-details-sec main-content">
    <div class="company-details" style="border-bottom: none;">
        <div class="company-details-head">
            <p>post a new job</p>
        </div>
        <div class="company-details-body">
            <form method="POST" action="{{route('employer.post-job')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group" style="width: 100%;">
                        <label>job title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        {{-- <span class="valid-msg">100 character limited</span> --}}
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>job functions</label>
                        <input type="text" class="form-control @error('functions') is-invalid @enderror" name="functions">
                        @error('functions')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>industry</label>
                        <select name="industry" class="form-control @error('industry') is-invalid @enderror">
                            <option value="">Select Industry</option>
                            @foreach ($industries as $industry)
                                <option value="{{$industry->slug}}">{{$industry->name}}</option>
                            @endforeach
                        </select>
                        @error('industry')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>location</label>
                        <select name="location" class="form-control @error('location') is-invalid @enderror">
                            <option>Nigeria</option>
                            <option>Nigeria</option>
                            <option>Nigeria</option>
                        </select>
                        @error('location')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>minimum qualification</label>
                        <input type="text" class="form-control @error('min_qualification') is-invalid @enderror" name="min_qualification">
                        @error('min_qualification')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    {{-- <div class="form-group">
                        <label>job level</label>
                        <input type="text" class="form-control @error('level') is-invalid @enderror" name="level">
                        @error('level')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label>monthly salary</label>
                        <input type="text" class="form-control @error('monthly_salary') is-invalid @enderror" name="monthly_salary" placeholder="NGN">
                        @error('monthly_salary')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>experience length</label>
                        <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" placeholder="6 years">
                        @error('experience')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>application deadline</label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" placeholder="22-06-2021">
                        @error('deadline')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>job level</label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror">
                            <option>Job Type</option>
                            <option>Contract</option>
                            <option>Full Time</option>
                            <option>Part Time</option>
                            <option>Internship</option>
                            <option>Nysc</option>
                        </select>
                        @error('level')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group-cont">
                    <div class="form-group mt-20" style="width:100%;">
                        <label>job summary</label>
                        <textarea rows="10" name="summary" class="form-control @error('summary') is-invalid @enderror"></textarea>
                        @error('summary')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        {{-- <span class="valid-msg">350 Character Limit</span> --}}
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group" style="width:100%;">
                        <label>job requirement</label>
                        <textarea rows="10" name="requirement" class="form-control @error('requirement') is-invalid @enderror"></textarea>
                        @error('requirement')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group-cont">
                    <div class="form-group mt-20" style="width:100%;">
                        <label><input type="checkbox" name="apply_with_cover">&nbsp;&nbsp; Applicant must apply with cover letter attached</label>
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group mt-10" style="width:100%;">
                        <label><b>how would you like this application to apply first on every search for job</b></label>
                        {{-- <label class="sponsor-post-cont">Sponsor Post --}}
                        <label>
                            <input type="checkbox"  name="is_sponsored"> Sponsor Post
                          {{-- <span class="checkmark"></span> --}}
                        </label>
                        {{-- <label class="sponsor-post-cont">Post
                          <input type="radio" name="radio">
                          <span class="checkmark"></span>
                        </label> --}}
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group mt-10" style="width:100%;">
                        <label><b>share job on social media</b></label>
                        <div class="share-job-cont">
                            <label><input type="checkbox" name="radio">&nbsp;&nbsp;Facebook</label>
                            <label><input type="checkbox" name="radio">&nbsp;&nbsp;Linkedin</label>
                            <label><input type="checkbox" name="radio">&nbsp;&nbsp;Instagram</label>
                            <label><input type="checkbox" name="radio">&nbsp;&nbsp;Twitter</label>
                        </div>
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="cancel-save-btn">
                        <input type="reset" name="cancel" value="Cancel">
                        {{-- <input type="button" name="preview" value="Preview"> --}}
                        <input type="submit" name="save" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
