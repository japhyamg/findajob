@extends('employers.layouts.app')

@section('content')
<div class="company-details-sec main-content">
    <div class="company-details">
        <div class="company-details-head">
            <p>company details&nbsp;&nbsp;
                <img src="{{asset('assets/img/question.png')}}" />
                <img src="{{asset('assets/img/check.png')}}" />
            </p>
        </div>
        <div class="company-details-body">
            <form action="{{route('employer.update-company-details')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="upload-btn-wrapper">
                    <button class="btn">browse logo</button>
                    <input type="file" name="logo" accept="image/png, image/jpeg, image/gif" />
                    <span>Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</span>
				</div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>company name</label>
                        <div class="input-container">
                            <input type="text" class="form-control @error('companyname') is-invalid @enderror " name="companyname" value="{{auth('employer')->user()->profile->companyname}}" placeholder="John Doe Limited">
                            {{-- <img class="input-image" src="{{asset('assets/img/check-2.png')}}" /> --}}
                            @error('companyname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>company RC number</label>
                        <div class="input-container">
                            <input type="text" class="form-control @error('companyrc') is-invalid @enderror" name="companyrc" value="{{auth('employer')->user()->profile->companyrc}}" placeholder="...">
                            {{-- <img class="input-image" src="{{asset('assets/img/check-2.png')}}" /> --}}
                            @error('companyrc')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>address</label>
                        <div class="input-container">
                            <textarea rows="3" class="form-control @error('companyrc') is-invalid @enderror" name="address">{{auth('employer')->user()->profile->address}}</textarea>
                            {{-- <img class="textarea-image" src="{{asset('assets/img/check-2.png')}}" /> --}}
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{auth('employer')->user()->profile->website}}" placeholder="https://">
                        @error('website')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>number of employees</label>
                        <select name="noofemployers" class="form-control @error('noofemployers') is-invalid @enderror">
                            <option>1,000 - 10,000+</option>
                            <option>10,000 - 100,000+</option>
                        </select>
                        @error('noofemployers')
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
                                <option value="{{$industry->slug}}" @if (auth('employer')->user()->profile->industry == $industry->slug) selected @endif >{{$industry->name}}</option>
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
                    {{-- <div class="form-group">
                        <label>phone number</label>
                        <input type="number" class="form-control" name="p-number">
                    </div> --}}
                    <div class="form-group">
                        <label>specialities</label>
                        <input type="text" class="form-control @error('specialities') is-invalid @enderror" name="specialities" value="{{auth('employer')->user()->profile->specialities}}" placeholder="Mobile, Hardware, Software">
                        @error('specialities')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>nationality</label>
                        {{-- <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{auth('employer')->user()->profile->nationality}}" placeholder="Nigeria"> --}}
                        <select name="nationality" class="form-control @error('nationality') is-invalid @enderror">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->slug}}" @if (auth('employer')->user()->profile->nationality == $country->country) selected @endif>{{$country->country}}</option>
                            @endforeach
                        </select>
                        @error('nationality')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group-cont">
                    <div class="form-group" style="width: 100%">
                        <label>specialities</label>
                        <input type="number" class="form-control" name="specialities" value="{{auth('employer')->user()->profile->specialities}}" placeholder="Mobile, Hardware, Software">
                    </div>
                </div> --}}
                <div class="form-group-cont">
                    <div class="form-group" style="width: 100%">
                        <label>about us</label>
                        <textarea rows="3" name="aboutus" class="form-control @error('aboutus') is-invalid @enderror">{{auth('employer')->user()->profile->aboutus}}</textarea>
                        @error('aboutus')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="cancel-save-btn">
                        <input type="reset" name="cancel" value="Cancel">
                        <input type="submit" name="save" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="company-details" style="border-bottom:none;">
        <div class="company-details-head">
            <p>social media</p>
        </div>
        <div class="company-details-body">
            <form>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>facebook</label>
                        <input type="text" class="form-control" name="fb" placeholder="fb.me/">
                    </div>
                    <div class="form-group">
                        <label>twitter</label>
                        <input type="text" class="form-control" name="twitter">
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>linkedin</label>
                        <input type="text" class="form-control" name="linkedin">
                    </div>
                    <div class="form-group">
                        <label>twitter</label>
                        <input type="text" class="form-control" name="twitter">
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="cancel-save-btn">
                        <input type="reset" name="cancel" value="Cancel">
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
