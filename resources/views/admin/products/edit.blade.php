@extends('admin.layout.app')

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/products.js') }}"></script>
    <script>
        // if (route('current'))
        var producer = {{ Js::from($producer) }};
        var galleries = {{ Js::from($gallery) }};
        var productId = {{ Js::from($product->id) }};
        var isEdit = true;
    </script>
    {{-- <script src="{{ asset('admin/app/js/related_all.js') }}"></script> --}}
@endsection

@section('name')
    Product
@endsection

@section('content')
    <x-pagination :number_page="4" page="2" classWp="justify-content-center mt-2" />
    <div id="product__edit">
        {{-- ----------- --}}
        {!! Form::open([
            'url' => route('product_handle_edit', ['id' => $id]),
            'method' => 'POST',
            'files' => true,
            'id' => 'formProducts',
        ]) !!}
        <div class="w-100 row no-gutters">
            <div class="col-8 row no-gutters pr-4">
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-6">
                            <x-admin.layout.input.text required="true" :value="$product->name" name="name" label="name" />
                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.input.text label="slug" :value="$product->slug" disabled="true" name="slug" />
                        </div>
                        <div class="form-group col-6">


                            <x-admin.layout.input.text label="meta keywords" :value="$product->keywords" name="keywords"
                                placeholder="Type keyword and Enter" data-role="tagsinput" />
                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.input.text label="model" name="model" :value="$product->model" />
                        </div>
                        <div class="form-group col-12">
                            <x-admin.layout.form.label text="meta desc" />
                            <textarea class="form-control" name="des" id="" rows="4">{{ $product->des }}</textarea>
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

                            <x-admin.layout.input.text label="giá bán" required="true" name="price" class="input-price"
                                :value="$product->price" id="prd_price" placeholder="..." />
                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="giá gốc" required="true" name="historical_cost"
                                class="input-price" :value="$product->historical_cost" id="historical_cost" placeholder="đ" />

                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.input.text label="số lượng" type="number" name="qty" id="qty"
                                value="{{ $product->qty }}" />
                        </div>
                        <div class="form-group col-6">

                            <x-admin.layout.input.text label="giá giảm" name="discount" id="discount"
                                value="{{ $product->discount }}" class="input-price" />
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
                            <div class="w-100 col-6 mb-3">
                                {{-- <x-admin.ui.form.image name='main_img' :required="true" id="imgProductMain"
                                    label="Hình ảnh chính" :image="$file->ver_img($product->main_img)" /> --}}
                                <x-admin.ui.form.image width="305px" blockEventDef="true" height="305px"
                                    classUpload="single-image-product-upload"
                                    classClear="single-image-product-delete d-none" classInput="single-image-product-input"
                                    name='main_img' id="imgProductMain" label="Hình ảnh chính" :image="$file->ver_img($product->main_img)"
                                    :required="true">
                                    <x-slot name="btn_clear" data-type="img_main"></x-slot>
                                    <x-slot name="btn_upload" data-type="img_main"></x-slot>
                                    <x-slot name="input" data-type="img_main"></x-slot>
                                </x-admin.ui.form.image>
                            </div>
                            <div class="w-100 col-6 mb-3">
                                <x-admin.ui.form.image width="305px" blockEventDef="true" height="305px"
                                    classUpload="single-image-product-upload" classClear="single-image-product-delete"
                                    classInput="single-image-product-input" name='sub_img' id="imgProductSub"
                                    label="Hình ảnh phụ" :image="$file->ver_img($product->sub_img)">
                                    <x-slot name="btn_clear" data-type="img_sub"></x-slot>
                                    <x-slot name="btn_upload" data-type="img_sub"></x-slot>
                                    <x-slot name="input" data-type="img_sub"></x-slot>
                                </x-admin.ui.form.image>
                            </div>
                            <div class="w-100 col-6">

                                <x-admin.ui.form.image width="305px" blockEventDef="true" height="305px" classUpload=""
                                    classClear="single-image-product" classInput="single-input-product" name='bg'
                                    id="imgProductBg" label="Hình ảnh nền sản phẩm" :image="$file->ver_img($product->bg)">
                                    <x-slot name="btn_clear" data-type="img_bg"></x-slot>
                                    <x-slot name="btn_upload" data-type="img_bg"></x-slot>
                                    <x-slot name="input" data-type="img_bg"></x-slot>
                                </x-admin.ui.form.image>
                            </div>
                        </div>

                    </x-slot>

                </x-admin.layout.card>
                {{-- --------------- --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Thêm Hình ảnh chi tiết</h6>
                    </x-slot>
                    <x-slot name="content" class="" id="body-gallery">
                        <x-admin.product.gallery :galleries="$gallery" productAct="edit" />
                    </x-slot>

                </x-admin.layout.card>
                {{-- ----------- --}}
                <x-admin.layout.card class="col-12 mb-5">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Danh sách hình ảnh chi tiết</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        {{-- <x-admin.product.gll.table :gll700="$gll700" :gll80="$gll80" /> --}}
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
                                <x-admin.relation.rela rl="products-ins" :relaid="$product->id" :selected="$ins" />
                            </div>

                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-plc" :relaid="$product->id" :selected="$policies" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="product-products" :relaid="$product->id" :selected="$rela_products" />

                            </div>
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-blogs" :relaid="$product->id" :selected="$rela_blogs" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-block" :relaid="$product->id" :selected="$blocks" />
                            </div>
                            {{-- --}}
                        </div>
                    </x-slot>

                </x-admin.layout.card>
                <x-admin.layout.form.submit act="Update" id="submit-product" />
            </div>

            {{-- end-left --}}
            {{-- ----------- --}}
            <div class="col-4">
                <div class="row w-100 no-gutters">
                    <div class="col-12 mb-4">
                        <x-admin.product.categories :selected="$product_categories" :show="true" col="col-12">
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
                                    <x-admin.layout.input.text label="Ngày mở bán" id="date_sold"
                                        value="{{ $product->date_sold }}" name="date_sold" required="true">
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
                                            <option @selected($us === $product->usage_stt) value="{{ $us }}">
                                                {{ usage_stt($us) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="sản phẩm nổi bật" />
                                    <select class="custom-select" name="highlight">
                                        @foreach (Config::get('product.highlight', '1') as $hl)
                                            <option @selected($hl === $product->highlight) value="{{ $hl }}">
                                                {{ highlight_stt($hl) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{--  --}}
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label text="danh mục game" />
                                    <select class="custom-select" name="cat_game" id="">
                                        <option value="0">No Category Game</option>
                                        @foreach ($cat_game as $cg)
                                            <option @selected($product->cat_game_id === $cg->id) value="{{ $cg->id }}">
                                                {{ $cg->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-admin.layout.form.error name="cat_game" />
                                </div>
                                <div class="col-6 mb-4">
                                    <x-admin.layout.form.label :required="true" text="phân loại sản phẩm" />
                                    <select class="custom-select" name="type" id="type">
                                        @foreach ($type as $t)
                                            <option @selected($product->type === $t->id) value="{{ $t->id }}">
                                                {{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-admin.layout.form.error name="type" />
                                </div>
                                {{-- -------- --}}
                                <div class="col-12">
                                    <x-admin.layout.input.text label="Nhà Sản Xuất" name="producer" id="producer"
                                        :value="$product->producer->name" aria-describedby="producerHelp"
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
                <textarea name="content" id="content__tiny" class="form-control my-editor">
                    {!! $product->content !!}
                </textarea>
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
                <textarea name="info" id="info__tiny" class="form-control my-editor">{!! $product->info !!}</textarea>
            </div>

        </x-slot>
        <x-slot name="footer" class="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </x-slot>
    </x-admin.layout.modal>
@endsection
