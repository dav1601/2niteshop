@props(['address' => []])


@php
    $list_dist = $address ? findCacheAddress($address->prov_id, 'district') : [];
    $list_ward = $address ? findCacheAddress($address->dist_id, 'ward') : [];

    $activeType = $address && $address->type == 'office' ? 'office' : 'home';
    $name = isset($address->name) ? $address->name : '';
    $phone = isset($address->phone) ? $address->phone : '';

@endphp

<div class="row mx-0 mb-4">
    <div class="col-12 col-sm-6 pl-sm-0 form-group">
        <input type="text" name="name" id="name" value="{{ $name }}" class="form-control"
            placeholder="Họ Và Tên">
    </div>
    <div class="col-12 col-sm-6 my-sm-0 pr-sm-0 form-group my-3">
        <input type="text" name="phone" id="phone" value="{{ $phone }}" class="form-control"
            placeholder="Số Điện Thoại">
    </div>
</div>
{{-- --}}
<div class="row mx-0 mb-4">
    <div class="col-12 col-sm-4 pl-sm-0 mb-sm-0 form-group mb-4">
        <label for="">Tỉnh</label>
        <select name="prov" id="prov" class="custom-select">
            <option value="0">Chọn Tỉnh</option>

            @foreach (getCacheAddress('province') as $prov)
                <x-forms.address.option :item="$prov" :selected="isset($address->prov_id) && $address->prov_id == $prov->id" />
            @endforeach
        </select>
    </div>
    <div class="col-12 col-sm-4 mb-sm-0 pl-sm-0 form-group mb-4">
        <label for="">Quận/Huyện</label>
        <select name="dist" id="dist" class="custom-select">
            @if ($list_dist)
                @foreach ($list_dist as $ld)
                    <x-forms.address.option :item="$ld" :selected="isset($address->dist_id) && $address->dist_id == $ld->id" />
                @endforeach
            @else
                <option value="0">Bạn Chưa Chọn Tỉnh</option>
            @endif

        </select>
    </div>
    <div class="col-12 col-sm-4 px-sm-0 mb-sm-0 form-group mb-3">
        <label for="">Phường/Xã</label>
        <select name="ward" id="ward" class="custom-select">
            @if ($list_ward)
                @foreach ($list_ward as $lw)
                    <x-forms.address.option :item="$lw" :selected="isset($address->ward_id) && $address->ward_id == $lw->id" />
                @endforeach
            @else
                <option value="0">Bạn Chưa Chọn Quận/Huyện</option>
            @endif

        </select>
    </div>
    <div class="col-12 form-group mt-4 px-0">
        <textarea class="form-control w-100" style="max-width: 100%" name="detail" id="detail" rows="4"
            placeholder="Địa chỉ cụ thể.....">{{ isset($address->detail) ? $address->detail : '' }}</textarea>
    </div>
    <div class="row mx-0 mt-4">
        <label for="">Loại Địa Chỉ:</label><br>
        <div class="col-12 type d-flex align-items-center px-0">
            <span name="type" class="type__item {{ $activeType === 'home' ? 'type__item--active' : '' }}"
                data-type="home">Nhà Riêng</span>
            <span name="type" class="type__item" {{ $activeType === 'office' ? 'type__item--active' : '' }}
                data-type="office">Văn
                Phòng</span>
        </div>
        <div class="col-12 mt-4 px-0">
            <div class="va-checkbox d-flex align-items-center w-100">
                <input type="checkbox" name="def" @checked(isset($address->def) ?? false) value="1" id="set__def">
                <label for="set__def">
                    Đặt Làm Địa Chỉ Mặc Định
                </label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    <button type="button" class="btn btn-primary disabled" style="cursor: not-allowed" disabled="disabled"
        id="save__address" address-id="{{ $address ? $address->id : '' }}"
        data-type="{{ $address ? 'update' : 'add' }}">Lưu
        Địa Chỉ</button>
</div>

