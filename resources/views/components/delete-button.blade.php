<form class="d-inline" id="deleteForm-{{ $id }}" action="{{ $href }}" method="post">
    @method('DELETE')
    @csrf
    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $id }})">
        <i class="fe fe-trash-2 fa-2x"></i>
    </button>

</form>
