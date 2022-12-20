@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/banners.js')}}?ver=@php echo filemtime('public/admin/app/js/banners.js') @endphp">
</script>
@endsection

@section('name')
Quản lý ADS
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm Slide Thành Công");
</script>
@endif
<div class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm Ads
                </div>
                <div class="card-body" id="slide__add">
                    {!! Form::open(['url' => route('ads_handle_add') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Link Ads</label>
                        <input type="text" class="form-control" name="link" id="" placeholder="">
                        @error('link')
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
                            <input type="file" name="img" class="custom-file-input" id="imgAds">
                            <label class="custom-file-label" for="imgAds" id="forAds">Hình ảnh Ads size không vượt
                                quá
                                1Mb , Các đuôi cho phép: jpeg,png,jpg,tiff,svg</label>
                        </div>
                        @error('img')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Type</label>
                        <select class="custom-select" name="type" id="">
                            @foreach ( Config::get('navi.ads_type') as $type )
                            <option value="{{ $type }}">{{ $type }}</option>
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
                    <div class="form-group mb-5">
                        <label for="">Trạng thái</label>
                        <select class="custom-select" name="active" id="">
                            <option value="1">Hoạt động</option>
                            <option value="0">Chờ</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm" class="btn w-100 navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------------------------------------- --}}
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Danh sách ADS
                </div>
                <div class="card-body" id="slide__show">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Link</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Type</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody id="output__slide">
                            @foreach ($ads as $slide )
                            <tr>
                                <th scope="row">{{ $slide->id }}</th>
                                <td>{{ $slide->link }}</td>
                                <td>
                                    <img src="{{ asset($slide->img) }}" width="100%" class="va-radius-fb">
                                </td>
                                <td>
                                  {{ $slide->type }}
                                </td>
                                <td>
                                    {{ $slide->active }}
                                </td>
                                <td>{{ $carbon -> create($slide->created_at) ->
                                    diffForHumans($carbon -> now('Asia/Ho_Chi_Minh')) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('ads_handle_delete', ['id'=>$slide->id]) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
