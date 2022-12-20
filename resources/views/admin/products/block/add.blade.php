<!DOCTYPE html>
@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="{{ asset('admin/app/js/products.js') }}?ver=@php echo filemtime('public/admin/app/js/products.js') @endphp">
    </script>
    <script src="{{ asset('admin/app/js/tinymce.js') }}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
    </script>
@endsection
@section('name')
    Thêm Block Sản Phẩm
@endsection

@section('content')
    @if (session('succes') == 1)
        <script>
            toastr.success("Thêm Block Sản Phẩm Thành Công");
        </script>
    @elseif (session('success') == 2)
        <script>
            toastr.success("Thêm Block Sản Phẩm Thất Bại");
        </script>
    @endif


    <div id="block__product" class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Block Sản Phẩm
                    </div>
                    <div class="card-body" id="block__product__add">
                        {!! Form::open(['url' => route('product_block_handle', ['type' => 'add']), 'method' => 'POST']) !!}
                        <div class="form-group mb-5">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id=""
                                value="{{ old('title') }}" placeholder="">
                            @error('text')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Text</label>
                            <textarea name="text" id="block__product__tiny" class="form-control my-editor">{!! old('text') !!}</textarea>
                            @error('text')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" value="Thêm Block Sản Phẩm" class="btn navi_btn w-100">
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
                        Danh sách block sản phẩm
                    </div>
                    <div class="card-body" id="block__product__table">
                        <x-admin.table.product.block :vadata="$data" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Làm preview cho text --}}
<div class="modal fade" id="modal__block--prev" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-black-50" id="block__prev--title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="block__prev--text">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
{{-- ------------------- --}}
<x-admin.modal.product.select  btn="blockPrd" />
