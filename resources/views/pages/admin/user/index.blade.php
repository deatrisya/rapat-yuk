@extends('main.app')
@section('title','User')
@section('page_title','User')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> User</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <h5 class="card-header">User</h5>
        <div class="card-body ">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Tambah User</a>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="userData">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
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
        const user_id = $('user_id').val();
        $('#userData').DataTable({
            "processing": true,
            "serviceSide": true,
            "responsive": true,
            "destroy": true,
            "ajax": {
                "url": base_url + "/users-data",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: web_token,
                    from_date: $('#from_date').val(), //request:value
                    to_date: $('#to_date').val(),
                    status: $('#status').val(),
                }
            },
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "id",
                },
                {
                    "data": "name",
                    "render": function(data, type, full, meta) {
                        if (type === 'display') {
                            var words = data.split(' '); // Membagi nama menjadi kata-kata

                            // Mengubah huruf pertama dari setiap kata menjadi huruf besar
                            var formattedName = words.map(function(word) {
                            return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
                            }).join(' ');

                            return formattedName;
                        }
                    return data;
                    }
                },
                {
                    "data": "email",
                },
                {
                    "data": "role",
                },
                {
                    "data": "options",
                }
            ],
            "drawCallback": function(settings) {
                initDeleteButton();
            //do whatever
            },
        });
    }

</script>
@endsection
