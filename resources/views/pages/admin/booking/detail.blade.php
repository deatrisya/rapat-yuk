@extends('main.app')
@section('title', 'Booking List')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Booking/</span> Detail Pemesanan</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl mx-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Pemesanan Ruangan Rapat</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{$booking->users->name}}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Ruangan</label>
                                    <input type="text" class="form-control" id="room_id" name="room_id" value="{{$booking->rooms->room_name}}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-email">Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{$booking->date}}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-phone">Jam Mulai</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{$booking->start_time}}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Jam Selesai</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{$booking->end_time}}" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Durasi</label>
                                    <input type="text" class="form-control" id="duration" name="duration" value="{{$duration}} Jam" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Jumlah Peserta</label>
                                    <input type="text" class="form-control" id="qty_participants" name="qty_participants" value="{{$booking->qty_participants}}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Jumlah Konsumsi</label>
                                    <input type="text" class="form-control" id="foods" name="foods" value="{{$booking->food}}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Keterangan</label>
                                    <textarea id="basic-default-message" class="form-control" readonly>{{ $booking->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('bookings.index') }}" class="btn btn-primary">Kembali</a>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Hasil Meeting</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Bukti Foto</label>
                            <br>
                            <img src="" alt="bukti-foto" height="100px" width="100px">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Resume</label>
                            <textarea class="form-control" readonly rows="10">{{ $booking->description }}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection
