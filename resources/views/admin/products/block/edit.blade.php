{{--  Làm edit và delete và in ra detail product client --}}
@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="{{ asset('admin/app/js/products.js') }}?ver=@php echo filemtime('admin/app/js/products.js') @endphp">
    </script>
    <script src="{{ asset('admin/app/js/tinymce.js') }}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
    </script>
@endsection
@section('name')
    Thêm Block Sản Phẩm
@endsection
@section('content')
    @if (session('succes') == 1)
        <script>
            toastr.success("Update thành công");
        </script>
    @elseif (session('succes') == 2)
        <script>
            toastr.error("Update thất bại");
        </script>
    @endif


    <div id="block__product" class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Update Block Sản Phẩm
                    </div>
                    <div class="card-body" id="block__product__add">
                        {!! Form::open([
                            'url' => route('product_block_handle', ['type' => 'edit', 'block_id' => $block->id]),
                            'method' => 'POST',
                        ]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id=""
                                value="{{ $block->title }}" placeholder="">
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
                            <textarea name="text" id="block__product__tiny" class="form-control my-editor">{!! $block->text !!}</textarea>
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
                            <input type="submit" value="Cập nhật" class="btn navi_btn w-100">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Làm preview cho text --}}
