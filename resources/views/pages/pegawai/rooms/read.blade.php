@extends('main.app')
@section('title','List Room')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-3"><span class="text-muted fw-light"></span> Detail Ruangan</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header mb-0 d-flex align-items-center justify-content-between">
                    @if($room->availability == 1)
                    <div class="ms-auto">
                        <span class="badge rounded-pill bg-success">Tersedia</span>
                    </div>
                    @else
                    <div class="ms-auto">
                        <span class="badge rounded-pill bg-danger">Tidak Tersedia</span>
                    </div>
                    @endif
                </div>
                <div class="card-body mt-0">
                    <div class="d-flex">
                        <div class="me-4">
                            <span class="badge bg-label-primary p-5 dispay-2">
                                <i class="bx bxs-home-heart bx-lg text-primary"></i>
                            </span>
                        </div>
                        <div class="me-2">
                            <h5 class="mb-2" name="room_name" id="room_name">{{$room->room_name}}</h5>
                            <div class="d-flex">
                                <span class="badge badge-center rounded-pill bg-label-primary me-2"><i class="bx bx-user"></i></span>
                                <p class="text-muted d-block" name="capacity" id="capacity">{{ $room->capacity }} Orang</p>
                            </div>
                            <div class="d-flex flex-wrap">
                                @foreach ($facilities as $index => $facility)
                                <div class="ms-1 me-1">
                                    <span class="badge rounded-pill bg-label-info">{{ $facility }}</span>
                                </div>

                                @if(($index + 1) % 3 == 0)
                                <div class="w-100 mb-1"></div> <!-- Add this div to start a new row -->
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-lg-11 mx-auto mt-4">
                        <button class="btn btn-primary " type="button">Booking</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="calendar" class="card mb-4 col-md-6 p-2" data-book="{{ json_encode($events) }}">
        </div>
        <script src="{{ asset('js/calendar.js') }}"></script>
        <!-- <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    FullCalendar Example In Laravel.(phpforever.com).
                </div>
                <div class="panel-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection
