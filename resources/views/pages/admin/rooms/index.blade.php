@extends('main.app')
@section('title','List Room')
@section('page_title','List Room')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Master / </span> List Room</h4>

    <hr class="my-2" />

    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">Data Ruang Rapat</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <a class="btn btn-primary mb-3" href="{{ route('room.create') }}"> </i> Tambah Ruang</a>
                <div class="row align-items-end mb-4">
                    <div class="col-md-3">
                        <label for="floatingSelectGrid">Pilih Kapasitas</label>
                        <select class="form-select" id="capacity" name="capacity">
                            <option value="">Pilih Kapasitas</option>
                            <option value="10"> 10 orang</option>
                            <option value="20"> 20 orang</option>
                            <option value="30"> 30 orang</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn mb-0 btn-primary" onclick="setTable()">Cari</button>
                    </div>
                </div>

                <table class="table table-hover" id="roomData">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Fasilitas</th>
                            <th>Kapasitas</th>
                            <th>Ketersediaan</th>
                            <th>Aksi</th>
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
    setTable();

    function setTable(params) {
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
                    capacity: $('#capacity').val(),
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
                    "data": "facility",
                    "render": function (data, type, full, meta) {
                        if (type === 'display') {
                            var facilities = data.split(', ');
                            var facilityHTML = '';
                            var facilitiesPerRow = 4;

                            for (var i = 0; i < facilities.length; i++) {
                                facilityHTML += facilities[i];
                                if (i < facilities.length - 1) {
                                    facilityHTML += ', ';
                                }
                                if ((i + 1) % facilitiesPerRow === 0 || i === facilities.length - 1) {
                                    facilityHTML += '<br>';
                                }
                            }
                            return facilityHTML;
                        }
                        return data;
                    }
                },
                {
                    "data": "capacity"
                },
                {
                    "data": "availability",
                    "render": function(data, type, row) {
                    if (data === 'Tersedia') {
                        return '<span class="badge rounded-pill bg-label-success">' + data + '</span>';
                        
                    } else {
                        return '<span class="badge rounded-pill bg-label-danger">' + data + '</span>';
                    }
                }
                },
                {
                    "data": "options"
                }
            ],
            "drawCallback": function (settings) {
                initDeleteButton();
            },
        });
    }

</script>
@endsection
