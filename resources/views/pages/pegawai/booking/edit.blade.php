@extends('main.app')
@section('title','Edit Booking')
@section('page_title','Booking')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Form Edit Data Pemesanan</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Pemesanan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action=" {{ route('booking.update',$booking->id) }} "
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="room_id">Nama Ruangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="room_id" name="room_id" readonly value="{{ $booking->rooms->room_name }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="date">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="date" name="date" readonly
                                            value="{{$booking->date}}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="start_time">Waktu Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            readonly value="{{ $booking->start_time }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="end_time">Waktu Berakhir</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="end_time" name="end_time" readonly
                                            value="{{ $booking->end_time }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="qty_participants">Jumlah
                                        Peserta</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="qty_participants"
                                            name="qty_participants" readonly value="{{ $booking->qty_participants }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="food">Konsumsi</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="food" name="food" readonly
                                            value="{{ $booking->food }}" />
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
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="photo">Foto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="photo" name="photo" multiple>
                                        <div class="d-flex justify-content-between">
                                            <small>Ukuran (Max: 2000Kb)</small>
                                            <small>Ekstensi (.jpg,.jpeg,.png)</small>
                                        </div>
                                        @error('photo')
                                        <small class="text-danger photo">{{ $message }}</small>
                                        @enderror
                                       @if ($booking->photo !== null)
                                           <img height="100px" width="100px" src="{{asset('storage/'.$booking->photo)}}">
                                       @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="resume">Dokumen Rapat</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="resume" name="resume" multiple>
                                        <div class="d-flex justify-content-between">
                                            <small>Ekstensi (.doc,.docx,.pdf,.xls,.xlsx,.ppt,.pptx)</small>
                                        </div>
                                        @error('resume')
                                        <small class="text-danger resume">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row float-end">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('booking.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
