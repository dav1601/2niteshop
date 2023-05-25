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
    Create Product
@endsection

@section('content')
    <div id="product__add">
        <x-admin.layout.card class="mb-5">
            <x-slot name="heading" class="text-center">
                Crawl Data From Halo Shop
            </x-slot>
            <x-slot name="content" class="test">
                {!! Form::open(['url' => route('crawler'), 'method' => 'post']) !!}
                <div class="form-group">
                    <x-admin.layout.input.text required name="url" value="" placeholder="Nhập Url...">
                        <x-slot name="append">
                            <input type="submit" value="Crawl Data" class="btn navi_btn">
                        </x-slot>
                    </x-admin.layout.input.text>

                </div>

                {!! Form::close() !!}

            </x-slot>

        </x-admin.layout.card>

        {{-- ----------- --}}
        {!! Form::open(['url' => route('product_handle_add'), 'method' => 'POST', 'files' => true]) !!}
        <div class="w-100 row no-gutters">
            <div class="col-8 row no-gutters pr-4">
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-6">
                            <x-admin.layout.input.text required="true" :value="get_crawler('page_title')" name="name" label="name" />
                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.input.text label="slug" value="" disabled="true" name="slug" />
                        </div>
                        <div class="form-group col-6">
                            @php
                                $desc = '';
                                $kws = '';
                                if (count($crawler) > 0) {
                                    $meta = get_crawler('meta');
                                    $desc = $meta['desc'];
                                    $kws = $meta['kws'];
                                }
                            @endphp

                            <x-admin.layout.input.text label="meta keywords" :value="$kws" name="keywords"
                                placeholder="Type keyword and Enter" data-role="tagsinput" />
                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="model" name="model" :value="get_crawler('model')" />
                        </div>
                        <div class="form-group col-12">
                            <x-admin.layout.form.label text="meta desc" />
                            <textarea class="form-control" name="des" id="" rows="4">{{ $desc }}{{ old('des') }}</textarea>
                            <x-admin.layout.form.error name="des" />
                        </div>

                    </x-slot>
                </x-admin.layout.card>
                {{-- end general product --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Giá và kho</h6>
                    </x-slot>
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-6">
                            @php
                                $price = 0;
                                $price_cost = 0;
                                if (count($crawler) > 0) {
                                    $price = (int) get_crawler('price') != 0 ? (int) get_crawler('price') : (int) get_crawler('price_new');
                                    $price_cost = $price - ($price * 20) / 100;
                                }

                            @endphp
                            <x-admin.layout.input.text label="giá bán" required="true" name="price" class="input-price"
                                :value="$price" id="prd_price" placeholder="..." />
                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="giá gốc" required="true" name="historical_cost"
                                class="input-price" :value="$price_cost" id="historical_cost" placeholder="..." />

                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="số lượng" required="true" type="number" min="1"
                                name="quantity" id="quantity" value="0" />
                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="giá giảm" name="discount" id="discount" value="0"
                                class="input-price" />
                        </div>

                    </x-slot>
                </x-admin.layout.card>

                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Thông số và thông tin chi tiết</h6>
                    </x-slot>
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-6">
                            <x-admin.layout.form.label text="Thông số" />
                            <div class="w-100">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#mInfoProduct">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Editor
                                </button>
                            </div>
                            <x-admin.layout.form.error name="info" />
                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.form.label text="Thông tin chi tiết" />
                            <div class="w-100">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#mContentProduct">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>Editor
                                </button>
                            </div>
                            <x-admin.layout.form.error name="content" />
                        </div>

                    </x-slot>
                </x-admin.layout.card>
                {{-- -------------- --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Hình ảnh</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <x-admin.ui.form.image width="305px" height="305px" name='main_img' :required="true"
                                    id="imgProductMain" label="Hình ảnh chính" />
                            </div>
                            <div class="col-6 mb-3">
                                <x-admin.ui.form.image width="305px" height="305px" name='sub_img' id="imgProductMain"
                                    label="hình ảnh phụ" />
                            </div>
                            <div class="col-6">
                                <x-admin.ui.form.image width="305px" height="305px" name='bg' id="imgProductBg"
                                    label="hình ảnh background" />
                            </div>
                        </div>

                    </x-slot>

                </x-admin.layout.card>
                {{-- --------------- --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Hình ảnh chi tiết</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        <x-admin.form.file required="true" label="Hình Ảnh Chi Tiết 700x700" class="mb-5"
                            name='gll700' id="imgProduct700" :multiple="true" />

                        <x-admin.form.file label="Hình Ảnh thu nhỏ 80x80" name='gll80' id="imgProduct80"
                            :multiple="true" />
                    </x-slot>

                </x-admin.layout.card>
                {{-- ---------------- --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Các liên kết của sản phẩm</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        <div class="row">
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-ins" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-plc" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="product-products" />

                            </div>
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-blogs" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-block" />
                            </div>
                            {{-- --}}
                        </div>
                    </x-slot>

                </x-admin.layout.card>
                <x-admin.layout.form.submit />
            </div>

            {{-- end-left --}}
            {{-- ----------- --}}
            <div class="col-4">
                <div class="row w-100 no-gutters">
                    <div class="col-12 mb-4">
                        <x-admin.product.categories :show="true" col="col-12">
                            <x-slot name="cusAttrInput" class="category_create_product"></x-slot>
                        </x-admin.product.categories>
                    </div>
                    <x-admin.layout.card class="col-12">
                        <x-slot name="heading" class="">
                            Associations
                        </x-slot>
                        <x-slot name="content" class="">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <x-admin.layout.input.text label="Ngày mở bán" id="date_sold" name="date_sold"
                                        required="true" disabled>
                                        <x-slot name="append">
                                            <button type="button" class="btn btn-primary date-picker"
                                                data-target="#date_sold">
                                                <i class="fa-solid fa-calendar"></i>
                                            </button>
                                        </x-slot>
                                    </x-admin.layout.input.text>
                                </div>
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="Tình trạng sản phẩm" />
                                    <select class="custom-select" name="usage_stt">
                                        @foreach (Config::get('product.usage_stt', '1') as $us)
                                            <option value="{{ $us }}">{{ usage_stt($us) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="sản phẩm nổi bật" />
                                    <select class="custom-select" name="highlight">
                                        @foreach (Config::get('product.highlight', '1') as $hl)
                                            <option value="{{ $hl }}">{{ highlight_stt($hl) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{--  --}}
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="danh mục game" />
                                    <select class="custom-select" name="cat_game" id="">
                                        <option value="0">Select Category Game</option>
                                        @foreach ($cat_game as $cg)
                                            <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-admin.layout.form.error name="cat_game" />
                                </div>
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="phân loại sản phẩm" />
                                    <select class="custom-select" name="type" id="type">
                                        <option value="">Select Type Product</option>
                                        @foreach ($type as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-admin.layout.form.error name="type" />
                                </div>
                                {{-- -------- --}}
                                <div class="col-12">
                                    <x-admin.layout.input.text label="Nhà Sản Xuất" name="producer" id="producer"
                                        :value="get_crawler('producer')" aria-describedby="producerHelp"
                                        placeholder="Nhập Tên Nhà sản xuất" />
                                    <small id="producerHelp" class="form-text text-muted mt-2">Nếu nhà sản xuất không có
                                        trong
                                        dánh sách gợi ý thì hệ thống sẽ tự động thêm vào.</small>
                                </div>

                                {{-- end --}}
                            </div>
                        </x-slot>

                    </x-admin.layout.card>
                </div>





            </div>
            {{-- end-right --}}

        </div>
        {!! Form::close() !!}
    </div>
    {{-- card body --}}
    <x-admin.layout.modal title="thông tin chi tiết">
        <x-slot name="modal" id="mContentProduct">
        </x-slot>
        <x-slot name="dialog" class="modal-xl modal-dialog-scrollable">
        </x-slot>
        <x-slot name="body">
            <div class="form-group col-12">
                <textarea name="content" id="content__tiny" class="form-control my-editor">{!! old('content') !!}</textarea>
                <x-admin.layout.form.error name="content" />
            </div>

        </x-slot>
        <x-slot name="footer" class="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </x-slot>
    </x-admin.layout.modal>
    <x-admin.layout.modal title="Thông số">
        <x-slot name="modal" id="mInfoProduct">
        </x-slot>
        <x-slot name="dialog" class="modal-xl">
        </x-slot>
        <x-slot name="body">
            <div class="form-group col-12">
                <textarea name="info" id="info__tiny" class="form-control my-editor">{!! old('info') !!}{!! get_crawler('spec') !!}</textarea>
            </div>

        </x-slot>
        <x-slot name="footer" class="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </x-slot>
    </x-admin.layout.modal>
@endsection
