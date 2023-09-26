<div class="btn-group">
    <div class="ms-auto">
        <a class="btn btn-info px-3 mb-0 me-2" href="{{ $show }}"><i class="bx bx-show"
                aria-hidden="true"></i>Detail</a>
        @if ($data->online_meeting && !$data->link_zoom)
            <a href="#" class="btn btn-icon btn-danger }} px-3 mb-0 me-2"
                data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title="Link Zoom" data-bs-toggle="modal"
                data-bs-target="#modalCenter-{{ $data->id }}"><i class='bx bx-link-alt'></i></a>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCenter-{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Masukkan Link Zoom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('bookings.updateLink',$data->id) }}">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Link Zoom Meeting</label>
                            <input type="text" class="form-control" name="link_zoom"
                                placeholder="Link Zoom" required />
                            <input type="hidden" name="admin_id" value="{{ Auth::user()->id}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
