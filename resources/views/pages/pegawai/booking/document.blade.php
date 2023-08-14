@if ($data->resume)
    <div class="text-center">
        <a href="{{ route('download.document', $data->id) }}" class="btn btn-icon btn-success" data-bs-toggle="tooltip" data-bs-offset="0,4"
            data-bs-placement="bottom" data-bs-html="true" title="Download Dokumen"><i class='bx bxs-file'></i></a>
    </div>
@else
 <p class="text-center">-</p>
@endif
