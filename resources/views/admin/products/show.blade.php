@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ $file->ver('admin/app/js/products.js') }}"></script>
    <script>
        var minPrice = parseFloat({{ $minPrice }});
        var maxPrice = parseFloat({{ $maxPrice }});
    </script>
    <script src="{{ $file->ver('admin/app/js/range.js') }}"></script>
@endsection

@section('name')
    Danh Sách Sản Phẩm
@endsection
@section('content')
    {{-- <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Bảng Lọc
                    </div>
                    <div class="card-body row" id="prd__filter">
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <x-admin.layout.form.label text="sắp xếp" />
                                <select class="custom-select" name="" id="prd__filter--sort">
                                    <option value="DESC" sort="id">Mới nhất</option>
                                    <option value="ASC" sort="id">Cũ nhất</option>
                                    <option value="ASC" sort="new">Tình trạng mới</option>
                                    <option value="DESC" sort="new">Tình trạng bình thường</option>
                                    <option value="ASC" sort="highlight">Nổi bật</option>
                                    <option value="DESC" sort="highlight">Không nổi bật</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4">
                            <div class="form-group">
                                <x-admin.layout.form.label text="nhà sản xuất" />
                                <select class="custom-select" name="" id="prd__filter--prdcer">
                                    <option value="0">Tất cả</option>
                                    @foreach (App\Models\Producer::all() as $prdcer)
                                        <option value="{{ $prdcer->id }}">{{ $prdcer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4">
                            <div class="form-group">
                                <x-admin.layout.form.label text="Tình trạng" />
                                <select class="custom-select" name="" id="prd__filter--stock">
                                    <option value="0">Tất cả</option>
                                    @foreach (Config::get('product.stock', 'default') as $stock)
                                        <option value="{{ $stock }}">{{ stock_stt($stock) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3 mb-4">
                            <div class="form-group">
                                <x-admin.layout.form.label text="Tìm tên hoặc id sản phẩm" />
                                <input type="text" class="form-control" name="" id="prd__filter--name"
                                    placeholder="Name,Id Product">
                            </div>
                        </div>

                        <div class="col-3 mb-4">
                            <div class="form-group">
                                <x-admin.layout.form.label text="Tìm quản lý" />
                                <input type="text" class="form-control" name="" id="prd__filter--author"
                                    aria-describedby="helpId" placeholder="Name Manager">
                            </div>
                        </div>
                        <div class="col-3 mb-4">
                            <div class="form-group">
                                <x-admin.layout.form.label text="Tìm Model" />
                                <input type="text" class="form-control" name="" id="prd__filter--model"
                                    aria-describedby="helpId" placeholder="Nhập model">
                            </div>
                        </div>
                        <div class="col-3 mb-4">
                            <x-admin.layout.form.label text="Khoảng giá" />
                            <div class="row">
                                <div class="col-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="row slider-labels">
                                <div class="col-6 caption">
                                    <strong>Min:</strong> <span id="slider-range-value1"></span>
                                </div>
                                <div class="col-6 caption text-right">
                                    <strong>Max:</strong> <span id="slider-range-value2"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form>
                                        <input type="hidden" name="min-value" value="">
                                        <input type="hidden" name="max-value" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mt-4">
                                <x-admin.product.categories :show="false" col="col-12" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <x-admin.layout.card>
        <x-slot name="heading" class="text-center">
            Bộ lọc
        </x-slot>
        <x-slot name="content">
            <div class="row" id="prd__filter">
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="sắp xếp" />
                        <select class="custom-select" name="" id="prd__filter--sort">
                            <option value="DESC" sort="id">Mới nhất</option>
                            <option value="ASC" sort="id">Cũ nhất</option>
                            <option value="DESC" sort="highlight">Bình Thường</option>
                            <option value="ASC" sort="highlight">Nổi bật</option>
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="nhà sản xuất" />
                        <select class="custom-select" name="" id="prd__filter--prdcer">
                            <option value="">Tất cả</option>
                            @foreach (App\Models\Producer::all() as $prdcer)
                                <option value="{{ $prdcer->id }}">{{ $prdcer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Tình trạng" />
                        <select class="custom-select" name="" id="prd__filter--usage">
                            <option value="">Tất cả</option>
                            @foreach (Config::get('product.usage_stt') as $usage)
                                <option value="{{ $usage }}">{{ usage_stt($usage) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Kho" />
                        <select class="custom-select" name="" id="prd__filter--status">
                            <option value="">Tất cả</option>
                            @foreach (Config::get('product.stock', 'default') as $stock)
                                <option value="{{ $stock }}">{{ stock_stt($stock) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Tìm tên hoặc id sản phẩm" />
                        <input type="text" class="form-control" name="" id="prd__filter--name"
                            placeholder="Name,Id Product">
                    </div>
                </div>

                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Tìm quản lý" />
                        <input type="text" class="form-control" name="" id="prd__filter--author"
                            aria-describedby="helpId" placeholder="Name Manager">
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="form-group">
                        <x-admin.layout.form.label text="Tìm Model" />
                        <input type="text" class="form-control" name="" id="prd__filter--model"
                            aria-describedby="helpId" placeholder="Nhập model">
                    </div>
                </div>
                <div class="col-3 mb-4">
                    <x-admin.layout.form.label text="Khoảng giá" class="mb-4" />
                    <div class="row">
                        <div class="col-12">
                            <div id="slider-range"></div>
                        </div>
                    </div>
                    <div class="row slider-labels">
                        <div class="col-6 caption">
                            <strong>Min:</strong> <span id="slider-range-value1"></span>
                        </div>
                        <div class="col-6 caption text-right">
                            <strong>Max:</strong> <span id="slider-range-value2"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <input type="text" class="d-none" name="min-value" id="prd__filter--min"
                                    value="{{ $minPrice }}">
                                <input type="text" class="d-none" name="max-value" id="prd__filter--max"
                                    value="{{ $maxPrice }}">
                                <input type="hidden" name="" id="triggerPriceChange">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-4">
                        <x-admin.product.categories :show="false" classCheckbox="prd__filter--category"
                            col="col-12" />
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group mt-4">
                        <button type="button" class="btn btn-outline-primary w-100"
                            onClick="location.reload()">Reset</button>
                    </div>
                </div>
            </div>

        </x-slot>

    </x-admin.layout.card>
    {{-- end filter --}}
    {{-- <div class="col-12 mt-4 p-0" id="pointScrollProduct">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách sản phẩm
                </div>
                <div class="card-body" id="product__show" class="prd__s">
                    <div class="row mx-0" id="product__show--ajax">
                        @foreach ($products->data as $prd)
                            <x-admin.product.item :prd="$prd" />
                        @endforeach
                    </div>
                </div>
                <div class="card-footer" id="product__show--page">
                    <x-pagination :number_page="$products->number_page" page="1" classWp="justify-content-center mt-2" />
                </div>
            </div>
        </div>
    </div> --}}
    <x-admin.layout.card id="pointScrollProduct">
        <x-slot name="heading" class="text-center">
            Danh sách sản phẩm
        </x-slot>
        <x-slot name="content" id="product__show" class="prd__s">
            <div class="row mx-0" id="product__show--ajax"></div>
        </x-slot>
        <x-slot name="footer" id="product__show--page">

        </x-slot>

    </x-admin.layout.card>





    {{-- end show --}}
    </div>
@endsection
