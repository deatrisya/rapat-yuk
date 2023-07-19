<div class="btn-group">
    <div class="ms-auto">
        @if ($data->status == 'PENDING')
        <div class="d-flex">
            <form action="{{ route('bookings.update',$data->id) }}" method="POST" class="me-2">
                @method('PUT')
                @csrf
                <button class="btn btn-success px-3 mb-0"><i class="bx bx-check" aria-hidden="true"></i>Setujui</button>
                <input type="hidden" name="status" value="DISETUJUI">
            </form>
            <form action="{{ route('bookings.update',$data->id) }}" method="POST" class="me-2">
                @method('PUT')
                @csrf
                <button class="btn btn-danger px-3 mb-0"><i class="bx bx-x" aria-hidden="true"></i>Tolak</button>
                <input type="hidden" name="status" value="DITOLAK">
            </form>
            <a class="btn btn-info px-3 mb-0 me-2" href="{{ $show }}"><i class="bx bx-show" aria-hidden="true"></i>Detail</a>
        </div>
        @else
        <a class="btn btn-info px-3 mb-0 me-2" href="{{ $show }}"><i class="bx bx-show"
                aria-hidden="true"></i>Detail</a>
        @endif
    </div>
</div>
