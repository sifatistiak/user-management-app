<form action="{{ route('users.destroy', $id) }}" method="post" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('delete')
    <div class='btn-group'>
        <a href="{{ route('users.show', $id) }}" class='btn btn-xs border border-blue-300 hover:bg-blue-300'>
            <i class="fa fa-eye"> </i>

        </a>
        <a href="{{ route('users.edit', $id) }}" class='btn btn-xs border border-orange-300 hover:bg-orange-300'>
            <i class="fa fa-pencil"></i>
        </a>
        <button type="submit" class="btn btn-xs border  border-red-300 hover:bg-red-300">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</form>
