@extends('main.app')
@section('title','My Booking List')
@section('page_title','Booking')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Booking List</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">My Booking List</h5>
        <div class="card-body ">
            <a href="{{ route('booking.create') }}" class="btn btn-primary mb-4">+ Booking</a>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="bookingData">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>
@endsection

@section('main-js')
<script type="text/javascript">
    setTable();
    function setTable() {
        const booking_id = $('booking_id').val();
        $('#bookingData').DataTable({
            "processing": true,
            "serviceSide": true,
            "responsive": true,
            "destroy": true,
            "ajax": {
                "url": base_url + "/booking-data",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: web_token,
                }
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "id",
                },
                {
                    "data": "photo",
                },
                {
                    "data": "room_name",
                    "name": "rooms.room_name",
                },
                {
                    "data": "date",
                },
                {
                    "data": "start_time",
                },
                {
                    "data": "end_time",
                },
                {
                    "data": "description",
                },
                {
                    "data": "status",
                    render: function (data, type, row) {
                    let result = `<span class="badge bg-label-`;
                        if (data === 'PENDING')
                            result += `info`;
                        else if (data === 'DISETUJUI')
                            result += `primary`;
                        else if (data === 'DIGUNAKAN')
                            result += `primary`;
                        else if (data === 'DITOLAK')
                            result += `danger`;
                        else if (data === 'EXPIRED')
                            result += `warning`;
                        else if (data === 'BATAL')
                            result += `warning`;
                        else if (data === 'SELESAI')
                            result += `success`;

                        result += `">${data}</span>`;

                    return result;
                    }
                },
                {
                    "data": "options",
                }
            ],
            "drawCallback": function(settings){
                initCancelButton();
            }
        });
    }

</script>
@endsection
