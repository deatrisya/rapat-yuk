<div class="btn-group">
    <div class="ms-auto">

       <div class="d-flex">
        <form action="{{ route('booking.updateStatus',$data->id) }}" method="post" class="me-1" id="cancel-form-{{ $data->id }}">
            @if ($data->status !== 'BATAL' && $data->status !== 'SELESAI')
                @method('PUT')
                @csrf
                <button class="btn btn-icon btn-danger cancel-button" data-bs-toggle="tooltip" data-bs-offset="0,4"
        data-bs-placement="bottom" data-bs-html="true"
        title="Batalkan pemesanan" data-row-id="{{ $data->id }}"><i class="bx bx-x"></i> </button>
                <input type="hidden" name="status" value="BATAL">
            @endif
        </form>
        <div class="group">
            @if ($data->status == 'DISETUJUI' || $data->status == 'DIGUNAKAN')
            <a href="{{ $edit }}" class="btn btn-icon btn-warning"><i class="bx bx-edit"></i></a>
            @endif
            <a href="{{ $show }}" class="btn btn-icon btn-primary"><i class="bx bx-show"></i></a>
        </div>
    </div>
    </div>
</div>



