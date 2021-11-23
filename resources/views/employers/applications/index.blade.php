@extends('employers.layouts.app')

@section('content')

<div class="manage-jobs main-content">
    <div class="payments-cont-head">
        <p>applications</p>
    </div>
    <!-- Job Search Section Starts -->
    <div class="payments-search">
        <form>
            <select>
                <option>Status</option>
            </select>
            <input type="text" name="search" />
            <input type="submit" name="submit" value="Search" />
        </form>
    </div>
    <!-- Job Search Section Ends -->

    <!-- Payments Section Starts -->
    <div class="payments">
        <div style="overflow-x: auto;">
            <table>
                <tr>
                    <th>job title</th>
                    <th>applicant</th>
                    <th>date applied</th>
                    <th>qualification</th>
                    <th>actions</th>
                </tr>
                @if ($applications)
                    @foreach ($applications as $applicant)
                        <tr>
                            <td>{{$applicant->job->title}}</td>
                            <td>{{$applicant->applicant->full_name}}</td>
                            <td>{{$applicant->created_at->diffForHumans()}}</td>
                            <td>{{$applicant->applicant->education->pluck('min_qualification')}}</td>
                            <td class="action-btns">
                                <a href="#" onclick="view(this)" data-applicant="{{$applicant->id}}">view</a>
                                <a href="#" onclick="shortlist(this)" data-applicant="{{$applicant->id}}" class="grey-bg">shortlist</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
    <!-- Payments Section Ends -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4">
                    <img src="" class="img-thumbnail" id="applicant_profile_image" alt="">
                </div>
                <div class="col-4">
                    <p>Applicant Name: <span id="applicant_name"></span></p>
                    <p>Email Address: <span id="applicant_email"></span></p>
                    <p>Phone: <span id="applicant_phone"></span></p>
                </div>
                <div class="col-4">
                    <p>Date of Birth: <span id="applicant_dob"></span></p>
                    <p>Gender: <span id="applicant_gender"></span></p>
                    <p>Nationality: <span id="applicant_country"></span></p>
                </div>
            </div>
            <div class="row" >
                <div class="col-12" id="resume">

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>Cover Letter</h4>
                    <a href="" id="applicant_cover_letter"></a>
                </div>
            </div>

            <table></table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function view(event){
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        })

        var applicationId = event.getAttribute("data-applicant");

        var applicant_profile_image = document.getElementById('applicant_profile_image');
        var applicant_name = document.getElementById('applicant_name');
        var applicant_email = document.getElementById('applicant_email');
        var applicant_phone = document.getElementById('applicant_phone');
        var applicant_dob = document.getElementById('applicant_dob');
        var applicant_gender = document.getElementById('applicant_gender');
        var applicant_country = document.getElementById('applicant_country');
        var resume = document.getElementById('resume');
        var applicant_cover_letter = document.getElementById('applicant_cover_letter');
        // console.log(applicationId)


        applicant_profile_image.src = '';
        applicant_name.innerText = '';
        applicant_email.innerText = '';
        applicant_phone.innerText = '';
        applicant_dob.innerText = '';
        applicant_gender.innerText = '';
        applicant_country.innerText = '';
        applicant_cover_letter.href = '';
        applicant_cover_letter.innerText = data.media[0].file_name;

            axios.post(`{{route('employer.fetchapplication')}}`, {
                    application: applicationId
                })
                .then(function (response) {
                    // handle success
                    var data = response.data
                    console.log(response);

                    applicant_profile_image.src = data.applicant.profile_image;
                    applicant_name.innerText = data.applicant.full_name;
                    applicant_email.innerText = data.applicant.email;
                    applicant_phone.innerText = data.applicant.phone;
                    applicant_dob.innerText = data.applicant.dofb;
                    applicant_gender.innerText = data.applicant.gender;
                    applicant_country.innerText = data.applicant.nationality;
                    applicant_cover_letter.href = data.cover_letter_file;
                    applicant_cover_letter.innerText = data.media[0].file_name;


                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        // console.log(apurl);


        myModal.show()

    }

    function shortlist(event) {

        var applicationId = event.getAttribute("data-applicant");

        Swal.fire({
            title: 'Are you sure?',
            text: "This applicant will be shortlisted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, shortlist!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`{{route('employer.shortlistapplicant')}}`, {
                    application: applicationId
                })
                .then(function (response) {
                    // handle success
                    var data = response.data
                    if(data.status == 'success'){
                        Swal.fire(
                            'Shortlisted!',
                            'This applicant has been shortlisted',
                            'success'
                        )

                        location.reload();
                    }
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
                // document.getElementById(formid).submit()
            }
        })
    }
</script>
@endpush
