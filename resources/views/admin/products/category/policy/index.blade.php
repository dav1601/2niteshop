@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/category.js')}}?ver=@php echo filemtime('admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Chinh sách của shop
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Chính Thành Công");
</script>
@endif
@if (session('delete'))
<script>
    toastr.success("Xoá Chính Sách Thành Công");
                         $(function () {
                         $(document).scrollTop($('#plc__show').offset().top);
                        // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
                        });
</script>
@endif
<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Chính Sách
                </div>
                <div class="card-body" id="plc__add">
                    {!! Form::open(['url' => route('handle_add_plc') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tiêu Đề Chính Sách </label>
                        <input type="text" class="form-control" name="name" id="" placeholder="">
                        @error('name')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" name="icon" id="" placeholder="">
                        @error('icon')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Vị trí</label>
                        <select class="custom-select" name="position" id="">
                           @foreach (Config::get('product.position') as $p )
                               <option value="{{ $p }}">{{ $p }}</option>
                           @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Nội Dung</label>
                        <textarea name="content" id="plc__tiny" class="form-control my-editor"></textarea>
                        @error('content')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">FullSet</label>
                        <select class="custom-select" name="fullset" id="">
                            <option value="0">Không</option>
                            <option value="1">FullSet</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Chính Sách" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------- --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Chính Sách Của Shop
                </div>
                <div class="card-body" id="plc__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu Đề</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Nội Dung</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($policy as $plc)
                            <tr>
                                <th scope="row">{{ $plc -> id }}</th>
                                <td>{{ $plc -> title }}</td>
                                <td class="icon">{!! $plc -> icon !!}</td>
                                <td>{{ $plc -> position }}</td>
                                <td>{!! $plc -> content !!}</td>
                                <td class="de">
                                    <a href="{{ route('edit_plc', ['id'=>$plc -> id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td class="de">
                                    <a href="{{ route('handle_delete_plc', ['id'=>$plc -> id]) }}">
                                        <i class="fas fa-trash"></i>
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
</div>
@endsection
