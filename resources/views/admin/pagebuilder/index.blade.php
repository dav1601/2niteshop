@extends('admin.layout.app')

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('name')
    Quản Lý Page Builder
@endsection

@section('content')
    <div class="col-12 sta__item mt-4">
        <div class="w-100">
            <div class="card">
                <div class="card-header">
                    Danh sách page
                </div>
                <div class="card-body">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Type</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <th> {{ $page->id }} </th>
                                    <td> {{ $page->title }} </td>
                                    <td> {{ $page->slug }} </td>
                                    <td> {{ $page->type }} </td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('pgb.create.or.edit', ['type' => 'edit', 'id' => $page->id]) }}"
                                            role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-danger pgb-page-remove ml-2" data-id="{{ $page->id }}"
                                            data-href="#" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
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
