@extends('main.app')
@section('title','Detail Booking')
@section('page_title','Booking')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Detail Data Pemesanan</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Detail Data Pemesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="room_id">Nama Ruangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="room_id" name="room_id"
                                        value="{{$booking->rooms->room_name}}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="date">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{$booking->date}}" @readonly(true) />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="start_time">Waktu Mulai</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" id="start_time" name="start_time"
                                        value="{{ $booking->start_time }}" readonly />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="end_time">Waktu Berakhir</label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" id="end_time" name="end_time"
                                        value="{{ $booking->end_time }}" @readonly(true) />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="qty_participants">Jumlah
                                    Peserta</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="qty_participants"
                                        name="qty_participants" value="{{ $booking->qty_participants }}"
                                        @readonly(true) />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="food">Jumlah Makanan</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="food" na value="{{ $booking->food }}"
                                        readonly />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="description">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="description" name="description"
                                        readonly value="{{ $booking->description }}">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="it_requirements">Kebutuhan IT</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="it_requirements" name="it_requirements"
                                        readonly value="{{ $booking->it_requirements }}">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('booking.index') }}" class="btn btn-secondary float-end">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
