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
                            <div class="form-group w-100">
                                {!! Form::open(['url' => route('crawler.category'), 'method' => 'POST']) !!}
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="url" required
                                            placeholder="Nhập Url của danh mục halo shop">

                                    </div>
                                    <div class="col-3">
                                        <input type="submit" value="Crawl" class="btn w-100 navi_btn text-center">

                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            {!! Form::open(['url' => route('handle_add_cat'), 'method' => 'POST', 'files' => true]) !!}
                            <div class="form-group mb-5">
                                <label for="">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id=""
                                    placeholder="Tên Danh Mục (!Duy Nhất)"
                                    value="{{ old('name') }}{{ get_crawler('page_title') }}">
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
                                    placeholder="Title Danh Mục" value="{{ old('title') }}{{ get_crawler('title') }}">
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
                                    placeholder="Slug (!Duy Nhất)" value="{{ old('slug') }}{{ get_crawler('slug') }}">
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
                                <textarea type="text" class="form-control" name="desc" id="" placeholder="Description danh mục">{{ old('desc') }}{{ get_crawler('desc') }}</textarea>
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
                                    value="{{ get_crawler('kws') }}">
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
                                    <x-admin.form.select.option :categories="$categories" />
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
    <div class="modal show" id="m_editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="m_editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            {!! Form::open(['url' => '#', 'method' => 'POST', 'files' => true, 'class' => 'formUpdateCategory']) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
