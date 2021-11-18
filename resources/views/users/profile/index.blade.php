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
                        <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror " value="{{auth()->user()->nationality}}"/>
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
                            <td></td>
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
                        <select name="country" class="form-control @error('country') is-invalid @enderror " >
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
                        </select>
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
                            <option value="af">Afrikaans</option>
                            <option value="sq">Albanian - shqip</option>
                            <option value="am">Amharic - አማርኛ</option>
                            <option value="ar">Arabic - العربية</option>
                            <option value="an">Aragonese - aragonés</option>
                            <option value="hy">Armenian - հայերեն</option>
                            <option value="ast">Asturian - asturianu</option>
                            <option value="az">Azerbaijani - azərbaycan dili</option>
                            <option value="eu">Basque - euskara</option>
                            <option value="be">Belarusian - беларуская</option>
                            <option value="bn">Bengali - বাংলা</option>
                            <option value="bs">Bosnian - bosanski</option>
                            <option value="br">Breton - brezhoneg</option>
                            <option value="bg">Bulgarian - български</option>
                            <option value="ca">Catalan - català</option>
                            <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                            <option value="zh">Chinese - 中文</option>
                            <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                            <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                            <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                            <option value="co">Corsican</option>
                            <option value="hr">Croatian - hrvatski</option>
                            <option value="cs">Czech - čeština</option>
                            <option value="da">Danish - dansk</option>
                            <option value="nl">Dutch - Nederlands</option>
                            <option value="en">English</option>
                            <option value="en-AU">English (Australia)</option>
                            <option value="en-CA">English (Canada)</option>
                            <option value="en-IN">English (India)</option>
                            <option value="en-NZ">English (New Zealand)</option>
                            <option value="en-ZA">English (South Africa)</option>
                            <option value="en-GB">English (United Kingdom)</option>
                            <option value="en-US">English (United States)</option>
                            <option value="eo">Esperanto - esperanto</option>
                            <option value="et">Estonian - eesti</option>
                            <option value="fo">Faroese - føroyskt</option>
                            <option value="fil">Filipino</option>
                            <option value="fi">Finnish - suomi</option>
                            <option value="fr">French - français</option>
                            <option value="fr-CA">French (Canada) - français (Canada)</option>
                            <option value="fr-FR">French (France) - français (France)</option>
                            <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                            <option value="gl">Galician - galego</option>
                            <option value="ka">Georgian - ქართული</option>
                            <option value="de">German - Deutsch</option>
                            <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                            <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                            <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                            <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                            <option value="el">Greek - Ελληνικά</option>
                            <option value="gn">Guarani</option>
                            <option value="gu">Gujarati - ગુજરાતી</option>
                            <option value="ha">Hausa</option>
                            <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                            <option value="he">Hebrew - עברית</option>
                            <option value="hi">Hindi - हिन्दी</option>
                            <option value="hu">Hungarian - magyar</option>
                            <option value="is">Icelandic - íslenska</option>
                            <option value="id">Indonesian - Indonesia</option>
                            <option value="ia">Interlingua</option>
                            <option value="ga">Irish - Gaeilge</option>
                            <option value="it">Italian - italiano</option>
                            <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                            <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                            <option value="ja">Japanese - 日本語</option>
                            <option value="kn">Kannada - ಕನ್ನಡ</option>
                            <option value="kk">Kazakh - қазақ тілі</option>
                            <option value="km">Khmer - ខ្មែរ</option>
                            <option value="ko">Korean - 한국어</option>
                            <option value="ku">Kurdish - Kurdî</option>
                            <option value="ky">Kyrgyz - кыргызча</option>
                            <option value="lo">Lao - ລາວ</option>
                            <option value="la">Latin</option>
                            <option value="lv">Latvian - latviešu</option>
                            <option value="ln">Lingala - lingála</option>
                            <option value="lt">Lithuanian - lietuvių</option>
                            <option value="mk">Macedonian - македонски</option>
                            <option value="ms">Malay - Bahasa Melayu</option>
                            <option value="ml">Malayalam - മലയാളം</option>
                            <option value="mt">Maltese - Malti</option>
                            <option value="mr">Marathi - मराठी</option>
                            <option value="mn">Mongolian - монгол</option>
                            <option value="ne">Nepali - नेपाली</option>
                            <option value="no">Norwegian - norsk</option>
                            <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                            <option value="nn">Norwegian Nynorsk - nynorsk</option>
                            <option value="oc">Occitan</option>
                            <option value="or">Oriya - ଓଡ଼ିଆ</option>
                            <option value="om">Oromo - Oromoo</option>
                            <option value="ps">Pashto - پښتو</option>
                            <option value="fa">Persian - فارسی</option>
                            <option value="pl">Polish - polski</option>
                            <option value="pt">Portuguese - português</option>
                            <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                            <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                            <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                            <option value="qu">Quechua</option>
                            <option value="ro">Romanian - română</option>
                            <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                            <option value="rm">Romansh - rumantsch</option>
                            <option value="ru">Russian - русский</option>
                            <option value="gd">Scottish Gaelic</option>
                            <option value="sr">Serbian - српски</option>
                            <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                            <option value="sn">Shona - chiShona</option>
                            <option value="sd">Sindhi</option>
                            <option value="si">Sinhala - සිංහල</option>
                            <option value="sk">Slovak - slovenčina</option>
                            <option value="sl">Slovenian - slovenščina</option>
                            <option value="so">Somali - Soomaali</option>
                            <option value="st">Southern Sotho</option>
                            <option value="es">Spanish - español</option>
                            <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                            <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                            <option value="es-MX">Spanish (Mexico) - español (México)</option>
                            <option value="es-ES">Spanish (Spain) - español (España)</option>
                            <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                            <option value="su">Sundanese</option>
                            <option value="sw">Swahili - Kiswahili</option>
                            <option value="sv">Swedish - svenska</option>
                            <option value="tg">Tajik - тоҷикӣ</option>
                            <option value="ta">Tamil - தமிழ்</option>
                            <option value="tt">Tatar</option>
                            <option value="te">Telugu - తెలుగు</option>
                            <option value="th">Thai - ไทย</option>
                            <option value="ti">Tigrinya - ትግርኛ</option>
                            <option value="to">Tongan - lea fakatonga</option>
                            <option value="tr">Turkish - Türkçe</option>
                            <option value="tk">Turkmen</option>
                            <option value="tw">Twi</option>
                            <option value="uk">Ukrainian - українська</option>
                            <option value="ur">Urdu - اردو</option>
                            <option value="ug">Uyghur</option>
                            <option value="uz">Uzbek - o‘zbek</option>
                            <option value="vi">Vietnamese - Tiếng Việt</option>
                            <option value="wa">Walloon - wa</option>
                            <option value="cy">Welsh - Cymraeg</option>
                            <option value="fy">Western Frisian</option>
                            <option value="xh">Xhosa</option>
                            <option value="yi">Yiddish</option>
                            <option value="yo">Yoruba - Èdè Yorùbá</option>
                            <option value="zu">Zulu - isiZulu</option>
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
        </div>
    </div>
    <div class="preview-profile-btn">
        <a href="#">preview profile</a>
    </div>
</div>

@endsection

@push('scripts')
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
