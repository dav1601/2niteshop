@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet" href="{{ asset('admin/plugin/tags/tagsinput.css') }}">
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/products.js')}}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/plugin/tags/tagsinput.js') }}"></script>
<script src="{{ asset('admin/app/js/related_all.js') }}"></script>
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

<input type="hidden" name="" value="{{ route('handle_search') }}" id="url__handle--search">
<input type="hidden" name="" value="{{ route('handle_cat') }}" id="url__handle--cat">
<input type="hidden" name="" value="{{ route('handle_reload') }}" id="url__handle--reload">
<input type="hidden" name="" value="{{ route('handle_delete_gll') }}" id="url__handle--delete">
<input type="hidden" name="" id="array__selected" value="{{ $selected_js_product }}">
<input type="hidden" name="" id="url__selected" value="{{ $url }}">
<input type="hidden" name="" id="array__selected--blog" value="{{ $selected_js_blog }}">
<input type="hidden" name="" id="url__handle--related" value="{{ route('handle_related_all') }}">
<input type="hidden" name="" id="product_id" value="{{ $id }}">
<div id="product" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Cập Nhật Sản Phẩm
                </div>

                <div class="card-body" id="product__add">
                    {!! Form::open(['url' =>route('product_handle_edit', ['id'=> $product->id]) , 'method' => "POST"
                    ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}"
                            placeholder="">
                        @error('name')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2">{{ crf($product->price
                                    )}}</strong></span>
                        </div>
                        @error('price')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <span>Bạn Đang Nhập:<strong class="output_price--cost pl-2">{{
                                    crf($product->historical_cost) }}</strong></span>
                        </div>
                        @error('historical_cost')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Model</label>
                        <input type="text" class="form-control" name="model" value="{{ $product->model }}" id=""
                            placeholder="">
                        @error('model')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Option 1: Video </label>
                        <input type="text" class="form-control" name="video" value="{{ $product->video }}" id=""
                            placeholder="Điền mã nhúng Youtube vào đây">
                        @error('video')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Thông Tin</label>
                        <textarea name="info" id="info__tiny"
                            class="form-control my-editor">{!! $product->info !!}</textarea>
                        @error('info')
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
                        <textarea name="content" id="content__tiny"
                            class="form-control my-editor">{!! $product->content !!}</textarea>
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
                        <div class="custom-file">
                            <input type="file" name="main_img" class="custom-file-input" id="main_img">
                            <label class="custom-file-label" for="main_img" id="forMain">Đổi hình ảnh chính không sửa
                                đổi bỏ qua</label>
                        </div>
                        @error('main_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_main mt-4">
                            <img src="{{ asset($product->main_img) }}" alt="">
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="sub_img" class="custom-file-input" id="sub_img">
                            <label class="custom-file-label" for="sub_img" id="forSub">Đổi hình ảnh phụ không sửa đổi bỏ
                                qua</label>
                        </div>
                        @error('sub_img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if ($product->sub_img != NULL)
                        <div class="show_main mt-4">
                            <img src="{{ asset($product->sub_img) }}" alt="">
                        </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="bg" class="custom-file-input" id="bg_product">
                            <label class="custom-file-label" for="bg_product" id="forBg">Đổi/Thêm hình ảnh Backgroud
                                (Không đổi/thêm có bỏ qua)</label>
                        </div>
                        @error('bg')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if ($product->bg != NULL)
                        <div class="show_main mt-4">
                            <img src="{{ asset($product->bg) }}" alt="" width="100%" height="auto">
                        </div>
                        @else
                        <span>Chưa có hình ảnh background</span>
                        @endif

                    </div>
                    <div class="form-group mb-5">
                        <div class="custom-file">
                            <input type="file" name="gll700[]" class="custom-file-input" id="gll700" multiple>
                            <label class="custom-file-label" for="gll700" id="for700">Thêm Hình Ảnh Chi Tiết 700x700
                                (Không thêm bỏ qua)</label>
                        </div>
                        @error('gll700.*')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_gll_700 mt-4">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Img</th>
                                        <th scope="col">Danh Mục</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Index</th>
                                        <th scope="col">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody class="op_700">
                                    @foreach ( App\Models\Products::find($product->id) -> gll() ->orderBy('index' ,
                                    'ASC')->get() as $gl700 )
                                    @if ($gl700 -> size == 700)
                                    <tr>
                                        <th scope="row">{{ $gl700 -> id }}</th>
                                        <td>
                                            <img src="{{ asset($gl700->link) }}" width="200" class=" va-radius-fb "
                                                alt="">
                                        </td>
                                        <td>{{ App\Models\Products::where('id', '=' , $gl700->products_id)->first() ->
                                            cat_name }}</td>
                                        <td>{{ $gl700->size }}</td>
                                        <td>{{ $gl700->index }}</td>
                                        <td>
                                            <i class="fas fa-trash delete_gll" data-id="{{ $gl700->id }}"></i>
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
                            <label class="custom-file-label" for="gll80" id="for80">Hình Ảnh Chi Tiết 80x80</label>
                        </div>
                        @error('gll80.*')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <div class="show_gll_80 mt-4">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Img</th>
                                        <th scope="col">Danh Mục</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Index</th>
                                        <th scope="col">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody class="op_80">
                                    @foreach ( App\Models\Products::find($product->id) -> gll() ->orderBy('index' ,
                                    'ASC')->get() as $gl80 )
                                    @if ($gl80 -> size == 80)
                                    <tr>
                                        <th scope="row">{{ $gl80 -> id }}</th>
                                        <td>
                                            <img src="{{ asset($gl80->link) }}" class=" va-radius-fb " alt="">
                                        </td>
                                        <td>{{ App\Models\Products::where('id', '=' , $gl80->products_id)->first() ->
                                            cat_name }}</td>
                                        <td>{{ $gl80->size }}</td>
                                        <td>{{ $gl80->index }}</td>
                                        <td>
                                            <i class="fas fa-trash delete_gll" data-id="{{ $gl80->id }}"></i>
                                        </td>
                                    </tr>
                                    @endif

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mx-0">
                        <div class="form-group mb-5 col-6 pl-0">
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" id="banner_prd">
                                <label class="custom-file-label" for="banner_prd" id="forBannerPrd">Option 2: Banner Đi
                                    kèm</label>
                            </div>
                            @error('banner')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                            @if ($product->banner != null)
                            <div class="show_main mt-4">
                                <img src="{{ asset($product->banner) }}" alt="">
                            </div>
                            @endif
                        </div>
                        <div class="form-group mb-5 col-6 pr-0">
                            <input type="text" class="form-control" name="banner_link"
                                value="{{ $product->banner_link }}" id="" placeholder="Option 2: Link Banner">
                            @error('banner_link')
                            <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                            <div class="col-4 pl-0 mb-5">
                                <label for="">Danh Mục Chính</label>
                                <select class="custom-select" name="cat" id="cat">
                                    <option value="{{ $product->cat_id }}">{{ $product->cat_name }}</option>
                                    @foreach ( $category as $cate )
                                    @if ($cate->id != $product->cat_id)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
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
                            {{-- no error 1 --}}
                            <div class="col-4 mb-5">
                                <label for="">Danh Mục Phụ 1</label>
                                <select class="custom-select" name="cat_1" id="cat_1">
                                    <option value="{{ $product->sub_1_cat_id  }}">{{ $product->sub_1_cat_name }}
                                    </option>
                                    @foreach ( App\Models\Category::where('parent_id' , '=' , $product->cat_id) ->get()
                                    as $cate_1 )
                                    @if ($cate_1->id != $product->sub_1_cat_id)
                                    <option value="{{ $cate_1->id }}">{{ $cate_1->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('cat_1')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="col-4 pr-0">
                                <label for="">Danh Mục Phụ 2</label>
                                <select class="custom-select" name="cat_2" id="cat_2">
                                    @if ($product->sub_2_cat_id != null )
                                    <option value="{{ $product->sub_2_cat_id  }}">{{ $product->sub_2_cat_name }}
                                    </option>
                                    @foreach ( App\Models\Category::where('parent_id' , '=' , $product->sub_1_cat_id)
                                    ->get()
                                    as $cate_2 )
                                    @if ($cate_2->id != $product->sub_2_cat_id)
                                    <option value="{{ $cate_2->id }}">{{ $cate_2->name }}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <option value="0">Không có danh mục phụ 2</option>
                                    @endif
                                </select>
                            </div>
                            {{-- end cat_2 --}}
                            {{-- end cat_2 --}}
                            <div class="accordion col-6 pl-0" id="accordionExample">
                                <div class="card">
                                    <div class="card-header p-0" id="headingOne">
                                        <h2 class="mb-0">
                                            <button
                                                class="btn btn-link btn-block navi_btn text-left d-flex justify-content-between align-items-center text-light"
                                                type="button" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Danh Mục Khác
                                                <i class="fa-solid fa-angles-down"></i>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse  @if(count($array_pc) > 0) show @endif" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach (category_child(App\Models\Category::all() , 0) as $cate_other)
                                            <div class="va-checkbox d-flex align-items-center w-100"
                                                style="margin-left: calc({{ $cate_other->level }} * 25px);">
                                                <input type="checkbox" name="categories[]"
                                                    value="{{ $cate_other -> id }}" id="category__{{ $cate_other->id}}"
                                                    class="check_ins" {{ in_array($cate_other->id , $array_pc) ?"checked":"" }}>
                                                <label for="category__{{ $cate_other -> id }}">
                                                    {{ $cate_other -> name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
                                    @foreach (Config::get('product.stock', '1'); as $stock )
                                    @if ($stock != $product->stock )
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
                                    @foreach (Config::get('product.usage_stt', '1'); as $us )
                                    @if ($us != $product->usage_stt)
                                    <option value="{{ $us }}">{{ usage_stt($us) }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 pr-0">
                                <label for="">Highlight</label>
                                <select class="custom-select" name="highlight">
                                    <option value="{{ $product->highlight }}">{{ highlight_stt($product->highlight) }}
                                        @foreach (Config::get('product.highlight', '2'); as $hl )
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
                                <select class="custom-select" name="producer" id="producer">
                                    <option value="{{ $product->producer_id }}">{{ App\Models\Producer::where('id', '='
                                        , $product->producer_id)->first()->name }}</option>
                                    @foreach ($producer as $pdc )
                                    @if ($pdc->id != $product->producer_id )
                                    <option value="{{  $pdc->id }}">{{ $pdc->name }}</option>
                                    @endif

                                    @endforeach
                                </select>
                                @error('producer')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                                <div class="form-group row mx-0 mt-4">
                                    <input type="text" id="search_pdc" class="form-control col-6"
                                        placeholder="Nhập Tên Nhà sản xuất">
                                    <div class="col-3 pr-0">
                                        <button class="btn navi_btn w-100" id="reload__pdc"><i
                                                class="fas fa-sync-alt pr-2"></i> Làm
                                            Mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <div class="row mx-0">
                            <div class="col-4 pl-0">
                                <label for="">Danh Mục Game</label>
                                <select class="custom-select" name="cat_game" id="">
                                    @if ($product->cat_game_id != NULL)
                                    <option value="{{ App\Models\CatGame::where('name', 'LIKE' ,
                                    $product->cat_game_id)->firstOrFail()->id }}">{{ $product->cat_game_id }}</option>
                                    @foreach (App\Models\CatGame::all() as $cg )
                                    @if ($cg->name != $product->cat_game_id)
                                    <option value="{{  $cg->id }}">{{ $cg->name }}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <option value="0">Không Có</option>
                                    @foreach (App\Models\CatGame::all() as $cg )
                                    <option value="{{  $cg->id }}">{{ $cg->name }}</option>
                                    @endforeach
                                    @endif

                                </select>
                                @error('cat_game')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                                        value="{{ App\Models\typeProduct::where('name', '=' , $product -> type )->first()->id }}">
                                        {{ $product->type }}</option>
                                    @foreach ($type as $t )
                                    @if ( $t->id != App\Models\typeProduct::where('name', '=' , $product -> type
                                    )->first()->id )
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                                    @if (count($sub_type)>0)
                                    @if ($product -> sub_type != null)
                                    <option
                                        value="{{ App\Models\typeProduct::where('name', '=' , $product->sub_type )->first()->id }}">
                                        {{ $product->sub_type }}</option>
                                    @foreach ($sub_type as $st )
                                    @if (App\Models\typeProduct::where('name', '=' , $product->sub_type )->first()->id
                                    != $st ->id)
                                    <option value="{{ $st ->id }}">{{ $st ->name }}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <option value="0">Chọn loại sản phẩm phụ</option>
                                    @foreach ($sub_type as $st )
                                    <option value="{{ $st ->id }}">{{ $st ->name }}</option>
                                    @endforeach
                                    @endif
                                    @else
                                    <option value="0">Không có loại phụ</option>
                                    @endif
                                </select>
                                @error('sub_type')
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
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
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách bảo hành </label>
                            <button class="btn navi_btn ml-3" id="reload__ins"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>
                        <div class="row mx-0 inner-cis">
                            @foreach ( $ins as $in )
                            <div class="mb-4 col-3 cis_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="ins[]" value="{{ $in -> id }}" id="ci__{{ $in -> id }}"
                                        class="check_ins" @if (in_array($in->id, $product_ins))
                                    checked
                                    @endif>
                                    <label for="ci__{{ $in -> id }}" data-toggle="tooltip" data-placement="top"
                                        title="Giá Bảo Hành: {{ crf($in -> price) }} ">
                                        {{ $in -> name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="form-group mb-5">
                        <div class="d-flex mx-0 mb-4 align-items-center">
                            <label for="" class="p-0 mb-0">Chinh sách của shop</label>
                            <button class="btn navi_btn ml-3" id="reload__plc"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</button>
                        </div>

                        <div class="row mx-0 inner-plc">
                            @foreach ( $policy as $plc )
                            <div class="mb-4 col-3 plc_item">
                                <div class="va-checkbox d-flex align-items-center w-100">
                                    <input type="checkbox" name="plc[]" value="{{ $plc -> id }}"
                                        id="plc__{{ $plc -> id }}" class="check_plc" @if (in_array($plc->id,
                                    $product_policies))
                                    checked
                                    @endif>
                                    <label for="plc__{{ $plc -> id }}" data-toggle="tooltip" data-html="true"
                                        data-placement="top" title="{{ $plc -> content }}">
                                        {{ $plc -> title }} (Pos: {{ $plc->position }})
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- --}}

                    <div class="col-12 mt-4 p-0">
                        <div class="w-100">
                            <div class="card">
                                <div class="card-header text-center">
                                    Chỉnh sửa Sản Phẩm Mua Kèm
                                </div>
                                <div class="card-body">
                                    <div id="selected" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Sản Phẩm Đã Chọn</h1>
                                        @if (count($array_products) > 0 )
                                        @foreach ($array_products as $item )
                                        @php
                                        $product = App\Models\Products::where('id', $item)->first();
                                        @endphp
                                        <x-admin.product.checkbox :product="$product" class="select__product"
                                            name="products" prefix="product" :array="$array_products" />
                                        @endforeach
                                        @else

                                        <span>Chưa có sản phẩm nào được chọn</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Sản Phẩm</label>
                                        <input type="text" class="form-control" name="related_products"
                                            id="search__name" placeholder="Nhập tên sản phẩm">
                                        <div id="result" class="mt-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    {{-- --}}

                    <div class="col-12 my-4 p-0">
                        <div class="w-100">
                            <div class="card">
                                <div class="card-header text-center">
                                    Bài viết liên quan
                                </div>
                                <div class="card-body">
                                    <div id="selected_blog" class="mb-4">
                                        <h1 class="mb-3" style="font-size: 20px">Danh Sách Bài Viết Đã Chọn</h1>
                                        @if (count($array_blogs) > 0 )
                                        @foreach ($array_blogs as $item_2)
                                        @php
                                        $blog = App\Models\Blogs::where('id', '=' , $item_2)->first();
                                        @endphp
                                        <x-admin.blogs.checkbox :blog="$blog" class="select__blog" name="blogs"
                                            prefix="blog" :array="$array_blogs" />
                                        @endforeach
                                        @else
                                        <span>Chưa có bài viết nào được chọn</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="">Tìm Bài Viết</label>
                                        <input type="text" class="form-control" name="" id="search__name--blog"
                                            placeholder="Nhập tên bài viết">
                                        <div id="result_blog" class="mt-4"></div>
                                        @error('blogs')
                                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
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
