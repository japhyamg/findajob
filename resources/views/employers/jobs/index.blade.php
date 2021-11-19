@extends('employers.layouts.app')

@section('content')

<div class="manage-jobs main-content">
    <div class="payments-cont-head">
        <p>Manage jobs</p>
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
                    <th>title</th>
                    <th>added</th>
                    <th>status</th>
                    <th>viewed</th>
                    <th>clicked</th>
                    <th>application</th>
                    <th>actions</th>
                </tr>
                @if ($jobs)
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->created_at->toDayDateTimeString()}}</td>
                            <td class="active-expire-btns">
                                <a class="{{$job->status == 'draft' ? 'pending' : ($job->status == 'expire-active' ? 'expire' : 'active' ) }}" href="#">{{Str::ucfirst($job->status)}}</a>
                                    {{-- <a class="expire" href="#">expired</a>
                                    <a class="active" href="#">Active</a> --}}
                            </td>
                            <td>33</td>
                            <td>90</td>
                            <td>{{$job->applicants->count()}}</td>
                            <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                        </tr>
                    @endforeach
                @endif
                {{-- <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire" href="#">expired</a><a class="active" href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr>
                <tr>
                    <td>accountant</td>
                    <td>06-01-2021</td>
                    <td class="active-expire-btns"><a class="expire-active" href="#">expired</a><a href="#">Active</a></td>
                    <td>33</td>
                    <td>90</td>
                    <td>0</td>
                    <td class="action-btns"><a href="#">view</a><a href="#" class="grey-bg">Invoice</a></td>
                </tr> --}}
            </table>
        </div>
    </div>
    <!-- Payments Section Ends -->
</div>

@endsection

@push('scripts')
@endpush
