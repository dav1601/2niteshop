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
Update đơn hàng đặt trước
@endsection
@section('content')
<div class="row mx-0">
    @if (session('ok'))
    <script>
        toastr.success("Update Thành Công");
    </script>
    @endif
    @if (session('not-ok'))
    <script>
        toastr.success("Update Không Thành Công");
    </script>
    @endif
    {{-- end filter --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Update Đơn Hàng Đặt Trước
                </div>
                <div class="card-body pb-0" id="">
                    {!! Form::open(['url' =>route('handle_update', ['id'=> $id]) , 'method' =>
                    "POST",'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" class="form-control" name="name" value="{{ $pord -> name_cus }}" id=""
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
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="{{ $pord->phone }}" id=""
                            placeholder="">
                        @error('phone')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tiền Khách Cọc</label>
                        <input type="text" class="form-control" name="price_deposit" value="{{ $pord->price_deposit }}"
                            id="price_deposit" placeholder="">
                        <div class="box_output mt-3">
                            <span>Bạn Đang Nhập:<strong class="output_price pl-2">{{ crf( $pord->price_deposit) }}</strong></span>
                        </div>
                        @error('price_deposit')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Giá sản phẩm về tới kho</label>
                        <input type="text" class="form-control" name="" value="{{ crf($pord->price) }}" id=""
                            placeholder="" disabled>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name=""
                            value="{{ App\Models\Products::where('id', '=' , $pord->products_id)->first()->name }} ---- Id : {{ $pord->products_id }}"
                            disabled>
                    </div>
                    <div class="row mx-0">
                        <div class="col-3 pl-0">
                            <div class="form-group">
                                <label for="">Trạng thái xử lý</label>
                                <select class="custom-select" name="status">
                                    <option value="{{ $pord->status }}">{{
                                        Config::get('orders.pre_orders.status.'.$pord->status) }}</option>
                                    @foreach (Config::get('orders.pre_orders.status') as $key => $stt )
                                    @if ($key != $pord->status)
                                    <option value="{{ $key }}">{{ $stt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái sản phẩm</label>
                                <select class="custom-select" name="status_product" disabled>
                                    <option value="{{ $pord->status }}">{{
                                        Config::get('orders.pre_orders.status_product.'.$pord->status_product) }}
                                    </option>
                                    @foreach (Config::get('orders.pre_orders.status_product') as $key => $stt )
                                    @if ($key != $pord->status_product)
                                    <option value="{{ $key }}">{{ $stt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái đặt cọc</label>
                                <select class="custom-select" name="deposit">
                                    <option value="{{ $pord->deposit }}">{{
                                        Config::get('orders.pre_orders.deposit.'.$pord->deposit) }}</option>
                                    @foreach (Config::get('orders.pre_orders.deposit') as $key => $stt )
                                    @if ($key != $pord->deposit)
                                    <option value="{{ $key }}">{{ $stt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Trạng thái giao hàng</label>
                                <select class="custom-select" name="delivery_status">
                                    <option value="{{ $pord->delivery_status }}">{{
                                        Config::get('orders.pre_orders.delivered.'.$pord->delivery_status ) }}</option>
                                    @foreach (Config::get('orders.pre_orders.delivered') as $key => $stt )
                                    @if ($key != $pord->delivery_status)
                                    <option value="{{ $key }}">{{ $stt }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-5 pl-0" >
                        <label for="">Chọn Ngày Cho Khách Lấy Hàng</label>
                        <div id="datenext" class="positon-relative">
                            <input type="text" name="delivery_time" value="{{ $pord->delivery_time }}" class="form-control">
                       <span id="show_date_2">
                        <i class="fas fa-calendar"></i>
                       </span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="CẬP NHẬT ĐƠN ĐẶT HÀNG" class="btn navi_btn w-100">
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    {{-- end show --}}
</div>

@endsection
