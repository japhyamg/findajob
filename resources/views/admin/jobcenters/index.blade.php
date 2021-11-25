@extends('admin.layouts.app')

@section('content')
<!-- Latest Jobs Section Starts -->
<div class="latest-jobs">
    <div class="latest-jobs-head d-flex justify-content-between">
        <p>manage job centers</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Job Center
        </button>

        <!-- <a href="#" class="btn btn-info btn-sm p-2"></a> -->
    </div>
    <div class="latest-jobs-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>Working Hours</th>
                        <th>Action</th>
                    </tr>
                    @if ($jobcenters)
                        @foreach ($jobcenters as $index => $jobcenter)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$jobcenter->name}}</td>
                                <td>{{$jobcenter->phone}}</td>
                                <td>{{$jobcenter->address}}</td>
                                <td>{{$jobcenter->location}}</td>
                                <td>{{$jobcenter->open}} / {{$jobcenter->close}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                </thead>
                <tbody>

                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- Latest Jobs Section Ends -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Job Center</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.add-job-center')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Location</label>
                    <select name="location" class="form-control" id="" required>
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->slug}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Working Hours</label>
                    <div class="row">
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Open</label>
                            <input type="time" name="open" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Close</label>
                            <input type="time" name="close" class="form-control" required>
                        </div>
                    </div>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editindustry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Industry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.update-industry')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Industry</label>
                    <input type="text" name="industry" class="form-control" id="updateindustry" aria-describedby="emailHelp">
                    <input type="hidden" name="id" id="industryid">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    $('#editindustry').on('show.bs.modal', function (e) {
        var industry = $(e.relatedTarget).data('industry');
        var id = $(e.relatedTarget).data('id');
        // console.log(e.relatedTarget)
        $("#updateindustry").val( industry );
        $("#industryid").val( id );
    })


    function deleteInd(formid){
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
@endpush
