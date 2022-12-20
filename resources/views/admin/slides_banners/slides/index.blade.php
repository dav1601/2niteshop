@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/banners.js')}}?ver=@php echo filemtime('public/admin/app/js/banners.js') @endphp">
</script>
@endsection

@section('name')
Quản lý Slides
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Slide Thành Công");
</script>
@endif
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Slide
                </div>
                <div class="card-body" id="slide__add">
                    {!! Form::open(['url' => route('slide_handle_add') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên Slide</label>
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
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="imgSlide">
                            <label class="custom-file-label" for="imgSlide" id="forSlide">Hình ảnh slide size không vượt
                                quá
                                500kb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg</label>
                        </div>
                        @error('img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Link Banner</label>
                        <input type="text" class="form-control" name="link" id="" placeholder="">
                        @error('link')
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
                        <select class="custom-select" name="index" id="">
                            <option value="">Vị trí</option>
                            @foreach ( Config::get('navi.index_slides') as $index )
                            <option value="{{ $index }}">{{ $index }}</option>
                            @endforeach
                        </select>
                        @error('index')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if (session('index'))
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            Vị trí này đã có slide đang hiển thị
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Trạng thái</label>
                        <select class="custom-select" name="stt" id="">
                            <option value="1">Hiển thị</option>
                            <option value="2">Chờ</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm Slide" class="btn w-100 navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------------------------------------- --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách slides
                </div>
                <div class="card-body" id="slide__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Link</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Vị trí</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người đăng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody id="output__slide">
                            @foreach ($slides as $slide )
                            <tr>
                                <th scope="row">{{ $slide->id }}</th>
                                <td>{{ $slide->name }}</td>
                                <td>{{ $slide->link }}</td>
                                <td>
                                    <img src="{{ asset( $slide->img ) }}" width="200" class=" va-radius-fb " alt="">
                                </td>
                                <td>
                                    <select class="custom-select" name="" id="slide__show--index"
                                        data-id="{{ $slide->id }}" data-stt="{{ $slide->status }}">
                                        <option value="{{ $slide->index }}">{{ $slide->index }}</option>
                                        @foreach (Config::get('navi.index_slides') as $index)
                                        @if ($index != $slide->index )
                                        <option value="{{ $index }}">{{ $index }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select" name="" id="slide__show--stt"
                                        data-id="{{ $slide->id }}" data-index=" {{ $slide->index }}">
                                        <option value="{{ $slide->status }}">{{ slide_stt($slide->status) }}</option>
                                        @foreach (Config::get('navi.status_slides') as $stt)
                                        @if ($stt != $slide->status )
                                        <option value="{{ $stt }}">{{ slide_stt($stt) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">{{ $slide->author_post }}</td>
                                <td>{{ $carbon -> create($slide->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh')) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('slide_delete', ['id'=>$slide->id]) }}" class="delete_slide">
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
