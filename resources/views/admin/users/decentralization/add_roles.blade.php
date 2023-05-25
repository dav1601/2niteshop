@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script src="{{ $file->ver('admin/app/js/user.js') }}"></script>
@endsection

@section('name')
    Create Roles
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
                        'url' => route('handle_roles', ['type' => 'create']),
                        'method' => 'POST',
                    ]) !!}
                    <input type="text" class="form-control" value="" placeholder="Nhập Role" name="role"
                        aria-describedby="helpId" placeholder="">
                    <div class="form-group col-12 row no-gutters my-4 px-0">
                        <div class="col-6 pr-2">
                            <div class="mt-2 px-2" style="height: 300px; overflow-y: scroll">
                                <x-admin.users.roles.checkbox :roles="$roles" />
                            </div>

                        </div>
                        <div class="col-6 pl-2">
                            <label for="">Permissions:</label>
                            <div class="mt-2" style="height: 300px; overflow-y: scroll" id="list_permissions">
                                <x-admin.users.permissions :permissions="$permissions" />
                            </div>

                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <input type="submit" value="Create" class="btn w-100 navi_btn text-center">
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    List Roles
                </div>
                <div class="card-body">
                    <table class="table-bordered table text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Permissions Of Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td scope="row">#{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td style="width:60%;">
                                        <x-admin.users.permissions.badge :permissions="$role->permissions" />
                                    </td>
                                    <td>
                                        <a href="{{ route('edit_roles', ['id' => $role->id]) }}"
                                            class="btn btn-outline-primary ml-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a data-href="{{ route('handle_roles', ['type' => 'delete', 'id' => $role->id]) }}"
                                            class="btn btn-outline-primary delete-route">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
