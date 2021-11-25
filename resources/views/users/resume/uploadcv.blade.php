@extends('users.layouts.app')

@section('content')
<div class="upload-resume main-content">
    <div class="upload-resume-cont">
        <div class="upload-resume-head">
            <p>upload resume</p>
        </div>
        <div class="upload-resume-body">
            <p class="desc">Upload and save your CV to our system. You can use your uploaded CV to quickly apply for a job.</p>
            <form method="POST" action="{{route('user.upload-cv')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}"/>
                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="file-label"> Choose a file
                    <input type="file" name="resume"   accept=".doc, .docx,.rtf,.pdf" size="60" >
                    </label>
                    @error('resume')
                        <div class="text-danger small">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <p class="file-type">Optionally upload a CV no larger than 10MB for file types .pdf .doc .docx .rtf</p>
                <div class="cancel-upload-btn">
                    <input type="reset" name="cancel" value="Cancel" />
                    <input type="submit" name="upload" value="Upload" />
                </div>
            </form>
        </div>
    </div>
    <div class="my-resume">
        <div class="my-resume-head">
            <p>my resume</p>
        </div>
        <div class="my-resume-body">
            <table>
                <tr>
                    <th>title</th>
                    <th>size</th>
                    <th>uploaded date</th>
                    <th>actions</th>
                </tr>
                @if ($resumes)
                    @foreach ($resumes as $resume)
                        <tr>
                            <td class="highlight-text">{{$resume->name}}</td>
                            <td>{{$resume->size}}</td>
                            <td>{{$resume->created_at->format('F j, Y - H:ma ')}}</td>
                            <td>
                                <a href="{{$resume->getFullUrl()}}" target="_blank" class="down-btn">download</a>
                                <a href="#" onclick="deletemedia({{$resume->id}})" class="del-btn">delete</a>
                            </td>
                        </tr>
                    @endforeach

                @endif
                {{-- <tr>
                    <td class="highlight-text">My Lagos CV</td>
                    <td>289KB</td>
                    <td>Yesterday at 8:45PM</td>
                    <td>
                        <a href="#" class="down-btn">download</a>
                        <a href="#" class="del-btn">delete</a>
                    </td>
                </tr> --}}
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function deletemedia(mediaid){
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
                axios({
                    method: 'delete',
                    url: '{{route('user.delete-cv')}}',
                    data: {
                        mediaid: mediaid
                    }
                })
                .then(function (response) {
                    // handle success
                    var data = response.data
                    if(data.status == 'success'){
                        Swal.fire(
                            'Deleted!',
                            'File has been deleted',
                            'success'
                        )

                        location.reload();
                    }
                    // console.log(response);
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
