<div class="btn-group">
    <div class="ms-auto text-end">
        <a href="{{ $edit }}" class="btn btn-icon btn-warning"><i class="bx bx-edit"></i></a>
        <a href="{{ route('users.destroy',$data->id) }}" class="btn btn-icon btn-danger delete-button"><i class="bx bx-trash"></i></a>
        {{-- <form action="{{ route('users.destroy',$data->id) }}" method="POST" >
            @method('DELETE')
            @csrf
            <input type="hidden" name="_method" value="DELETE">
        </form> --}}
    </div>
</div>
