<div class="form-group">
    <label for="select-role" class="d-block mb-2">Include All Permissions Of Role:</label>
    <select class="custom-select mt-2" name="" id="select-role">
        <option selected>Select Role</option>
        @if (count($roles) > 0)
            @foreach ($roles as $role)
                <option value="{{ implode(',',collect($role->permissions)->pluck('name')->toArray()) }}">
                    {{ $role->name }} </option>
            @endforeach
        @endif


    </select>
</div>
