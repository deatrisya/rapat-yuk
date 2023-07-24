@extends('main.app')
@section('title','List Room')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Form Tambah Data Ruangan</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambahkan Data Ruangan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action=" {{ route ('room.store')}} ">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="inputState" >Nama Ruangan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Ruang Rapat Bromo" value="{{old('room_name')}}"/>
                                @error('room_name')
                                    <small class="text-danger room_name">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Fasilitas</label>
                            <div class="col-sm-8">
                                <textarea id="basic-default-message" class="form-control" name="facility" id="facility" value="{{old('facility')}}"  placeholder="AC, Proyektor, Papan Tulis dan Kabel HDMI" aria-describedby="basic-icon-default-message2">{{ old('facility') }}</textarea>
                                @error('facility')
                                    <small class="text-danger facility">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Kapasitas</label>
                            <div class="col-sm-3">
                                <input type="text" id="basic-default-phone" class="form-control phone-mask" name="capacity" id="capacity" value="{{old('capacity')}}" placeholder="6" aria-describedby="basic-default-phone" />
                                @error('capacity')
                                    <small class="text-danger capacity">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Ketersediaan</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input name="availability" class="form-check-input" type="radio" value="1" id="availability" @if (old('availability') == "Tersedia") selected @endif  checked />
                                    <label class="form-check-label" for="availability"> Tersedia </label>
                                </div>
                                <div class="mt-2"></div>
                                <div class="form-check">
                                    <input name="availability" class="form-check-input" type="radio" value="0" id="availability" @if (old('availability') == " Tidak Tersedia") selected @endif/>
                                    <label class="form-check-label" for="availability"> Tidak Tersedia </label>
                                </div>
                                @error('availability')
                                    <small class="text-danger availability">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-10 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('room.index')}}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection