@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin/app/js/banners.js') }}?ver=@php echo filemtime('admin/app/js/banners.js') @endphp">
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
                        {!! Form::open(['url' => route('slide_handle_add'), 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tên Slide</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="">
                            @error('name')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
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
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <x-admin.form.file name='img' id="imgSlide" />
                        {{-- <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" multiple id="imgSlide">
                                <label class="custom-file-label" for="imgSlide" id="forSlide">Hình ảnh slide size không
                                    vượt
                                    quá
                                    500kb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg</label>
                            </div>
                            @error('img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group mb-5">
                            <label for="">Vị trí</label>
                            <select class="custom-select" name="index" id="">
                                <option value="">Vị trí</option>
                                @foreach (Config::get('navi.index_slides') as $index)
                                    <option value="{{ $index }}">{{ $index }}</option>
                                @endforeach
                            </select>
                            @error('index')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            @if (session('index'))
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    Vị trí này đã có slide đang hiển thị
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div> --}}

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
                    <div class="card-body w-100 row" id="slide__show">
                        <x-admin.slides.show :slides="$slides" />
                    </div>
                    <div class="modal fade" id="slideModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                        aria-labelledby="slideModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="slideModalLabel">Chỉnh sửa slide</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['url' => '#', 'method' => 'POST', 'files' => true, 'class' => 'formUpdateSlide']) !!}
                                <div class="modal-body" id="slideModalContent">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary saveSlide">Save</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
