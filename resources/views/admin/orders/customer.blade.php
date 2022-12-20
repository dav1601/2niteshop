@extends('admin.layout.app')
@section('import_css')
<link rel="stylesheet"
    href="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/oders.js') }}"></script>
<script src="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('name')
Danh Sách Sản Phẩm
@endsection
@section('content')


<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Bảng Lọc
                </div>
                <div class="card-body row mx-0" id="ord_cus">
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <select class="custom-select" name="" id="ord_cus--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Vip</label>
                            <select class="custom-select" name="" id="ord_cus--vip">
                                <option value="0">Tất cả</option>
                                @for ($i = 1 ; $i <= 4 ; $i++ ) <option value="{{ $i }}">VIP {{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Tên hoặc Email Khách Hàng</label>
                            <input type="text" class="form-control" name="" id="ord_cus--nameMail"
                                placeholder="Tên hoặc Email khách hàng">
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="" id="ord_cus--phone"
                                placeholder="Số điện thoại khách hàng">
                        </div>
                    </div>
                    <div class="col-4 mb-4 pl-0">
                        <div class="form-group">
                            <label for="">Wallet từ</label>
                            <input type="text" class="form-control" name="" id="ord_cus--wF" placeholder="Wallet từ">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2">{{ crf(App\Models\Customers::min('wallet'))
                                        }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-4">
                        <div class="form-group">
                            <label for="">Đến Wallet</label>
                            <input type="text" class="form-control" name="" id="ord_cus--wT" placeholder="Đến Wallet">
                            <div class="box_output mt-3">
                                <span>Bạn Đang Nhập:<strong class="output_price_T pl-2">0đ</strong></span>
                            </div>
                            <div class="box_output mt-3">
                                <span>Mặc định:<strong class="pl-2">{{ crf(App\Models\Customers::max('wallet'))
                                        }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Tỉnh</label>
                            <select class="custom-select" name="" id="ord_cus--prov">
                                <option value="0">Tất Cả</option>
                                @foreach (App\Models\Province::all() as $prov )
                                <option value="{{ $prov->_name }}" data-id="{{ $prov->id }}">{{ $prov->_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Quận/Huyện</label>
                            <select class="custom-select" name="" id="ord_cus--dist">
                                <option value="0">Tất cả</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2 pl-0 mb-4">
                        <div class="form-group">
                            <label for="">Phường/Xã</label>
                            <select class="custom-select" name="" id="ord_cus--ward">
                                <option value="0">Tất cả</option>
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
                    Danh sách khách hàng
                </div>
                <div class="card-body pb-0" id="table__show--customers">
                    <x-orders.tablecustomer :number="$number_page" :page="$page" :customers="$customers" />
                </div>

            </div>
        </div>
    </div>
    {{-- end show --}}
</div>

@endsection
