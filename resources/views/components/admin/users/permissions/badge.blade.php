@if (count($permissions) > 0)
    @foreach ($permissions as $permission)
        <span class="badge badge-primary" > {{ $permission->name }}</span>
    @endforeach
@endif
