@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
@endsection

@section('name')
    Edit Role
@endsection

@section('content')
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Create Role
                </div>
                <div class="card-body">
                    {!! Form::open([
                        'url' => route('handle_roles', ['type' => 'edit', 'id' => $currRole->id]),
                        'method' => 'POST',
                    ]) !!}
                    <input type="text" class="form-control" disabled value="{{ $currRole->name }}" disabled
                        placeholder="Nhập Role" name="role" aria-describedby="helpId" placeholder="">
                    <div class="form-group col-12 row no-gutters my-4 px-0">
                        {{-- <div class="col-6 overflow-y-scroll" style="height: 200px">
                            <label for="">Include All Permissons Of Role:</label>
                            @foreach ($roles as $role)
                            @php

                            @endphp
                                @if ($role->name !== 'super-admin')
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                            value="{{ implode(',',collect($role->permissions)->pluck('name')->toArray()) }}"
                                            class="custom-control-input include-permissions-of-role">
                                        <label class="custom-control-label" for="customCheck1"> {{ $role->name }} </label>
                                    </div>
                                @endif
                            @endforeach

                        </div> --}}
                        <div class="col-12">
                            <label for="">Permissions:</label>
                            <div class="mt-2" style="height: 300px; overflow-y: scroll" id="list_permissions">
                                <x-admin.users.permissions :permissions="$permissions" :selected="$selected" />
                            </div>

                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <input type="submit" value="Update Role Has Permissions" class="btn w-100 navi_btn text-center">
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
