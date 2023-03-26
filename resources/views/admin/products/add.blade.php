@extends('admin.layout.app')

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/products.js') }}"></script>
    <script>
        // if (route('current'))
        var producer = {{ Js::from($producer) }};
    </script>
    {{-- <script src="{{ asset('admin/app/js/related_all.js') }}"></script> --}}
@endsection

@section('name')
    Thêm Sản Phẩm
@endsection

@section('content')
    @if (Session::has('ok'))
        <script>
            toastr.success("Thêm Sản Phẩm Thành Công");
        </script>
    @endif

    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Thêm Sản Phẩm
                    </div>

                    <div class="card-body" id="product__add">
                        {!! Form::open(['url' => route('crawler'), 'method' => 'post']) !!}
                        <div class="form-group d-flex mb-5">
                            <input type="text" class="form-control" required name="url" value=""
                                placeholder="Nhập Url để tự động crawl dữ liệu">
                            <input type="submit" value="Crawl Data" class="btn navi_btn mb-5 ml-2">
                        </div>

                        {!! Form::close() !!}

                        {{-- ----------- --}}
                        {!! Form::open(['url' => route('product_handle_add'), 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id=""
                                value="{{ old('name') }}{{ get_crawler('page_title') }}" placeholder="">
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
                            <label for="">Mô tả ngắn</label>
                            @php
                                $desc = '';
                                $kws = '';
                                if (count($crawler) > 0) {
                                    $meta = get_crawler('meta');
                                    $desc = $meta['desc'];
                                    $kws = $meta['kws'];
                                }
                            @endphp
                            <textarea class="form-control" name="des" id="" rows="4">{{ $desc }}{{ old('des') }}</textarea>
                            @error('des')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Keywords</label>
                            <input type="text" data-role="tagsinput" class="form-control" name="keywords"
                                value="{{ $kws }}{{ old('keywords') }}">
                            @error('keywords')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            @php
                                $price = 0;
                                $price_cost = 0;
                                if (count($crawler) > 0) {
                                    $price = (int) get_crawler('price') != 0 ? (int) get_crawler('price') : (int) get_crawler('price_new');
                                    $price_cost = $price - ($price * 20) / 100;
                                }

                            @endphp
                            <label for="">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" name="price"
                                value="{{ old('price') }}{{ $price }}" id="prd_price" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                            </div>
                            @error('price')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Giá gốc Sản Phẩm</label>
                            <input type="text" class="form-control" name="historical_cost"
                                value="{{ old('historical_cost') }}{{ $price_cost }} " id="historical_cost"
                                placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price--cost pl-2">0đ</strong></span>
                            </div>
                            @error('historical_cost')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Discount</label>
                            <input type="text" class="form-control" name="discount" value="{{ old('discount') }}"
                                id="discount" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="pl-2">0đ</strong></span>
                            </div>
                            @error('discount')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Model</label>
                            <input type="text" class="form-control" name="model"
                                value="{{ old('model') }}{{ get_crawler('model') }}" id="" placeholder="">
                            @error('model')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Option 1: Video </label>
                            <input type="text" class="form-control" name="video" value="{{ old('video') }}"
                                id="" placeholder="Điền mã nhúng Youtube vào đây">
                            @error('video')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="">Thông Tin</label>
                            <textarea name="info" id="info__tiny" class="form-control my-editor">{!! old('info') !!}{!! get_crawler('spec') !!}</textarea>
                            @error('info')
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
                            <textarea name="content" id="content__tiny" class="form-control my-editor">{!! old('content') !!}</textarea>
                            @error('content')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <x-admin.form.file name='main_img' id="imgProductMain" :custom="[
                            'plh' => 'Hình Ảnh Chính
                                                                                                                                                            305x305',
                        ]" />
                        <x-admin.form.file name='sub_img' id="imgProductSub" :custom="[
                            'plh' => 'Hình Ảnh Phụ
                                                                                                                                    305x305',
                        ]" />

                        <x-admin.form.file name='bg' id="imgProductBg" :custom="[
                            'plh' => 'Hình Ảnh Backgroud
                                                                                                                                                                                                                                                                                                    (Không có bỏ
                                                                                                                                                                                                                                                                                                    qua)',
                        ]" />

                        <x-admin.form.file name='gll700' id="imgProduct700" :multiple="true" :custom="[
                            'plh' => 'Hình Ảnh Chi Tiết
                                                                                                                                                                                                                                                                                    700x700',
                        ]" />

                        <x-admin.form.file name='gll80' id="imgProduct80" :multiple="true" :custom="[
                            'plh' => 'Hình Ảnh Chi Tiết
                                                                                                                                                                                                                                                                                    80x80',
                        ]" />

                        <div class="row mx-0">
                            <x-admin.form.file class="col-6 pl-0" name='banner' id="bannerProduct" :custom="[
                                'plh' => 'Option 2: Banner
                                                                                                                                                                                                                                            Đi
                                                                                                                                                                                                                                            kèm',
                            ]" />
                            {{-- <div class="form-group col-6 mb-5 pl-0">
                                <div class="custom-file">
                                    <input type="file" name="banner" class="custom-file-input" id="banner_prd">
                                    <label class="custom-file-label" for="banner_prd" id="forBannerPrd">Option 2: Banner
                                        Đi
                                        kèm</label>
                                </div>
                                @error('banner')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group col-6 mb-5 pr-0">
                                <input type="text" class="form-control" name="banner_link" id=""
                                    placeholder="Option 2: Link Banner">
                                @error('banner_link')
                                    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="row mx-0">

                                <div class="col-12">
                                    <x-admin.product.categories :show="true" />
                                </div>
                                {{-- end danh muc khac --}}

                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-4 pl-0">
                                    <label for="">Kho</label>
                                    <select class="custom-select" name="stock">
                                        @foreach (Config::get('product.stock', '1') as $stock)
                                            <option value="{{ $stock }}">{{ stock_stt($stock) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Tình Trạng Sử Dụng</label>
                                    <select class="custom-select" name="usage_stt">
                                        @foreach (Config::get('product.usage_stt', '1') as $us)
                                            <option value="{{ $us }}">{{ usage_stt($us) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 pr-0">
                                    <label for="">Highlight</label>
                                    <select class="custom-select" name="highlight">
                                        @foreach (Config::get('product.highlight', '2') as $hl)
                                            <option value="{{ $hl }}">{{ highlight_stt($hl) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-12 p-0">
                                    <label for="">Nhà Sản Xuất</label>
                                    <div class="form-group row mx-0 mt-4">
                                        <input type="text" id="producer" name="producer"
                                            value="{{ get_crawler('producer') }}" class="form-control"
                                            placeholder="Nhập Tên Nhà sản xuất">

                                    </div>
                                    @error('producer')
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-4 pl-0">
                                    <label for="">Danh Mục Game</label>
                                    <select class="custom-select" name="cat_game" id="">
                                        <option value="0">Không Có</option>
                                        @foreach ($cat_game as $cg)
                                            <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_game')
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Loại sản phẩm</label>
                                    <select class="custom-select" name="type" id="type">
                                        <option value="">Chọn</option>
                                        @foreach ($type as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Loại Phụ</label>
                                    <select class="custom-select" name="sub_type" id="sub_type">
                                        <option value="0">Bạn chưa chọn loại sản phẩm</option>
                                    </select>
                                    @error('sub_type')
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- area related --}}
                        <div class="row">
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-ins" />
                            </div>

                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-plc" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="product-products" />

                            </div>
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-blogs" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-block" />
                            </div>
                            {{-- --}}
                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" value="Thêm Sản Phẩm" class="btn navi_btn w-100">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
