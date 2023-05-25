@props(['name'])
@error($name)
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@enderror
