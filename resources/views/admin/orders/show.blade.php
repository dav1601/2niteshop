@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet"
        href="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('import_js')
    <script src="{{ $file->ver('admin/app/js/oders.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('name')
    Danh Sách Đơn Hàng
@endsection
@section('content')
    <div class="row mx-0">
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Bảng Lọc
                    </div>
                    <div class="card-body row mx-0" id="ord__filter">
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Sắp xếp</label>
                                <select class="custom-select" name="" id="ord__filter--sort">
                                    <option value="DESC">Mới nhất</option>
                                    <option value="ASC">Cũ nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Trạng Thái</label>
                                <select class="custom-select" name="" id="ord__filter--stt">
                                    <option value="0">Tất cả</option>
                                    @foreach (config('orders.status') as $key => $stt)
                                        <option value="{{ $key }}">{{ $stt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="form-group">
                                <label for="">Tên hoặc Email Khách Hàng</label>
                                <input type="text" class="form-control" name="" id="ord__filter--nameMail"
                                    placeholder="Tên hoặc Email khách hàng">
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" name="" id="ord__filter--phone"
                                    placeholder="Số điện thoại khách hàng">
                            </div>
                        </div>
                        <div class="col-3 mb-4 pl-0">
                            <label for="">Chọn Ngày Đặt Hàng (trở về trước)</label>
                            <div id="dateprev" class="positon-relative">
                                <input type="text" class="form-control">
                                <span id="show_date_1">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-3 mb-4 pl-0">
                            <label for="">Chọn Ngày Đặt Hàng (trở về sau)</label>
                            <div id="datenext" class="positon-relative">
                                <input type="text" class="form-control">
                                <span id="show_date_2">
                                    <i class="fas fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Tỉnh</label>
                                <select class="custom-select" name="" id="ord__filter--prov">
                                    <option value="0">Tất Cả</option>
                                    @foreach (App\Models\Province::all() as $prov)
                                        <option value="{{ $prov->_name }}" data-id="{{ $prov->id }}">
                                            {{ $prov->_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Quận/Huyện</label>
                                <select class="custom-select" name="" id="ord__filter--dist">
                                    <option value="0">Tất cả</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2 mb-4 pl-0">
                            <div class="form-group">
                                <label for="">Phường/Xã</label>
                                <select class="custom-select" name="" id="ord__filter--ward">
                                    <option value="0">Tất cả</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end filter --}}
        <div class="col-12 position-relative mt-4 p-0" id="show_orders">
            <div id="loading" class="d-none">
                <div class="img_loading d-flex flex-column justify-content-center align-items-center w-100 h-100">
                    <img src=" {{ asset('admin/images/layout/loading-unscreen.gif') }}  " alt="">
                </div>
            </div>
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Danh sách sản phẩm
                    </div>
                    <div class="card-body pb-0" id="table__show--orders">
                        <x-layout.loading center="true" />
                        {{-- <x-tableorders :orders="$orders" /> --}}
                    </div>

                </div>
            </div>
        </div>
        {{-- end show --}}
    </div>
    <script>
        window.Echo.channel('admin.order').listen("UpdateOrderAdmin", function(e) {
            let page = $(".page-item.active .page-link").attr('data-page');
            $.load_data("load", 1, 0, 0, page);
        });
    </script>
@endsection
