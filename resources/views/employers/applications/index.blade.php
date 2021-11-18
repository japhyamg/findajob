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
                            <td>{{$applicant->user->full_name}}</td>
                            <td>{{$applicant->created_at->diffForHumans()}}</td>
                            <td>33</td>
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
