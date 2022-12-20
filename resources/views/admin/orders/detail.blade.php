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
Chi Tiết Đơn Hàng
@endsection
@section('content')

<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Chi tiết đơn hàng (ID: {{ $ordered->id }})
                </div>
                <div class="card-body row mx-0" id="detail_order">
                    <div class="row w-100 mx-0 mb-4">
                        <div class="d-none">
                            <select class="custom-select" name="" id="ord__filter--sort">
                                <option value="DESC">Mới nhất</option>
                                <option value="ASC">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="col-6 pl-0">
                            <select name="" id="" class="custom-select update__status" data-id="{{ $ordered->id }}">
                                <option value="{{ $ordered->status }}">{{ status_order($ordered->status) }}</option>
                                @foreach(config('orders.status') as $key => $status)
                                @if ($key != $ordered->status)
                                <option value="{{ $key }}">{{ status_order($key) }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 pr-0">
                            <select name="" id="" class="custom-select update__paid up-{{  $ordered->id }}"
                                data-id="{{  $ordered->id }}">
                                <option value="{{  $ordered->paid }}">{{ paid_order( $ordered->paid) }}</option>
                                @foreach(config('orders.paid') as $key => $paid)
                                @if ($key != $ordered->paid)
                                <option value="{{ $key }}">{{ paid_order($key) }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Chính sách bảo hành</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Phụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td>
                                    {{ $item->options->cost }}
                                </td>
                                <td>
                                    <img src="{{ asset( $item->options->image ) }}" width="150px" alt="">
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    @if ($item->options->ins != 0)
                                    {{ App\Models\Insurance::where('id', '=' , $item->options->ins)->first()->name }}(+
                                    {{ crf(App\Models\Insurance::where('id', '=' , $item->options->ins
                                    )->first()->price) }} )
                                    @else
                                    Không có chính sách bảo hành đi kèm
                                    @endif
                                </td>
                                <td>
                                    {{ crf($item->price) }}
                                </td>
                                <td class="text-center">
                                    x{{ $item->qty }}
                                </td>
                                <td>
                                    {{ crf($item->options->sub_total) }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right" style="font-size: 20px">Tổng Đơn:</td>
                                <td colspan="2" class="text-right"
                                    style="font-size: 20px; color:#1dd1a1; font-weight:700">{{ crf($ordered->total) }}
                                </td>

                            </tr>
                        </tbody>

                    </table>
                    <div id="info">
                        <div class="row mx-0 w-100">
                            <div class="col-6 pl-0">
                                <h2>Thông tin khách hàng</h2>
                                <div class="box">
                                    <span>Tên: <strong>{{ $ordered->name }}</strong></span>
                                    <span>Số điện thoại: <strong>{{ $ordered->phone }}</strong></span>
                                    <span>Email: <strong>{{ $ordered->email }}</strong></span>
                                    <span>Hình thức thanh toán: <strong>{{ $ordered->payment }}</strong></span>
                                    <span>Note: <strong>{{ $ordered->note }}</strong></span>
                                </div>
                            </div>
                            <div class="col-6 pr-0">
                                <h2>Thông tin vận chuyển</h2>
                                <div class="box">
                                    <span>Tỉnh: <strong>{{ $ordered->prov }}</strong></span>
                                    <span>Quận/Huyện: <strong>{{ $ordered->dist }}</strong></span>
                                    <span>Phường/Xã: <strong>{{ $ordered->ward }}</strong></span>
                                    <span>Chi tiết: <strong>{{ $ordered->address }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="card-footer">
                    @if ($ordered->status==3)
                    <a data-id="{{ $ordered->id}}"
                        class="invoice-{{ $ordered->id }} btn navi_btn w-100 mb-4 text-center export_invoice">
                        <i class="fa-solid fa-file-export"></i> Xuất Hoá Đơn
                    </a>
                    @endif
                    <a href="{{ route('show_orders') }}" class="btn navi_btn w-100">Quay Lại Trang Danh Sách Đơn
                        Hàng</a>
                </div>

            </div>
        </div>
    </div>
    {{-- end filter --}}







    {{-- end show --}}
</div>

@endsection
