@extends('main.app')
@section('title','List Room')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List Room Meeting</h4>

    <hr class="my-2" />

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Ruang Rapat</h5>
        <div class="table-responsive text-nowrap">
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('room.create') }}"> </i> Tambah Data </a> <br> <br>
                <table class="table table-hover" id="roomData">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Fasilitas</th>
                            <th>Kapasitas</th>
                            <th>Ketersediaan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>
@endsection

@section('main-js')
<script>
    filterDate();

    function filterDate(params) {
        $('#roomData').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "destroy": true,
            "ajax": {
                "url": base_url + "/room-data",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: web_token,
                }
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "id"
                },
                {
                    "data": "room_name"
                },
                {
                    "data": "facility"
                },
                {
                    "data": "capacity"
                },
                {
                    "data": "availability",
                    "render": function(data, type, row) {
                        if (data == 0) {
                            return "Tidak Tersedia";
                        } else {
                            return "Tersedia";
                        }
                    }
                },
                {
                    "data": "options"
                }
            ]
        });
    }
</script>
@endsection