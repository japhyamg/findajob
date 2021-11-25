@extends('users.layouts.app')

@section('content')
<div class="interviews main-content">
    <div class="interviews-search">
        <form>
            <input type="search" name="search" placeholder="Search" />
            <input type="submit" name="search" value="Search" />
        </form>
    </div>
    <div class="interviews-items">
        <div class="interviews-item">
            <div class="interviews-item-header">
            </div>
            <div class="interviews-item-body">
                <div class="date-briefing">
                    <div class="date"><p>thu<br><span>24</span></p></div>
                    <div class="briefing">
                        <p class="heading">interview & job briefing</p>
                        <p class="desc">Zuxx Nigeria Limited</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/Icon.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">Sat, May 25, 2020</p>
                        <p class="time">10:AM to 6:PM</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/google-meet-logo1.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">GoogleMeet</p>
                        <p class="time">meet.google.com/jth-chlt-hfg</p>
                    </div>
                </div>
                <div class="date-time-images">
                    <img src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(1).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(2).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(3).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(4).png')}}">
                    <span>+5</span>
                </div>
            </div>
            <div class="interviews-item-footer">
                <div class="available">
                    <a href="#">i will be available <img src="{{asset('assets/img/subway_tick.png')}}"></a>
                </div>
                <div class="interested">
                    <a href="#">no longer interested <img src="{{asset('assets/img/topcoat_cancel.png')}}"></a>
                </div>
            </div>
        </div>
        <div class="interviews-item">
            <div class="interviews-item-header">
            </div>
            <div class="interviews-item-body">
                <div class="date-briefing">
                    <div class="date"><p>thu<br><span>24</span></p></div>
                    <div class="briefing">
                        <p class="heading">interview & job briefing</p>
                        <p class="desc">Zuxx Nigeria Limited</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/Icon.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">Sat, May 25, 2020</p>
                        <p class="time">10:AM to 6:PM</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/google-meet-logo1.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">GoogleMeet</p>
                        <p class="time">meet.google.com/jth-chlt-hfg</p>
                    </div>
                </div>
            </div>
            <div class="interviews-item-footer">
                <div class="available">
                    <a href="#">i will be available <img src="{{asset('assets/img/subway_tick.png')}}"></a>
                </div>
                <div class="interested">
                    <a href="#">no longer interested <img src="{{asset('assets/img/topcoat_cancel.png')}}"></a>
                </div>
            </div>
        </div>
        <div class="interviews-item">
            <div class="interviews-item-header">
            </div>
            <div class="interviews-item-body">
                <div class="date-briefing">
                    <div class="date"><p>thu<br><span>24</span></p></div>
                    <div class="briefing">
                        <p class="heading">interview & job briefing</p>
                        <p class="desc">Zuxx Nigeria Limited</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/Icon.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">Sat, May 25, 2020</p>
                        <p class="time">10:AM to 6:PM</p>
                    </div>
                </div>
                <div class="date-time">
                    <div class="date-time-img">
                        <img src="{{asset('assets/img/google-meet-logo1.png')}}">
                    </div>
                    <div class="date-time-text">
                        <p class="date">GoogleMeet</p>
                        <p class="time">meet.google.com/jth-chlt-hfg</p>
                    </div>
                </div>
                <div class="date-time-images">
                    <img src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(1).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(2).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(3).png')}}">
                    <img class="date-time-footer-img" src="{{asset('assets/img/photo-1568602471122-7832951cc4c5(4).png')}}">
                    <span>+5</span>
                </div>
            </div>
            <div class="interviews-item-footer">
                <div class="available">
                    <a href="#">i will be available <img src="{{asset('assets/img/subway_tick.png')}}"></a>
                </div>
                <div class="interested">
                    <a href="#">no longer interested <img src="{{asset('assets/img/topcoat_cancel.png')}}"></a>
                </div>
            </div>
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
