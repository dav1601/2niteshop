@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin/app/js/category.js') }}?ver=@php echo filemtime('admin/app/js/category.js') @endphp">
    </script>
    <script src="{{ asset('admin/app/js/related_all.js') }}"></script>
    <script src="{{ asset('admin/plugin/tags/tagsinput.js') }}"></script>
@endsection

@section('name')
    Danh Mục Sản Phẩm
@endsection

@section('content')
    <input type="hidden" name="" id="array__selected" value="{{ $selected }}">
    <input type="hidden" name="" id="url__selected" value="{{ $url }}">
    <input type="hidden" name="" id="array__selected--blog" value="{{ $selected_blog }}">
    <div id="cat__add--product">
        <div class="row mx-0">
            <div class="col-12 mt-4 p-0">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            Thêm Danh Mục
                        </div>
                        @if (session('ok'))
                            <script>
                                toastr.success("Thêm Danh Mục Thành Công");
                            </script>
                        @endif
                        @if (session('error'))
                            <script>
                                toastr.error("Bạn Chỉ Được Thêm Icon Cho Danh Mục Chính");
                            </script>
                        @endif
                        @if (session('delete'))
                            <script>
                                toastr.success("Xoá Danh Mục Thành Công");
                                $(function() {
                                    $(document).scrollTop($('.offset_cat').offset().top);
                                    // END READYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
                                });
                            </script>
                        @endif
                        <div class="card-body">
                            {!! Form::open(['url' => route('handle_add_cat'), 'method' => 'POST', 'files' => true]) !!}
                            <div class="form-group mb-5">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id=""
                                    placeholder="Tên Danh Mục (!Duy Nhất)" value="{{ old('name') }}">
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
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" id=""
                                    placeholder="Title Danh Mục" value="{{ old('title') }}">
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
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" id=""
                                    placeholder="Slug (!Duy Nhất)" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            {{-- --}}
                            <div class="form-group mb-5">
                                <label for="">Description</label>
                                <textarea type="text" class="form-control" name="desc" id="" placeholder="Description danh mục">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            {{-- --}}
                            <div class="form-group mb-5">
                                <label for="">Keywords</label>
                                <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                                    value="">
                                @error('keywords')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            {{-- --}}
                            <div class="form-group mb-5">
                                <label for="">Danh Mục Cha</label>
                                <select class="custom-select" name="parent" id="">
                                    <option value="0">Là Danh Mục Chính</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ str_repeat('--', $cat->level) }}
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- --}}
                            <x-admin.form.file name='img' id="imgCategory" :custom="['plh' => 'Banner']" />

                            <x-admin.form.file name='icon' id="iconCategory" :custom="[
                                'plh' => 'Icon Danh Mục (!Chỉ
                                                                                                                    dành cho
                                                                                                                    danh mục CHÍNH)',
                            ]" />


                            <div class="form-group mb-5">
                                <input type="submit" value="Thêm Danh Mục" class="btn w-100 navi_btn text-center">
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- END ADD --}}
            <div class="col-12 mt-4">
                <div class="w-100">
                    <div class="card --main">
                        <div class="card-header text-center">
                            <h2>Danh Sách Danh Mục</h2>
                        </div>
                        <div class="card-body">

                            <ul class="admin-cate admin-cate-connect row no-gutters lv-0" id="admin-cate-0"
                                data-lv="0">
                                <x-admin.category.dd.item :categories="$categories" />
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- END SHOW --}}
        </div>
    </div>
@endsection
