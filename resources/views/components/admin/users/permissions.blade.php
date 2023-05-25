@if (count($permissions) > 0)
    @foreach ($permissions as $permission)
        <div class="custom-control custom-checkbox ml-4">
            <input type="checkbox" @if (in_array($permission->name, $selected)) checked @endif id="permissions-{{ $permission->id }}"
                name="permissions[]" value="{{ $permission->name }}" class="custom-control-input include-permissions">
            <label class="custom-control-label" for="permissions-{{ $permission->id }}"> {{ $permission->name }}
            </label>
        </div>
    @endforeach
@endif
