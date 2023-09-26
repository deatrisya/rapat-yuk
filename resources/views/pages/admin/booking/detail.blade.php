@extends('main.app')
@section('title', 'Booking List')
@section('page_title','Booking')
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
                    {{-- <form> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                    value="{{$booking->users->name}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Ruangan</label>
                                <input type="text" class="form-control" id="room_id" name="room_id"
                                    value="{{$booking->rooms->room_name}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{$booking->date}}"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Jam Mulai</label>
                                <input type="time" class="form-control" id="start_time" name="start_time"
                                    value="{{$booking->start_time}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Jam Selesai</label>
                                <input type="time" class="form-control" id="end_time" name="end_time"
                                    value="{{$booking->end_time}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Durasi</label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                    value="{{$duration}}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Jumlah Peserta</label>
                                <input type="text" class="form-control" id="qty_participants" name="qty_participants"
                                    value="{{$booking->qty_participants}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Jumlah Konsumsi</label>
                                <input type="text" class="form-control" id="foods" name="foods"
                                    value="{{$booking->food}}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Keterangan</label>
                                <input id="basic-default-message" class="form-control"
                                    value="{{ $booking->description }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Kebutuhan IT</label>
                                <input id="basic-default-message" class="form-control"
                                    value="{{ $booking->it_requirements }}" readonly>
                            </div>
                            @if ($booking->link_zoom)
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Link Rapat</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="basic-default-message" class="form-control text-wrap"
                                            value="{{ $booking->link_zoom }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ $booking->link_zoom }}" target="_blank" class="btn btn-icon btn-success"><i
                                                class='bx bx-link-external'></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($booking->reason)
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Alasan Penolakan</label>
                                <input type="text" class="form-control" id="reason" name="reason"
                                    value="{{$booking->reason}}" readonly />
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="button d-flex justify-content-end">
                        @if ($booking->status == 'PENDING')
                        <div class="btn-action d-flex">
                            <form action="{{ route('bookings.update',$booking->id) }}" method="POST" id="approve-form">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-success px-3 mb-0 me-2 approve-button"
                                    data-row-id="{{ $booking->id }}"><i class="bx bx-check"
                                        aria-hidden="true"></i>Setujui</button>
                                <input type="hidden" name="status" value="DISETUJUI">
                                <input type="hidden" name="admin_id" value="{{ Auth::user()->id}}">
                            </form>
                            <button class="btn btn-danger px-3 mb-0 reject-button" data-bs-toggle="modal"
                                data-bs-target="#modalCenter"><i class="bx bx-x" aria-hidden="true"></i>Tolak</button>
                        </div>
                        @endif
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            @if ($booking->status =='DISETUJUI' || $booking->status =='SELESAI')
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Hasil Meeting</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Bukti Foto</label>
                            <br>
                            @if ($booking->photo !== null)
                            <img width="500px" src="{{asset('storage/'.$booking->photo)}}">
                            @else
                            <p>Belum ada foto</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Dokumen Rapat</label>
                            <br>
                            <a href="{{ route('download.documents', $booking->id) }}" class="btn btn-success"><i
                                    class="bx bxs-file"></i>Download Dokumen</a>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Apakah kamu yakin menolak permintaan ini?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('bookings.update',$booking->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Alasan Penolakan</label>
                                <input type="text" id="reason" class="form-control" name="reason"
                                    placeholder="Alasan Penolakan" required />
                                <input type="hidden" name="status" value="DITOLAK">
                                <input type="hidden" name="admin_id" value="{{ Auth::user()->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-danger">Ya, Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    @endsection
