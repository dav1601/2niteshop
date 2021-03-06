@extends('admin.layout.app')
@section('import_css')
@endsection
@section('import_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="{{ asset('admin/app/js/category.js')}}?ver=@php echo filemtime('public/admin/app/js/category.js') @endphp">
</script>
<script src="{{ asset('admin/app/js/tinymce.js')}}?ver=@php echo filemtime('public/admin/app/js/tinymce.js') @endphp">
</script>
@endsection

@section('name')
Thêm User
@endsection

@section('content')
@if (session('ok'))
<script>
    toastr.success("Thêm User Thành Công");
</script>
@endif
@if (session('not-ok'))
<script>
    toastr.success("Thêm User Thất Bại");
</script>
@endif
<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Thêm User
                </div>
                <div class="card-body" id="plc__add">
                    {!! Form::open(['url' => route('hanle_add_user') , 'method' => "POST" ,'files' => true ]) !!}
                    <div class="form-group mb-5">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" id="" value="{{ old('name') }}" placeholder="">
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
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="" value="{{ old('email') }}" placeholder="">
                        @error('email')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" id="" value="{{ old('phone') }}" placeholder="">
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
                        <label for="">Role</label>
                        <select class="custom-select" name="role" id="">
                           @foreach (App\Models\Role::where('id' , "!=" , 1 )->get() as $role )
                               <option value="{{ $role->id }}">{{ $role->name }}</option>
                           @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Mật Khẩu</label>
                        <input type="text" class="form-control" name="password" id="" placeholder="">
                        @error('password')
                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <input type="submit" value="Thêm User" class="btn w-100 text-center navi_btn">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------- --}}

</div>
@endsection
