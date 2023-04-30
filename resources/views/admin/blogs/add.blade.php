@extends('admin.layout.app')

@section('import_js')
    <script src="{{ $file->ver('admin/app/js/blogs.js') }}"></script>
@endsection

@section('name')
    Danh Mục Bài Viết
@endsection

@section('content')
    @if (session('ok'))
        <script>
            toastr.success("Thêm Thể Loại Thành Công");
        </script>
    @endif
    @if (session('delete'))
        <script>
            toastr.success("Xoá Thể Loại Thành Công");
        </script>
    @endif
    <div class="row mx-0">


        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Blog
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => route('handle_add_blog'), 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="">
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
                            <label for="">DESC</label>
                            <textarea name="desc" class="form-control">{!! old('desc') !!}</textarea>
                            @error('desc')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <x-admin.form.file name='img' id="imgBlog" :custom="[
                            'plh' => 'Hình ảnh bài viết',
                        ]" />
                        {{-- <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="img" id="forImg">Hình ảnh bài viết</label>
                        </div>
                        @error('img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div> --}}
                        <div class="form-group mb-5">
                            <label for="">Danh mục bài viết</label>
                            <select class="custom-select" name="cat" id="">
                                <option value="">Chọn danh mục</option>
                                @foreach ($category_blog as $cb)
                                    <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                                @endforeach

                            </select>
                            @error('cat')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Danh mục 2 bài viết</label>
                            <select class="custom-select" name="cat_2" id="">
                                <option value="">Chọn danh mục 2</option>
                                @foreach ($category_blog as $cb)
                                    <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                                @endforeach

                            </select>
                            @error('cat_2')
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
                            <select class="custom-select" name="type_content" id="blog_seclect_content">
                                <option selected value="">Chọn Loại Content</option>
                                <option value="def">Text Editor (tinymce)</option>
                                <option value="pgb">Page Builder</option>
                            </select>

                        </div>
                        <div id="blog_editor" class="d-none">
                            <textarea name="content" id="content__blog" class="form-control my-editor">{!! old('content') !!}</textarea>
                            @error('content')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-none" id="blog_pgb">
                            <x-admin.relation.rela rl="blogs-pgb" />
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-5">
                                <input type="submit" value="Thêm Bài Viết" class="btn w-100 navi_btn text-center">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
