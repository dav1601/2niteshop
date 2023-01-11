@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet" href="{{ $file->ver_img('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
    <script
        src="{{ asset('admin/app/js/products.js') }}?ver=@php echo filemtime('public/admin/app/js/products.js') @endphp">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
        src="{{ $file->ver_img('admin/app/js/tinymce.js') }}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
    </script>
    <script src="{{ $file->ver_img('admin/plugin/tags/tagsinput.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-min.js"
        integrity="sha512-2V49R8ndaagCOnwmj8QnbT1Gz/rie17UouD9Re5WxbzRVUGoftCu5IuqqtAM9+UC3fwfHCSJR1hkzNQh/2wdtg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var producer = {{ Js::from($producer) }};
    </script>
@endsection
@section('title')
    {{ $product->name }}
@endsection
@section('name')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    @if (session('ok'))
        <script>
            toastr.success("Cập Nhật Sản Phẩm Thành Công");
        </script>
    @endif
    <input type="hidden" name="" id="product_id" value="{{ $id }}">
    <div id="product" class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Cập Nhật Sản Phẩm
                    </div>

                    <div class="card-body" id="product__add">
                        {!! Form::open([
                            'url' => route('product_handle_edit', ['id' => $product->id]),
                            'method' => 'POST',
                            'files' => true,
                        ]) !!}
                        <div class="form-group mb-5">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id=""
                                value="{{ $product->name }}" placeholder="">
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
                            <textarea class="form-control" name="des" id="" rows="4">{{ $product->des }}</textarea>
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
                                value="{{ $product->keywords }}">
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
                            <label for="">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                                id="prd_price" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong
                                        class="output_price pl-2">{{ crf($product->price) }}</strong></span>
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
                                value="{{ $product->historical_cost }}" id="historical_cost" placeholder="">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong
                                        class="output_price--cost pl-2">{{ crf($product->historical_cost) }}</strong></span>
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
                            <label for="">Model</label>
                            <input type="text" class="form-control" name="model" value="{{ $product->model }}"
                                id="" placeholder="">
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
                            <input type="text" class="form-control" name="video" value="{{ $product->video }}"
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
                            <textarea name="info" id="info__tiny" class="form-control my-editor">{!! $product->info !!}</textarea>
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
                            <textarea name="content" id="content__tiny" class="form-control my-editor">{!! $product->content !!}</textarea>
                            @error('content')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="main_img" class="custom-file-input" id="main_img">
                                <label class="custom-file-label" for="main_img" id="forMain">Đổi hình ảnh chính không
                                    sửa
                                    đổi bỏ qua</label>
                            </div>
                            @error('main_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_main mt-4">
                                <img src="{{ $file->ver_img($product->main_img) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="sub_img" class="custom-file-input" id="sub_img">
                                <label class="custom-file-label" for="sub_img" id="forSub">Đổi hình ảnh phụ không sửa
                                    đổi bỏ
                                    qua</label>
                            </div>
                            @error('sub_img')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            @if ($product->sub_img != null)
                                <div class="show_main mt-4">
                                    <img src="{{ $file->ver_img($product->sub_img) }}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="bg" class="custom-file-input" id="bg_product">
                                <label class="custom-file-label" for="bg_product" id="forBg">Đổi/Thêm hình ảnh
                                    Backgroud
                                    (Không đổi/thêm có bỏ qua)</label>
                            </div>
                            @error('bg')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            @if ($product->bg != null)
                                <div class="show_main mt-4">
                                    <img src="{{ $file->ver_img($product->bg) }}" alt="" width="100%"
                                        height="auto">
                                </div>
                            @else
                                <span>Chưa có hình ảnh background</span>
                            @endif

                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="gll700[]" class="custom-file-input" id="gll700" multiple>
                                <label class="custom-file-label" for="gll700" id="for700">Thêm Hình Ảnh Chi Tiết
                                    700x700
                                    (Không thêm bỏ qua)</label>
                            </div>
                            @error('gll700.*')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_gll_700 mt-4">
                                <table class="table-borderless table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Img</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Index</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="op_700">
                                        @foreach ($gll700 as $gl700)
                                            @if ($gl700->size == 700)
                                                <tr>
                                                    <th scope="row">{{ $gl700->id }}</th>
                                                    <td>
                                                        <img src="{{ $file->ver_img($gl700->link) }}" width="200"
                                                            class="va-radius-fb" alt="">
                                                    </td>

                                                    <td>{{ $gl700->size }}</td>
                                                    <td>{{ $gl700->index }}</td>
                                                    <td>
                                                        <i class="fas fa-trash delete_gll"
                                                            data-id="{{ $gl700->id }}"></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="custom-file">
                                <input type="file" name="gll80[]" class="custom-file-input" id="gll80" multiple>
                                <label class="custom-file-label" for="gll80" id="for80">Hình Ảnh Chi Tiết
                                    80x80</label>
                            </div>
                            @error('gll80.*')
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            <div class="show_gll_80 mt-4">
                                <table class="table-borderless table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Img</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Index</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="op_80">
                                        @foreach ($gll80 as $gl80)
                                            @if ($gl80->size == 80)
                                                <tr>
                                                    <th scope="row">{{ $gl80->id }}</th>
                                                    <td>
                                                        <img src="{{ $file->ver_img($gl80->link) }}" class="va-radius-fb"
                                                            alt="">
                                                    </td>

                                                    <td>{{ $gl80->size }}</td>
                                                    <td>{{ $gl80->index }}</td>
                                                    <td>
                                                        <i class="fas fa-trash delete_gll"
                                                            data-id="{{ $gl80->id }}"></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mx-0">
                            <div class="form-group col-6 mb-5 pl-0">
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
                                @if ($product->banner != null)
                                    <div class="show_main mt-4">
                                        <img src="{{ $file->ver_img($product->banner) }}" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-6 mb-5 pr-0">
                                <input type="text" class="form-control" name="banner_link"
                                    value="{{ $product->banner_link }}" id=""
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
                                    <x-admin.product.categories :show="true" :selected="$product_categories" />
                                </div>
                                {{-- end danh muc khac --}}
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="row mx-0">
                                <div class="col-4 pl-0">
                                    <label for="">Kho</label>
                                    <select class="custom-select" name="stock">
                                        <option value="{{ $product->stock }}">{{ stock_stt($product->stock) }}</option>
                                        @foreach (Config::get('product.stock', '1') as $stock)
                                            @if ($stock != $product->stock)
                                                <option value="{{ $stock }}">{{ stock_stt($stock) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Tình Trạng Sử Dụng</label>
                                    <select class="custom-select" name="usage_stt">
                                        <option value="{{ $product->usage_stt }}">{{ usage_stt($product->usage_stt) }}
                                        </option>
                                        @foreach (Config::get('product.usage_stt', '1') as $us)
                                            @if ($us != $product->usage_stt)
                                                <option value="{{ $us }}">{{ usage_stt($us) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 pr-0">
                                    <label for="">Highlight</label>
                                    <select class="custom-select" name="highlight">
                                        <option value="{{ $product->highlight }}">
                                            {{ highlight_stt($product->highlight) }}
                                            @foreach (Config::get('product.highlight', '2') as $hl)
                                                @if ($hl != $product->highlight)
                                        <option value="{{ $hl }}">{{ highlight_stt($hl) }}</option>
                                        @endif
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
                                            value="{{ $product->producer->name }}" class="form-control"
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
                                        @if ($product->cat_game_id != null)
                                            <option
                                                value="{{ App\Models\CatGame::where('name', 'LIKE', $product->cat_game_id)->firstOrFail()->id }}">
                                                {{ $product->cat_game_id }}</option>
                                            @foreach (App\Models\CatGame::all() as $cg)
                                                @if ($cg->name != $product->cat_game_id)
                                                    <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="0">Không Có</option>
                                            @foreach (App\Models\CatGame::all() as $cg)
                                                <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                                            @endforeach
                                        @endif

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
                                        <option
                                            value="{{ App\Models\typeProduct::where('name', '=', $product->type)->first()->id }}">
                                            {{ $product->type }}</option>
                                        @foreach ($type as $t)
                                            @if ($t->id != App\Models\typeProduct::where('name', '=', $product->type)->first()->id)
                                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endif
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
                                        @if (count($sub_type) > 0)
                                            @if ($product->sub_type != null)
                                                <option
                                                    value="{{ App\Models\typeProduct::where('name', '=', $product->sub_type)->first()->id }}">
                                                    {{ $product->sub_type }}</option>
                                                @foreach ($sub_type as $st)
                                                    @if (App\Models\typeProduct::where('name', '=', $product->sub_type)->first()->id != $st->id)
                                                        <option value="{{ $st->id }}">{{ $st->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="0">Chọn loại sản phẩm phụ</option>
                                                @foreach ($sub_type as $st)
                                                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                                                @endforeach
                                            @endif
                                        @else
                                            <option value="0">Không có loại phụ</option>
                                        @endif
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
                                <x-admin.relation.rela rl="products-ins" :relaid="$product->id" :selected="$ins" />
                            </div>

                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-plc" :relaid="$product->id" :selected="$policies" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="product-products" :relaid="$product->id" :selected="$rela_products" />

                            </div>
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-blogs" :relaid="$product->id" :selected="$rela_blogs" />
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="col-6 my-4 p-0">
                                <x-admin.relation.rela rl="products-block" :relaid="$product->id" :selected="$blocks" />
                            </div>
                            {{-- --}}
                        </div>


                        <div class="form-group mb-5">
                            <input type="submit" value="Cập Nhật Sản Phẩm" class="btn navi_btn w-100">
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
