@extends('employers.layouts.app')

@section('content')

<div class="company-details-sec main-content">
    <div class="company-details">
        <div class="company-details-head">
            <p>contact person&nbsp;&nbsp;
                <img src="{{asset('assets/img/question.png')}}" />
                <img src="{{asset('assets/img/check.png')}}" />
            </p>
        </div>
        <div class="company-details-body">
            <form method="POST" action="{{route('employer.update-contact-person')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>id type</label>
                        <input type="text" class="form-control @error('identification_type') is-invalid @enderror" name="identification_type" value="{{auth('employer')->user()->identification_type}}" placeholder="National Identity Number">
                        @error('identification_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>id number</label>
                        <input type="text" class="form-control @error('identification_no') is-invalid @enderror" name="identification_no" value="{{auth('employer')->user()->identification_no}}" placeholder="12311102222999">
                        @error('identification_no')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>last name</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror " name="lastname" value="{{auth('employer')->user()->lastname}}" placeholder="Michael">
                        @error('lastname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>first name</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror " name="firstname" value="{{auth('employer')->user()->firstname}}" placeholder="Adewale">
                        @error('firstname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>date of birth</label>
                        <input type="date" class="form-control @error('dofb') is-invalid @enderror " name="dofb" value="{{auth('employer')->user()->dofb}}">
                        @error('dofb')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>sex</label>
                        <input type="text" class="form-control @error('sex') is-invalid @enderror " name="sex" value="{{auth('employer')->user()->sex}}" placeholder="Male">
                        @error('sex')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror " name="phone" value="{{auth('employer')->user()->phone}}" placeholder="">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>position in company</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror " name="position" value="{{auth('employer')->user()->position}}" placeholder="Manager">
                        @error('position')
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
            <p>change password</p>
        </div>
        <div class="company-details-body">
            <form method="POST" action="{{route('employer.update-password')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group" style="width:100%;">
                        <label>Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label>twitter</label>
                        <input type="text" class="form-control" name="twitter">
                    </div> --}}
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="password_confirmation">
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
