@php
$list_dist = App\Models\District::where('_province_id' , '=' , $data_edit->prov_id)->get();
$list_ward = App\Models\Ward::where('_district_id' , '=' , $data_edit->dist_id)->get();
@endphp
<div class="row mx-0 mb-4">
  <div class="col-12 col-sm-6 pl-sm-0">
    <input type="text" name="" id="name" value="{{ $data_edit->name }}" class="form-control" placeholder="Họ Và Tên">
  </div>
  <div class="col-12 col-sm-6 my-3 my-sm-0 pr-sm-0">
    <input type="text" name="" id="phone" value="{{ $data_edit->phone }}" class="form-control" placeholder="Số Điện Thoại">
  </div>
</div>
<div class="row mx-0 mb-4">
  <div class="col-12 col-sm-4 pl-0 mb-3 mb-sm-0">
    <label for="">Tỉnh</label>
    <select name="" id="prov" class="custom-select">
      <option value="{{ $data_edit->prov }}" data-id="{{ $data_edit->id }}">{{ $data_edit->prov }}</option>
      @foreach (App\Models\Province::all() as $prov )
      @if ($prov->id != $data_edit->prov_id)
      <option value="{{ $prov->_name }}" data-id="{{ $prov->id }}">{{ $prov->_name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="col-12 col-sm-4 pl-0 mb-3 mb-sm-0">
    <label for="">Quận/Huyện</label>
    <select name="" id="dist" class="custom-select">
      <option value="{{ $data_edit->dist }}" data-id="{{ $data_edit->dist_id }}">{{ $data_edit->dist }}</option>
      @foreach ($list_dist as $ld )
      @if ($ld->id != $data_edit->dist_id)
      <option value="{{ $ld->_name }}" data-id="{{ $ld->id }}">{{ $ld->_name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="col-12 col-sm-4 px-0 mb-3 mb-sm-0">
    <label for="">Phường/Xã</label>
    <select name="" id="ward" class="custom-select">
      <option value="{{ $data_edit->ward }}" data-id="{{ $data_edit->ward_id }}">{{ $data_edit->ward }}</option>
      @foreach ($list_ward as $lw )
      @if ($lw->id != $data_edit->ward_id)
      <option value="{{ $lw->_name }}" data-id="{{ $lw->id }}">{{ $lw->_name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="col-12 px-0 mt-4">
    <textarea class="form-control w-100" style="max-width: 100%" name="" id="detail" rows="4"
      placeholder="Địa chỉ cụ thể.....">{{ $data_edit->detail }}</textarea>
  </div>
  <div class="row mx-0 mt-4">
    <label for="">Loại Địa Chỉ:</label><br>
    <div class="col-12 px-0 type d-flex align-items-center">
      <span class="type__item @if($data_edit->type == "home") type__item--active @endif" data-type="home">Nhà Riêng</span>
      <span class="type__item @if($data_edit->type == "office") type__item--active @endif" data-type="office">Văn
        Phòng</span>
    </div>
    <div class="col-12 px-0 mt-4">
      <div class="va-checkbox  d-flex align-items-center w-100">
        <input type="checkbox" name="" value="1" id="set__def" @if($data_edit->def == 1) checked @endif>
        <label for="set__def">
          Đặt Làm Địa Chỉ Mặc Định
        </label>
      </div>


    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  <button type="button" class="btn btn-primary" id="update__address" data-id="{{ $data_edit->id }}">Lưu Địa Chỉ</button>
</div>
