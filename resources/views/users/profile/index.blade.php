@extends('users.layouts.app')

@section('content')

<div class="profile main-content">
    <div class="basic-info">
        <div class="basic-info-head">
            <p>basic information <img src="{{asset('assets/img/question.png')}}" alt="Info Img" /> <img src="{{asset('assets/img/check.png')}}" alt="Check Icon" /></p>
        </div>
        <div class="basic-info-body">
            <form method="POST" action="{{route('user.update-profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="upload-btn-wrapper">
                    <button class="btn">browse profile image</button>
                    <input type="file" name="avatar" accept="image/png, image/jpeg, image/gif" />
                    <span>Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg & .png</span>
				</div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>id type</label>
                        <input type="text" class="form-control @error('identification_type') is-invalid @enderror " name="identification_type" value="{{auth()->user()->identification_type}}" placeholder="National Identity Number (NIN)" />
                        @error('identification_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>id number</label>
                        <input type="text" class="form-control @error('identification_no') is-invalid @enderror " name="identification_no" value="{{auth()->user()->identification_no}}" placeholder="123456781111" />
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
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror " value="{{auth()->user()->lastname}}" placeholder="Michael" />
                        @error('lastname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>first name</label>
                        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror " value="{{auth()->user()->firstname}}" placeholder="Adewale" />
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
                        <input type="date" name="dofb" class="form-control @error('dofb') is-invalid @enderror " value="{{auth()->user()->dofb}}" placeholder="01-06-2021" />
                        @error('dofb')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror ">
                            <option {{auth()->user()->gender == 'Male' ? 'selected' : ''}} >Male</option>
                            <option {{auth()->user()->gender == 'Female' ? 'selected' : ''}}>Female</option>
                            <option {{auth()->user()->gender == 'Other' ? 'selected' : ''}}>Other</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror " value="{{auth()->user()->phone}}"/>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>nationality</label>
                        <select name="nationality" class="form-control @error('nationality') is-invalid @enderror">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->slug}}" @if(auth()->user()->nationality == $country->country) selected @endif >{{$country->country}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror " value="{{auth()->user()->nationality}}"/> --}}
                        @error('nationality')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="cancel-submit-btn">
                    <input type="reset" name="cancel" value="Cancel" />
                    <input type="submit" name="save" value="Save Changes" />
                </div>
            </form>
        </div>

    </div>
    <div class="basic-info" style="border-bottom:none;">
        <div class="basic-info-head">
            <p>change password</p>
        </div>
        <div class="basic-info-body">
            <form method="POST" action="{{route('user.update-password')}}">
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
                <div class="cancel-submit-btn">
                    <input type="reset" name="cancel" value="Cancel">
                    <input type="submit" name="save" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
    <div class="ecl basic-info">
        <div class="basic-info-head">
            <p>education</p>
            <p class="addition-links">
                <button id="education-btn">+ add education (secondary, tertiary & others)</button>
            </p>
        </div>
        <div class="basic-info-body education-history">
            <form method="POST" action="{{route('user.add-education')}}">
                @csrf
                <div class="tertiary">
                    <div class="form-group-cont">
                        <div class="form-group">
                            <label>Name of Institute</label>
                            <input type="text" name="institution" class="form-control @error('institution') is-invalid @enderror " placeholder="Name of Institute"/>
                            @error('institution')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Minimum Qualification</label>
                            <select name="min_qualification" class="form-control @error('min_qualification') is-invalid @enderror ">
                                <option>Degree</option>
                                <option>Diploma</option>
                                <option>High School(S.S.C.E)</option>
                                <option>HND</option>
                                <option>MBA/Msc</option>
                                <option>MBBS</option>
                                <option>MPhil/PhD</option>
                                <option>N.C.E</option>
                                <option>OND</option>
                            </select>
                            @error('min_qualification')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group-cont">
                        <div class="form-group">
                            <label>Start date</label>
                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror " placeholder="01-06-2021" />
                            @error('min_qualification')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>end date</label>
                            <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror " placeholder="01-06-2021" />
                            @error('min_qualification')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group-cont">
                        <div class="form-group" style="width: 100%">
                            <label>Description</label>
                            <textarea rows="3" name="description" class="form-control @error('description') is-invalid @enderror ">Maximum 1000 Characters</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="cancel-submit-btn">
                        <input type="reset" name="cancel" value="Cancel" />
                        <input type="submit" name="save" value="Save Changes" />
                    </div>
                </div>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Institution</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">Start Date/End Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($educations)
                        @foreach ($educations as $index => $education)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$education->institution}}</td>
                            <td>{{$education->min_qualification}}</td>
                            <td>{{$education->start_date}} / {{$education->end_date}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteitem('delete-education-{{ $education->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('user.delete-education') }}" method="POST" id="delete-education-{{ $education->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $education->id }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- <div class="transactions main-content">
                <div style="overflow-x:auto;height: 500px;">
                  <table>
                    <tr>
                        <th>Plan type</th>
                        <th>Price</th>
                        <th>Time period</th>
                        <th>Status</th>
                        <th>Purchased On</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                    <tr>
                        <td>Plan type</td>
                        <td>Price</td>
                        <td>Time period</td>
                        <td>Status</td>
                        <td>Purchased On</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                    </tr>
                    <tr>
                        <td>Plan type</td>
                        <td>Price</td>
                        <td>Time period</td>
                        <td>Status</td>
                        <td>Purchased On</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                    </tr>
                    <tr>
                        <td>Plan type</td>
                        <td>Price</td>
                        <td>Time period</td>
                        <td>Status</td>
                        <td>Purchased On</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                    </tr>
                  </table>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="ecl basic-info">
        <div class="basic-info-head">
            <p>employment history</p>
            <p class="addition-links">
                <button id="employment-btn">+ add employment history</button>
            </p>
        </div>
        <div class="basic-info-body employment-history">
            <form method="POST" action="{{route('user.add-employment-history')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Employer name</label>
                        <input type="text" name="employer_name" class="form-control @error('employer_name') is-invalid @enderror " placeholder="Employer name" />
                        @error('employer_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>job title</label>
                        <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror " placeholder="Job title" />
                        @error('job_title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Job level</label>
                        <select name="job_level" class="form-control @error('job_level') is-invalid @enderror " >
                            <option>Please Select...</option>
                            <option>Graduate Trainee</option>
                            <option>Volunteer, Internship</option>
                            <option>Entry Level</option>
                            <option>Mid Level</option>
                            <option>Senior Level</option>
                            <option>Management Level</option>
                            <option>Executive Level</option>
                            <option>No Experience</option>
                        </select>
                        @error('job_level')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>country</label>
                        <select name="country" class="form-control @error('country') is-invalid @enderror">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->slug}}">{{$country->country}}</option>
                            @endforeach
                        </select>

                        {{-- <select name="country" class="form-control @error('country') is-invalid @enderror " >
                            <option>Please Select...</option>
                            <option value="Afganistan">Afghanistan</option>
                           <option value="Albania">Albania</option>
                           <option value="Algeria">Algeria</option>
                           <option value="American Samoa">American Samoa</option>
                           <option value="Andorra">Andorra</option>
                           <option value="Angola">Angola</option>
                           <option value="Anguilla">Anguilla</option>
                           <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                           <option value="Argentina">Argentina</option>
                           <option value="Armenia">Armenia</option>
                           <option value="Aruba">Aruba</option>
                           <option value="Australia">Australia</option>
                           <option value="Austria">Austria</option>
                           <option value="Azerbaijan">Azerbaijan</option>
                           <option value="Bahamas">Bahamas</option>
                           <option value="Bahrain">Bahrain</option>
                           <option value="Bangladesh">Bangladesh</option>
                           <option value="Barbados">Barbados</option>
                           <option value="Belarus">Belarus</option>
                           <option value="Belgium">Belgium</option>
                           <option value="Belize">Belize</option>
                           <option value="Benin">Benin</option>
                           <option value="Bermuda">Bermuda</option>
                           <option value="Bhutan">Bhutan</option>
                           <option value="Bolivia">Bolivia</option>
                           <option value="Bonaire">Bonaire</option>
                           <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                           <option value="Botswana">Botswana</option>
                           <option value="Brazil">Brazil</option>
                           <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                           <option value="Brunei">Brunei</option>
                           <option value="Bulgaria">Bulgaria</option>
                           <option value="Burkina Faso">Burkina Faso</option>
                           <option value="Burundi">Burundi</option>
                           <option value="Cambodia">Cambodia</option>
                           <option value="Cameroon">Cameroon</option>
                           <option value="Canada">Canada</option>
                           <option value="Canary Islands">Canary Islands</option>
                           <option value="Cape Verde">Cape Verde</option>
                           <option value="Cayman Islands">Cayman Islands</option>
                           <option value="Central African Republic">Central African Republic</option>
                           <option value="Chad">Chad</option>
                           <option value="Channel Islands">Channel Islands</option>
                           <option value="Chile">Chile</option>
                           <option value="China">China</option>
                           <option value="Christmas Island">Christmas Island</option>
                           <option value="Cocos Island">Cocos Island</option>
                           <option value="Colombia">Colombia</option>
                           <option value="Comoros">Comoros</option>
                           <option value="Congo">Congo</option>
                           <option value="Cook Islands">Cook Islands</option>
                           <option value="Costa Rica">Costa Rica</option>
                           <option value="Cote DIvoire">Cote DIvoire</option>
                           <option value="Croatia">Croatia</option>
                           <option value="Cuba">Cuba</option>
                           <option value="Curaco">Curacao</option>
                           <option value="Cyprus">Cyprus</option>
                           <option value="Czech Republic">Czech Republic</option>
                           <option value="Denmark">Denmark</option>
                           <option value="Djibouti">Djibouti</option>
                           <option value="Dominica">Dominica</option>
                           <option value="Dominican Republic">Dominican Republic</option>
                           <option value="East Timor">East Timor</option>
                           <option value="Ecuador">Ecuador</option>
                           <option value="Egypt">Egypt</option>
                           <option value="El Salvador">El Salvador</option>
                           <option value="Equatorial Guinea">Equatorial Guinea</option>
                           <option value="Eritrea">Eritrea</option>
                           <option value="Estonia">Estonia</option>
                           <option value="Ethiopia">Ethiopia</option>
                           <option value="Falkland Islands">Falkland Islands</option>
                           <option value="Faroe Islands">Faroe Islands</option>
                           <option value="Fiji">Fiji</option>
                           <option value="Finland">Finland</option>
                           <option value="France">France</option>
                           <option value="French Guiana">French Guiana</option>
                           <option value="French Polynesia">French Polynesia</option>
                           <option value="French Southern Ter">French Southern Ter</option>
                           <option value="Gabon">Gabon</option>
                           <option value="Gambia">Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Great Britain">Great Britain</option>
                           <option value="Greece">Greece</option>
                           <option value="Greenland">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Hawaii">Hawaii</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="Indonesia">Indonesia</option>
                           <option value="India">India</option>
                           <option value="Iran">Iran</option>
                           <option value="Iraq">Iraq</option>
                           <option value="Ireland">Ireland</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan">Japan</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="Korea North">Korea North</option>
                           <option value="Korea Sout">Korea South</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Midway Islands">Midway Islands</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nambia">Nambia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherland Antilles">Netherland Antilles</option>
                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                           <option value="Nevis">Nevis</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau Island">Palau Island</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Phillipines">Philippines</option>
                           <option value="Pitcairn Island">Pitcairn Island</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar">Qatar</option>
                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                           <option value="Republic of Serbia">Republic of Serbia</option>
                           <option value="Reunion">Reunion</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="St Barthelemy">St Barthelemy</option>
                           <option value="St Eustatius">St Eustatius</option>
                           <option value="St Helena">St Helena</option>
                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                           <option value="St Lucia">St Lucia</option>
                           <option value="St Maarten">St Maarten</option>
                           <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                           <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                           <option value="Saipan">Saipan</option>
                           <option value="Samoa">Samoa</option>
                           <option value="Samoa American">Samoa American</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="South Africa">South Africa</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Swaziland">Swaziland</option>
                           <option value="Sweden">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Tahiti">Tahiti</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand">Thailand</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="United Kingdom">United Kingdom</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Erimates">United Arab Emirates</option>
                           <option value="United States of America">United States of America</option>
                           <option value="Uraguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City State">Vatican City State</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                           <option value="Wake Island">Wake Island</option>
                           <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                           <option value="Yemen">Yemen</option>
                           <option value="Zaire">Zaire</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select> --}}
                        @error('country')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Industry</label>
                        <select name="industry" class="form-control @error('industry') is-invalid @enderror ">
                            <option value="">Please Select...</option>
                            @if ($industries)
                                @foreach ($industries as $industry)
                                    <option value="{{$industry->slug}}">{{$industry->name}}</option>
                                @endforeach
                            @endif
                            {{-- <option>Advertising, Media and Communications</option>
                            <option>Agriculture, Fishing and Forestory</option>
                            <option>Automotive & Aviation</option>
                            <option>Banking, Finance & Insurance</option>
                            <option>Construction</option>
                            <option>Education</option>
                            <option>Energy & Utilities</option>
                            <option>Entertainment, Events & Sport</option>
                            <option>Government</option>
                            <option>Healthcare</option>
                            <option>Hospitality & Hotel</option>
                            <option>IT & Telecoms</option>
                            <option>Law & Compliance</option>
                            <option>Manufacturing & Warehousing</option>
                            <option>Mining, Energy & Metals</option>
                            <option>NGO, NPO & Charity</option>
                            <option>Real Estate</option>
                            <option>Recruitment</option> --}}
                        </select>
                        @error('industry')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>job function</label>
                        <select name="function" class="form-control @error('function') is-invalid @enderror ">
                            <option>Please Select...</option>
                            <option>Accounting, Auditing & Finance</option>
                            <option>Admin & Office</option>
                            <option>Building & Architecture</option>
                            <option>Community & Social Services</option>
                            <option>Consulting & Strategy</option>
                            <option>Creaive & Design</option>
                            <option>Customer Service & Support</option>
                            <option>Driver & Transport Services</option>
                            <option>Energy & Technology</option>
                            <option>Estate Agents & Property Management</option>
                            <option>Farming & Agriculture</option>
                            <option>Food Services & Catering</option>
                            <option>Health & Safety</option>
                            <option>Hopitality & Leisure</option>
                            <option>Human Resources</option>
                            <option>Management & Business Development</option>
                            <option>Marketing & Communications</option>
                            <option>Medical & Pharmaceutical</option>
                        </select>
                        @error('function')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Monthly Salary</label>
                        <select name="monthly_salary" class="form-control @error('monthly_salary') is-invalid @enderror ">
                            <option>Please Select...</option>
                            <option>Less Than 75,000</option>
                            <option>75,000 - 155,000</option>
                            <option>150,000 - 250,000</option>
                            <option>250,000 - 400,000</option>
                            <option>400,000 - 600,000</option>
                            <option>600,000 - 900,000</option>
                            <option>900,000 - 1,200,000</option>
                            <option>1,200,000 - 1,500,000</option>
                            <option>1,500,000 - 2,000,000</option>
                            <option>2,000,000 - 3,000,000</option>
                            <option>3,000,000 - 4,000,000</option>
                            <option>4,000,000 - 5,000,000</option>
                            <option>Above 5,000,000</option>
                            <option>Less Thank 100</option>
                            <option>100 - 150</option>
                            <option>150 - 300</option>
                            <option>300 - 500</option>
                            <option>500 - 750</option>
                            <option>750 - 1000</option>
                        </select>
                        @error('monthly_salary')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>work type</label>
                        <select name="work_type" class="form-control @error('work_type') is-invalid @enderror ">
                            <option>Please Select...</option>
                            <option>Contract</option>
                            <option>Full Time</option>
                            <option>Internship & Graduate</option>
                            <option>Part Time</option>
                        </select>
                        @error('work_type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group" style="width:100%">
                        <label>City</label>
                        <input type="text" name="city" placeholder="City" class="form-control @error('city') is-invalid @enderror " />
                        @error('city')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror " placeholder="01-06-2021" />
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>end date</label>
                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror " placeholder="01-06-2021" />
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label><input type="checkbox" class="checkbox @error('currently_work_here') is-invalid @enderror " name="currently_work_here" />&nbsp;&nbsp;I Currently work here</label>
                        @error('currently_work_here')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group" style="width: 100%">
                        <label>Job Responsibilities</label>
                        <textarea rows="2" name="responsibilities" class="form-control @error('responsibilities') is-invalid @enderror " placeholder="Job Responsibilities"></textarea>
                        @error('responsibilites')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="cancel-submit-btn">
                        <input type="reset" name="cancel" value="Cancel" />
                        <input type="submit" name="save" value="Save Changes" />
                    </div>
                </div>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employer</th>
                        <th scope="col">Job Title</th>
                        <th scope="col">Start Date/End Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employments)
                        @foreach ($employments as $index => $employment)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$employment->employer_name}}</td>
                            <td>{{$employment->job_title}}</td>
                            <td>{{$employment->start_date}} / @if ($employment->currently_work_here && is_null($employment->end_date)) Current Job @else {{$employment->end_date}} @endif  {{$employment->end_date}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteitem('delete-employment-{{ $employment->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('user.delete-employment-history') }}" method="POST" id="delete-employment-{{ $employment->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $employment->id }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="ecl basic-info">
        <div class="basic-info-head">
            <p>certificate & rewards</p>
            <p class="addition-links">
                <button id="certificate-btn">+ add certificate & reward</button>
            </p>
        </div>
        <div class="basic-info-body certificate">
            <form method="POST" action="{{route('user.add-certificate')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group" style="width:100%;">
                        <label>certificate name</label>
                        <input type="text" name="certificate" class="form-control @error('certificate') is-invalid @enderror " placeholder="Certificate Name" style="width:90%;"/>
                        @error('certificate')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>start date</label>
                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror " placeholder="01-06-2021" />
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>end date</label>
                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror " placeholder="01-06-2021" />
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="cancel-submit-btn">
                        <input type="reset" name="cancel" value="Cancel" />
                        <input type="submit" name="save" value="Save Changes" />
                    </div>
                </div>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Certificate</th>
                        <th scope="col">Start Date/End Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($certificates)
                        @foreach ($certificates as $index => $certificate)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$certificate->certificate}}</td>
                            <td>{{$certificate->start_date}} / {{$certificate->end_date}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteitem('delete-certificate-{{ $certificate->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('user.delete-certificate') }}" method="POST" id="delete-certificate-{{ $certificate->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $certificate->id }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
    <div class="ecl basic-info">
        <div class="basic-info-head">
            <p>language & skills</p>
            <p class="addition-links">
                <button id="language-btn">+ add language & skills</button>
            </p>
        </div>
        <div class="basic-info-body language">
            <form method="POST" action="{{route('user.add-skill')}}">
                @csrf
                <div class="form-group-cont">
                    <div class="form-group">
                        <label>Language/Skill</label>
                        <select name="skill" class="form-control @error('skill') is-invalid @enderror " name="languages">
                                <option>Select...</option>
                            <option >Afrikaans</option>
                            <option >Albanian - shqip</option>
                            <option >Amharic - አማርኛ</option>
                            <option >Arabic - العربية</option>
                            <option >Aragonese - aragonés</option>
                            <option >Armenian - հայերեն</option>
                            <option >Asturian - asturianu</option>
                            <option >Azerbaijani - azərbaycan dili</option>
                            <option >Basque - euskara</option>
                            <option >Belarusian - беларуская</option>
                            <option >Bengali - বাংলা</option>
                            <option >Bosnian - bosanski</option>
                            <option >Breton - brezhoneg</option>
                            <option >Bulgarian - български</option>
                            <option >Catalan - català</option>
                            <option >Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                            <option >Chinese - 中文</option>
                            <option >Chinese (Hong Kong) - 中文（香港）</option>
                            <option >Chinese (Simplified) - 中文（简体）</option>
                            <option >Chinese (Traditional) - 中文（繁體）</option>
                            <option >Corsican</option>
                            <option >Croatian - hrvatski</option>
                            <option >Czech - čeština</option>
                            <option >Danish - dansk</option>
                            <option >Dutch - Nederlands</option>
                            <option >English</option>
                            <option >English (Australia)</option>
                            <option >English (Canada)</option>
                            <option >English (India)</option>
                            <option >English (New Zealand)</option>
                            <option >English (South Africa)</option>
                            <option >English (United Kingdom)</option>
                            <option >English (United States)</option>
                            <option >Esperanto - esperanto</option>
                            <option >Estonian - eesti</option>
                            <option >Faroese - føroyskt</option>
                            <option >Filipino</option>
                            <option >Finnish - suomi</option>
                            <option >French - français</option>
                            <option >French (Canada) - français (Canada)</option>
                            <option >French (France) - français (France)</option>
                            <option >French (Switzerland) - français (Suisse)</option>
                            <option >Galician - galego</option>
                            <option >Georgian - ქართული</option>
                            <option >German - Deutsch</option>
                            <option >German (Austria) - Deutsch (Österreich)</option>
                            <option >German (Germany) - Deutsch (Deutschland)</option>
                            <option >German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                            <option >German (Switzerland) - Deutsch (Schweiz)</option>
                            <option >Greek - Ελληνικά</option>
                            <option >Guarani</option>
                            <option >Gujarati - ગુજરાતી</option>
                            <option >Hausa</option>
                            <option >Hawaiian - ʻŌlelo Hawaiʻi</option>
                            <option >Hebrew - עברית</option>
                            <option >Hindi - हिन्दी</option>
                            <option >Hungarian - magyar</option>
                            <option >Icelandic - íslenska</option>
                            <option >Indonesian - Indonesia</option>
                            <option >Interlingua</option>
                            <option >Irish - Gaeilge</option>
                            <option >Italian - italiano</option>
                            <option >Italian (Italy) - italiano (Italia)</option>
                            <option >Italian (Switzerland) - italiano (Svizzera)</option>
                            <option >Japanese - 日本語</option>
                            <option >Kannada - ಕನ್ನಡ</option>
                            <option >Kazakh - қазақ тілі</option>
                            <option >Khmer - ខ្មែរ</option>
                            <option >Korean - 한국어</option>
                            <option >Kurdish - Kurdî</option>
                            <option >Kyrgyz - кыргызча</option>
                            <option >Lao - ລາວ</option>
                            <option >Latin</option>
                            <option >Latvian - latviešu</option>
                            <option >Lingala - lingála</option>
                            <option >Lithuanian - lietuvių</option>
                            <option >Macedonian - македонски</option>
                            <option >Malay - Bahasa Melayu</option>
                            <option >Malayalam - മലയാളം</option>
                            <option >Maltese - Malti</option>
                            <option >Marathi - मराठी</option>
                            <option >Mongolian - монгол</option>
                            <option >Nepali - नेपाली</option>
                            <option >Norwegian - norsk</option>
                            <option >Norwegian Bokmål - norsk bokmål</option>
                            <option >Norwegian Nynorsk - nynorsk</option>
                            <option >Occitan</option>
                            <option >Oriya - ଓଡ଼ିଆ</option>
                            <option >Oromo - Oromoo</option>
                            <option >Pashto - پښتو</option>
                            <option >Persian - فارسی</option>
                            <option >Polish - polski</option>
                            <option >Portuguese - português</option>
                            <option >Portuguese (Brazil) - português (Brasil)</option>
                            <option >Portuguese (Portugal) - português (Portugal)</option>
                            <option >Punjabi - ਪੰਜਾਬੀ</option>
                            <option >Quechua</option>
                            <option >Romanian - română</option>
                            <option >Romanian (Moldova) - română (Moldova)</option>
                            <option >Romansh - rumantsch</option>
                            <option >Russian - русский</option>
                            <option >Scottish Gaelic</option>
                            <option >Serbian - српски</option>
                            <option >Serbo-Croatian - Srpskohrvatski</option>
                            <option >Shona - chiShona</option>
                            <option >Sindhi</option>
                            <option >Sinhala - සිංහල</option>
                            <option >Slovak - slovenčina</option>
                            <option >Slovenian - slovenščina</option>
                            <option >Somali - Soomaali</option>
                            <option >Southern Sotho</option>
                            <option >Spanish - español</option>
                            <option >Spanish (Argentina) - español (Argentina)</option>
                            <option >Spanish (Latin America) - español (Latinoamérica)</option>
                            <option >Spanish (Mexico) - español (México)</option>
                            <option >Spanish (Spain) - español (España)</option>
                            <option >Spanish (United States) - español (Estados Unidos)</option>
                            <option >Sundanese</option>
                            <option >Swahili - Kiswahili</option>
                            <option >Swedish - svenska</option>
                            <option >Tajik - тоҷикӣ</option>
                            <option >Tamil - தமிழ்</option>
                            <option >Tatar</option>
                            <option >Telugu - తెలుగు</option>
                            <option >Thai - ไทย</option>
                            <option >Tigrinya - ትግርኛ</option>
                            <option >Tongan - lea fakatonga</option>
                            <option >Turkish - Türkçe</option>
                            <option >Turkmen</option>
                            <option >Twi</option>
                            <option >Ukrainian - українська</option>
                            <option >Urdu - اردو</option>
                            <option >Uyghur</option>
                            <option >Uzbek - o‘zbek</option>
                            <option >Vietnamese - Tiếng Việt</option>
                            <option >Walloon - wa</option>
                            <option >Welsh - Cymraeg</option>
                            <option >Western Frisian</option>
                            <option >Xhosa</option>
                            <option >Yiddish</option>
                            <option >Yoruba - Èdè Yorùbá</option>
                            <option >Zulu - isiZulu</option>
                        </select>
                        @error('skill')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Proficiency</label>
                        <select name="proficiency" class="form-control @error('proficiency') is-invalid @enderror ">
                            <option>Select...</option>
                            <option>Elementary Proficiency</option>
                            <option>Limited Working Proficiency</option>
                            <option>Professional Working Proficiency</option>
                            <option>Full Professional Proficiency</option>
                            <option>Native or Bilingual Proficiency</option>
                        </select>
                        @error('proficiency')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group-cont">
                    <div class="cancel-submit-btn">
                        <input type="reset" name="cancel" value="Cancel" />
                        <input type="submit" name="save" value="Save Changes" />
                    </div>
                </div>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Skill</th>
                        <th scope="col">Proficiency</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($skills)
                        @foreach ($skills as $index => $skill)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$skill->skill}}</td>
                            <td>{{$skill->proficiency}}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteitem('delete-skill-{{ $skill->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('user.delete-skill') }}" method="POST" id="delete-skill-{{ $skill->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $skill->id }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="preview-profile-btn">
        <a href="#">preview profile</a>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function deleteitem(formid){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                document.getElementById(formid).submit()
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#tertiary-edu-btn").click(function(){
        $(".tertiary").toggle();
      });
      $("#employment-btn").click(function(){
        $(".employment-history").toggle();
      });
      $("#education-btn").click(function(){
        $(".education-history").toggle();
      });
      $("#certificate-btn").click(function(){
        $(".certificate").toggle();
      });
      $("#language-btn").click(function(){
        $(".language").toggle();
      });
    });
</script>
@endpush
