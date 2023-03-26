<!DOCTYPE html>
@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('name')
    Thêm Block Danh Mục Sản Phẩm
@endsection

@section('content')
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Block Danh Mục Sản Phẩm
                    </div>
                    <div class="card-body">
                        {!! Form::open([
                            'url' => route('category_block_handle', ['type' => $type, 'id' => $isa ? 0 : $block->id]),
                            'method' => 'POST',
                        ]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id=""
                                value="{{ $isa ? old('title') : $block->title }}" placeholder="">
                            @error('title')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-5">
                            <label for="">Content</label>
                            <textarea type="text" id="block__category__tiny" name="content" class="form-control my-editor">{!! $isa ? old('content') : $block->content !!}</textarea>
                            @error('content')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" value="Thêm Block Danh Mục Sản Phẩm" class="btn navi_btn w-100">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @if ($isa)
            <div class="col-12 mt-4 p-0">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            Danh sách block sản phẩm
                        </div>
                        <div class="card-body" id="block__product__table">

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
{{-- Làm preview cho text --}}
<div class="modal fade" id="m_blockCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-black-50"></h5>
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
<x-admin.modal.product.select btn="blockPrd" />
