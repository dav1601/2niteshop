@extends('admin.layout.app')

@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/a_media.js') }}"></script>
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
    Edit Product
@endsection

@section('content')
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
                    <x-slot name="heading" class="">
                        Chung
                    </x-slot>
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-6">
                            <x-admin.layout.input.text id="product_name" required="true" :value="$product->name" name="name"
                                label="name" />
                        </div>
                        <div class="form-group col-6">
                            <x-admin.layout.input.text id="product_slug" label="slug" :value="$product->slug" name="slug" />
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
                <x-admin.layout.card class="col-12 mb-5" title="Gía và kho">
                    <x-slot name="heading" class="">
                        Giá và kho
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

                <x-admin.layout.card class="col-12 mb-5" type="collapse" idColl="coll_content_info">
                    <x-slot name="heading" class="">
                        Thông số và thông tin chi tiết
                    </x-slot>
                    <x-slot name="content" class="row w-100">
                        <div class="form-group col-12 mb-5">
                            <x-admin.layout.form.label text="Thông số" />
                            <textarea name="info" id="info__tiny" class="form-control my-editor">{!! $product->info !!}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <x-admin.layout.form.label text="Nội dung" required="true" />
                            <textarea name="content" id="content__tiny" class="form-control my-editor">
                                {!! $product->content !!}
                            </textarea>
                            <x-admin.layout.form.error name="content" />
                        </div>
                    </x-slot>
                </x-admin.layout.card>
                {{-- -------------- --}}
                <x-admin.layout.card class="col-12 mb-5" type="collapse" idColl="product_single_image">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Hình ảnh</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        <div class="row">
                            <div class="w-100 col-6 mb-3">

                                <x-admin.ui.form.image width="305px" avMedia="true" height="305px" id="imgProductMain"
                                    classInput="product_single_image" label="Hình ảnh chính" :required="true"
                                    image="{{ urlImg($product->path_first, 'media') }}" name="image_first">

                                </x-admin.ui.form.image>
                            </div>
                            <div class="w-100 col-6 mb-3">
                                <x-admin.ui.form.image width="305px" avMedia="true" height="305px" id="imgProductSub"
                                    classInput="product_single_image" label="Hình ảnh phụ"
                                    image="{{ urlImg($product->path_second, 'media') }}" name="image_second">
                                </x-admin.ui.form.image>
                            </div>
                            <div class="w-100 col-6">
                                <x-admin.ui.form.image width="305px" avMedia="true" height="305px"
                                    classInput="product_single_image" name="image_background" id="imgProductBg"
                                    label="Hình ảnh nền sản phẩm" image="{{ urlImg($product->path_bg, 'media') }}">

                                </x-admin.ui.form.image>
                            </div>
                        </div>

                    </x-slot>

                </x-admin.layout.card>
                {{-- --------------- --}}
                <x-admin.layout.card class="col-12 mb-5" type="collapse" idColl="coll_gallery">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Thêm Hình ảnh chi tiết</h6>
                    </x-slot>
                    <x-slot name="content" class="" id="body-gallery">
                        <x-admin.product.gallery :galleries="$gallery" productAct="edit" />
                    </x-slot>

                </x-admin.layout.card>
                {{-- -----------  --}}

                {{-- ---------------- --}}
                <x-admin.layout.card class="col-12 mb-5" type="collapse" idColl="product_relation">
                    <x-slot name="heading" class="">
                        <h6 class="font-weight-bold d-flex">Các liên kết của sản phẩm</h6>
                    </x-slot>
                    <x-slot name="content" class="">
                        <div class="row">
                            {{-- --}}
                            <div class="col-4 mb-3">
                                <x-admin.relation.rela rl="products-options" :relaid="$product->id" :selected="$options" />
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
                <x-admin.layout.form.submit act="Update" class='prd_edit_action' id="submit-product">
                    <x-slot name="btn" class="" id="">
                        <button type="button" class="btn btn-primary ml-2" id="replicate_product">Duplicate</button>
                        <button type="button" class="btn btn-danger ml-2" id="prd_delete" data-foc="0">Move to
                            trash</button>
                        @role('super-admin')
                            <button type="button" class="btn btn-danger ml-2" id="prd_delete" data-foc="1">Force
                                Delete</button>
                        @endrole

                    </x-slot>
                </x-admin.layout.form.submit>
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
                                <div class="col-3 mb-4">
                                    <x-admin.layout.form.label text="Trạng thái" />
                                    <span class="badge badge-primary">{{ stock_stt($product->stock) }}</span>
                                </div>
                                <div class="col-9 mb-4">
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
    {{-- <x-admin.layout.modal title="thông tin chi tiết">
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
    </x-admin.layout.modal> --}}


    {{-- init media --}}
    <x-admin.media.init />
@endsection
