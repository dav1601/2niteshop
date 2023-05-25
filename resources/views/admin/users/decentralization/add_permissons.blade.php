@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
@endsection

@section('name')
    Create Permissons
@endsection

@section('content')
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Create Permissons
                </div>
                <div class="card-body">
                    {!! Form::open([
                        'url' => route('handle_permissions', ['type' => 'create']),
                        'method' => 'POST',
                        'files' => true,
                    ]) !!}
                    <input type="text" class="form-control" value="" data-role="tagsinput" name="permissons"
                        aria-describedby="helpId" placeholder="">
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
                    List Permissions
                </div>
                <div class="card-body">
                    <table class="table-bordered table text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Role Has Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td scope="row">#{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        {{ implode(',',collect($permission->roles)->pluck('name')->toArray()) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('handle_permissions', ['type' => 'delete', 'id' => $permission->id]) }}"
                                            class="btn btn-outline-primary">
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
