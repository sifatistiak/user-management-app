<form action="{{ route('users.delete.permanent', $id) }}" method="post" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('delete')
    <div class='btn-group'>
        <button type="submit" class='btn btn-xs border border-red-300 hover:bg-red-300'>
            <i class="fa fa-times"> </i>
        </button>

        <a href="{{ route('users.restore', $id) }}" class="btn btn-xs border hover:bg-emerald-500">
            <i class="fas fa-trash-restore"></i>
        </a>
    </div>
</form>
