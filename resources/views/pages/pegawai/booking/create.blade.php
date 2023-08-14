@extends('main.app')
@section('title','Tambah Booking')
@section('page_title','Booking')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master/</span> Tambah Data Booking</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Pemesanan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="room_id">Nama Ruangan</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" aria-label="Default select example" name="room_id"
                                            required>
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($room as $item)
                                            <option value="{{ $item->id }}" {{ old('room_id') == $item->id ? 'selected' : '' }}>{{ $item->room_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('room_id')
                                        <small class="text-danger room_id">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="date">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="date" name="date" required
                                            value="{{ old('date') }}" />
                                        @error('date')
                                        <small class="text-danger date">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="start_time">Waktu Mulai</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            required value="{{ old('start_time') }}" />
                                        @error('start_time')
                                        <small class="text-danger start_time">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="end_time">Waktu Berakhir</label>
                                    <div class="col-sm-9">
                                        <input type="time" class="form-control" id="end_time" name="end_time" required
                                            value="{{ old('end_time') }}" />
                                        @error('end_time')
                                        <small class="text-danger end_time">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="qty_participants">Jumlah
                                        Peserta</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="qty_participants" name="qty_participants" required
                                            value="{{ old('qty_participants') }}"  placeholder="10"/>
                                        @error('qty_participants')
                                        <small class="text-danger qty_participants">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="food">Jumlah Makanan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="food" name="food" required value="{{ old('food') }}" placeholder="10"/>
                                        @error('food')
                                        <small class="text-danger food">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="description">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="description" name="description"
                                            required placeholder="Rapat Anggaran" value="{{ old('description') }}">
                                        @error('description')
                                        <small class="text-danger description">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="it_requirements">Kebutuhan IT</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="it_requirements" name="it_requirements"
                                            required placeholder="Kabel, Handycam, Proyektor" value="{{ old('it_requirements') }}">
                                        @error('it_requirements')
                                        <small class="text-danger it_requirements">{{ $message }}</small>
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
