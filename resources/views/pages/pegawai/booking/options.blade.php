<div class="btn-group">
    <div class="ms-auto">

       <div class="d-flex">
        <form action="{{ route('updateStatus',$data->id) }}" method="post" class="me-1" id="cancel-form">
            @if ($data->status !== 'BATAL')
                @method('PUT')
                @csrf
                <button class="btn btn-icon btn-danger cancel-button"><i class="bx bx-x"></i></button>
                <input type="hidden" name="status" value="BATAL">
            @endif
        </form>
        <div class="group">
            @if ($data->status == 'DISETUJUI')
            <a href="{{ $edit }}" class="btn btn-icon btn-warning"><i class="bx bx-edit"></i></a>
            @endif
            <a href="{{ $show }}" class="btn btn-icon btn-primary"><i class="bx bx-show"></i></a>
        </div>
    </div>
    </div>
</div>
