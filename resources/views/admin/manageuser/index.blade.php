@extends('admin.layouts.app')

@section('content')
<!-- Latest Jobs Section Starts -->
<div class="latest-jobs">
    <div class="latest-jobs-head d-flex justify-content-between">
        <p>manage job seekers</p>

        <!-- <a href="#" class="btn btn-info btn-sm p-2"></a> -->
    </div>
    <div class="latest-jobs-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->email}}</td>
                            <td></td>

                        </tr>
                        @endforeach
                    @endif
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
        <h5 class="modal-title" id="staticBackdropLabel">Add Industry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.store-industry')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Industry</label>
                    <input type="text" name="industry" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
