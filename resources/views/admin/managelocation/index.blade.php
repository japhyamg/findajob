@extends('admin.layouts.app')

@section('content')
<!-- Latest Jobs Section Starts -->
<div class="latest-jobs">
    <div class="latest-jobs-head d-flex justify-content-between">
        <p>manage location</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Location
        </button>

        <!-- <a href="#" class="btn btn-info btn-sm p-2"></a> -->
    </div>
    <div class="latest-jobs-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($locations)
                        @foreach ($locations as $index => $location)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$location->name}}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm editind" data-id="{{$location->id}}" data-location="{{$location->name}}" data-bs-toggle="modal" data-bs-target="#editlocation">Edit</a>
                                {{-- <a href="#" class="btn btn-danger btn-sm" onclick="deleteInd('{{$location->id}}')">delete</a> --}}
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteInd('delete-location-{{ $location->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('admin.delete-location') }}" method="POST" id="delete-location-{{ $location->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $location->id }}">
                                </form>
                            </td>
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
        <h5 class="modal-title" id="staticBackdropLabel">Add Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.store-location')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
<div class="modal fade" id="editlocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.update-location')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" id="updatelocation" aria-describedby="emailHelp">
                    <input type="hidden" name="id" id="locationid">
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
    $('#editlocation').on('show.bs.modal', function (e) {
        var location = $(e.relatedTarget).data('location');
        var id = $(e.relatedTarget).data('id');
        // console.log(e.relatedTarget)
        $("#updatelocation").val( location );
        $("#locationid").val( id );
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
