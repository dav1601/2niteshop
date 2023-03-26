@extends('admin.layout.app')

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/page_builder.js') }}"></script>
@endsection

@section('name')
    Thêm Sản Phẩm
@endsection

@section('content')
    <div id="create-page-builder">
        <x-admin.pagebuilder.create />
    </div>
    
@endsection
