@extends('main.app')
@section('title','Booking List')
@section('page_title','Booking')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> List Booking</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">List Booking</h5>

        <div class="card-body ">
            <div class="row align-items-end mb-4">
                <div class="col-md-3">
                    <label for="floatingSelectGrid">Pilih Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Pilih Status</option>
                        <option value="DISETUJUI"> Disetujui</option>
                        <option value="DIGUNAKAN"> Digunakan</option>
                        <option value="DITOLAK"> Ditolak</option>
                        <option value="EXPIRED"> Expired</option>
                        <option value="BATAL"> Batal</option>
                        <option value="SELESAI"> Selesai</option>
                        <option value="PENDING"> Pending</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="floatingSelectGrid">Pilih Ruangan</label>
                    <select class="form-select" id="room" name="room">
                        <option value="">Pilih Ruangan</option>
                        @foreach ($room as $item)
                        <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="floatingSelectGrid">Tanggal Awal</label>
                    <input type="date" class="form-control" name="from_date" id="from_date">
                </div>
                <div class="col-md-2">
                    <label for="floatingSelectGrid">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="to_date" id="to_date">
                </div>
                <div class="col-md-2">
                    <button class="btn mb-0 btn-primary" onclick="setTable()">Cari</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="bookingData">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Penanggung Jawab</th>
                            <th>Ruangan</th>
                            <th>Pemesan</th>
                            <th>Tanggal</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Status</th>
                            <th>Jenis Rapat</th>
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
                "url": base_url + "/bookings-data",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: web_token,
                    from_date: $('#from_date').val(), //request:value
                    to_date: $('#to_date').val(),
                    status: $('#status').val(),
                    room: $('#room').val(),
                }
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "id",
                },
                {
                    "data": "admin_name",
                    "name": "admin.name",
                },
                {
                    "data": "room_name",
                    "name": "rooms.room_name",
                },
                {
                    "data": "user_name",
                    "name": "users.name",
                    "render": function(data, type, full, meta) {
                        if (type === 'display') {
                            var words = data.split(' ');
                            var firstName = words[0].charAt(0).toUpperCase() + words[0].slice(1).toLowerCase();
                        return firstName;
                        }
                    return data;
                    }
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
                    "data": "online_meeting",
                    render: function(data, type, row) {
                        let result = `<span class="badge bg-label-`;
                        if(data ==='Offline')
                            result += `primary`;
                        else
                            result += `success`;

                        result += `">${data}</span>`;

                        return result;
                    }
                },

                {
                    "data": "options",
                }
            ],
            "drawCallback": function (settings) {
                // initApproveButton();
                // initRejectButton();
            },
        });
    }

</script>
@endsection
