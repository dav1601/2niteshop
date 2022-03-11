@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet"
    href="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/pre_orders.js') }}"></script>
<script src="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('name')
Danh Sách Sản Phẩm
@endsection
@section('content')
<input type="hidden" name="" value="{{ route('handle_ajax_customers') }}" id="ord_cus--urlAjax">
<input type="hidden" name="" value="{{ route('change_address_2') }}" id="ord__filter--url2">

<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="preOrder">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="preOrder--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="" id="preOrder--name"
                                placeholder="Tên khách hàng">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="" id="preOrder--namePrd"
                                placeholder="Tên khách hàng">
                        </div>
                    </div>
                    <div class="col-3 mb-4">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="preOrder--phone"
                                placeholder="Số điện thoại khách hàng">
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái xử lý</label>
                            <select class="custom-select" name="" id="preOrder--stt">
                                <option value="">Tất Cả</option>
                                @foreach (Config::get('orders.pre_orders.status') as $key => $stt )
                                <option value="{{ $key }}" >{{ $stt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái sản phẩm</label>
                        <select class="custom-select" name="" id="preOrder--sttPrd">
                                <option value="">Tất Cả</option>
                                @foreach (Config::get('orders.pre_orders.status_product') as $key => $stt )
                                <option value="{{ $key }}" >{{ $stt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái đặt cọc</label>
                            <select class="custom-select" name="" id="preOrder--deposit">
                                <option value="">Tất Cả</option>
                                @foreach (Config::get('orders.pre_orders.deposit') as $key => $stt )
                                <option value="{{ $key }}" >{{ $stt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Trạng thái giao hàng</label>
                            <select class="custom-select" name="" id="preOrder--delivery">
                                <option value="">Tất Cả</option>
                                @foreach (Config::get('orders.pre_orders.delivered') as $key => $stt )
                                <option value="{{ $key }}" >{{ $stt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end filter --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách đơn đặt hàng trước
                </div>
                <div class="card-body pb-0" id="table__show--preOrders">
                    <x-admin.table.preorders :customers="$pre_orders" :number="$number" :page="$page" />
                </div>

            </div>
        </div>
    </div>
    {{-- end show --}}
</div>

@endsection
