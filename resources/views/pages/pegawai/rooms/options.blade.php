<div class="btn-group">
  <div class="ms-auto text-end">
    <a href="{{$show}}" class="btn btn-icon btn-info"><i class="bx bx-show"></i></a>

    <!-- <a class="btn btn-icon btn-danger" href="#" onclick="deleteRoom({{ $data->id }})">
      <i class="bx bx-trash"></i> 
    </a>

    <form id="delete-form-{{ $data->id }}" action="{{ route('room.destroy', ['room' => $data->id]) }}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
    </form>

    <script>
      function deleteRoom(roomId) {
        Swal.fire({
          title: 'Apakah Anda yakin ingin menghapus data ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('delete-form-' + roomId).submit();
          }
        });
      }
    </script> -->


  </div>
</div>