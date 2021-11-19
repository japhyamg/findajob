@extends('admin.layouts.app')

@section('content')
<!-- Latest Jobs Section Starts -->
<div class="latest-jobs">
    <div class="latest-jobs-head d-flex justify-content-between">
        <p>manage country</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Country
        </button>

        <!-- <a href="#" class="btn btn-info btn-sm p-2"></a> -->
    </div>
    <div class="latest-jobs-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($countries)
                        @foreach ($countries as $index => $country)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$country->country}}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm editind" data-id="{{$country->id}}" data-country="{{$country->country}}" data-bs-toggle="modal" data-bs-target="#editcountry">Edit</a>
                                {{-- <a href="#" class="btn btn-danger btn-sm" onclick="deleteInd('{{$country->id}}')">delete</a> --}}
                                <a class="btn btn-sm btn-danger" href="javascript:void(0);" data-toggle="tooltip" onclick="deleteInd('delete-country-{{ $country->id }}')" data-placement="top" data-original-title="Delete">
                                    Delete
                                </a>
                                <form action="{{ route('admin.delete-country') }}" method="POST" id="delete-country-{{ $country->id }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $country->id }}">
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
        <h5 class="modal-title" id="staticBackdropLabel">Add Country</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.store-country')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
<div class="modal fade" id="editcountry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Country</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{route('admin.update-country')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="updatecountry" aria-describedby="emailHelp">
                    <input type="hidden" name="id" id="countryid">
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
    $('#editcountry').on('show.bs.modal', function (e) {
        var country = $(e.relatedTarget).data('country');
        var id = $(e.relatedTarget).data('id');
        // console.log(e.relatedTarget)
        $("#updatecountry").val( country );
        $("#countryid").val( id );
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
