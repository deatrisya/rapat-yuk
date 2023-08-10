<div class="btn-group">
  <div class="ms-auto text-end">
    <a href="{{$show}}" class="btn btn-icon btn-info"><i class="bx bx-show"></i></a>
    <form id="delete-form-{{ $data->id }}" action="{{ route('room.destroy', ['room' => $data->id]) }}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
    </form>
  </div>
</div>
