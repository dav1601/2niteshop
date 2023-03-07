@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/blogs.js')}}?ver=@php echo filemtime('admin/app/js/blogs.js') @endphp">
</script>
@endsection

@section('name')
Danh Mục Bài Viết
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Sửa Bài Viết Thành Công");
</script>
@endif
<div class="row mx-0">


    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                   Sửa Bài Viết
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => route('handle_edit_blog' , ['id' => $blog->id]) , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" id="" placeholder="">
                        @error('title')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">DESC</label>
                        <textarea name="desc" class="form-control" rows="10">{!! $blog->desc !!}</textarea>
                        @error('desc')
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
                            <input type="file" name="img" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="img" id="forImg">Đổi Hình ảnh bài viết ( không đổi bỏ qua phầN này)</label>
                        </div>
                        @error('img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="form-group mt-4">
                            <img src="{{ asset($blog->img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Danh mục bài viết</label>
                        <select class="custom-select" name="cat" id="">
                            <option value="{{ $blog->cat_id }}">{{ App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name }}</option>
                            @foreach ($category_blog as $cb )
                            @if ($cb ->id != $blog->cat_id)
                            <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                            @endif
                            @endforeach

                        </select>
                        @error('cat')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            @if ($blog->cat_sub_id != NULL)
                            <option value="{{ $blog->cat_sub_id }}">{{ App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name }}</option>
                            @foreach ($category_blog as $cb )
                            @if ($cb ->id != $blog->cat_sub_id)
                            <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                            @endif
                            @endforeach
                            @else
                            <option value="">Chọn  danh mục 2</option>
                            @foreach ($category_blog as $cb )
                            <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                            @endforeach
                            @endif


                        </select>
                        @error('cat_2')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Content</label>
                        <textarea name="content" id="content__blog"
                            class="form-control my-editor">{!! $blog->content !!}</textarea>
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
                        <input type="submit" value="Cập Nhật Bài Viết" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                    <div class="form-group mb-5">
                        <a href="{{ route('show_blogs') }}" class="btn w-100 text-center navi_btn">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
