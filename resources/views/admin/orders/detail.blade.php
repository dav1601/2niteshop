@extends('admin.layout.app')
@section('import_css')
    <link rel="stylesheet"
        href="{{ asset('client/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('import_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('admin/app/js/tinymce.js') }}?ver=@php echo filemtime('admin/app/js/tinymce.js') @endphp">
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
                        <div id="detail__order--update" class="w-100">
                            <x-admin.order.select :ordered="$ordered" />
                        </div>

                        <div class="form-group">
                            <h1>Danh sách sản phẩm</h1>
                        </div>
                        <table class="table-borderless table">
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
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            <img src="{{ urlImg($item->options->image, 'media') }}" width="150px"
                                                alt="">
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            @if ($item->options->ins)
                                                {{ App\Models\Insurance::where('id', '=', $item->options->ins)->first()->name }}(+
                                                {{ crf(App\Models\Insurance::where('id', '=', $item->options->ins)->first()->price) }}
                                                )
                                            @else
                                                Không có
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
                            <div class="row w-100 mx-0">
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
                    <div class="card-footer text-right">
                        <x-layout.button.back link="{{ route('show_orders') }}" />
                        @if ($ordered->status == 3)
                            <a data-code="{{ $ordered->code }}" class="btn bg-orange export_invoice text-center">
                                <i class="fa-solid fa-file-export"></i> Xuất Hoá Đơn
                            </a>
                        @endif


                    </div>

                </div>
            </div>
        </div>
        {{-- end filter --}}







        {{-- end show --}}
    </div>
    <script>
        window.Echo.join('admin.order.' + {{ $ordered->id }}).listen("AdmDetailOrder", function(e) {
            let id = {{ $ordered->id }};
            $.load_data("update", 1, 0, id);
        });
    </script>
@endsection
