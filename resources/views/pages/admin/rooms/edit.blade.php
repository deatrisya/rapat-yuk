@extends('main.app')
@section('title','List Room')
@section('page_title','List Room')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Form Edit Data Ruangan</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Ruangan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action=" {{ route('room.update', $room->id) }} ">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="inputState">Nama Ruangan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="room_name" id="room_name" value="{{ $room->room_name }}" placeholder="Ruang Rapat Bromo" required />
                                @error('room_name')
                                <small class="text-danger room_name">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="inputState">Fasilitas</label>
                            <div class="col-sm-8">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="Wifi" id="facility" name="facility[]"  @if(in_array('Wifi', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Wifi </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="AC" id="facility" name="facility[]" @if(in_array('AC', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> AC </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Papan Tulis" id="facility" name="facility[]" @if(in_array('Papan Tulis', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Papan Tulis </label>
                                        </div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="Meja" id="facility" name="facility[]" @if(in_array('Meja', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Meja </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Kursi" id="facility" name="facility[]" @if(in_array('Kursi', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Kursi </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Proyektor" id="facility" name="facility[]" @if(in_array('Proyektor', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Proyektor </label>
                                        </div>
                                    </div>
                                    <div class="ms-4">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value="Spidol" id="facility" name="facility[]" @if(in_array('Spidol', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Spidol </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Penghapus Papan" id="facility" name="facility[]" @if(in_array('Penghapus Papan', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Penghapus Papan </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Jam" id="facility" name="facility[]" @if(in_array('Jam', explode(', ', $room->facility))) checked @endif/>
                                            <label class="form-check-label" for="facility"> Jam </label>
                                        </div>
                                    </div>
                                </div>
                                @error('facility')
                                <small class="text-danger facility">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Kapasitas</label>
                            <div class="col-sm-3">
                                <input type="text" id="basic-default-phone" class="form-control phone-mask" name="capacity" id="capacity" value="{{ $room->capacity }}" placeholder="6" aria-describedby="basic-default-phone" required />
                                @error('capacity')
                                <small class="text-danger capacity">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Ketersediaan</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input name="availability" class="form-check-input" type="radio" value="1" id="availability" @if ($room->availability == "Tersedia") selected @endif checked />
                                    <label class="form-check-label" for="availability"> Tersedia </label>
                                </div>
                                <div class="mt-2"></div>
                                <div class="form-check">
                                    <input name="availability" class="form-check-input" type="radio" value="0" id="availability" @if ($room->availability == " Tidak Tersedia") selected @endif/>
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
