<div class="row mx-0 justify-content-between address">
    <div class="col-12 col-sm-9 pl-0">
        <div class="row mx-0 address__box mb-3 ">
            <div class="col-4 address__box--left --1 pl-0 text-right">
                <span>Họ và tên :</span>
            </div>
            <div class="col-8 address__box--right  px-0 d-flex align-items-center">
                <span class="abr__name">{{ $address->name }}</span>
               @if ($address -> def == 1)
               <span class="abr__def ml-3 d-block">
                Mặc Định
            </span>
               @endif
            </div>
        </div>
        <div class="row mx-0 address__box mb-3 ">
            <div class="col-4 address__box--left --2 pl-0 text-right">
                <span class="">Số điện thoại :</span>
            </div>
            <div class="col-8 address__box--right  px-0">
                <span class="abr__phone">
                    {{ $address->phone }}
                </span>
            </div>
        </div>
        <div class="row mx-0 address__box ">
            <div class="col-4 address__box--left --3 pl-0 text-right">
                <span>Địa Chỉ :</span>
            </div>
            <div class="col-8 address__box--right --3 px-0">
                <span class="d-block mb-1 abr__address">{{ $address->detail }}</span>
                <span class="d-block mb-1 abr__address">{{ $address->ward }}</span>
                <span class="d-block mb-1 abr__address">{{ $address->dist }}</span>
                <span class="d-block mb-1 abr__address">{{ $address->prov }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-9 address__action px-0 d-flex justify-content-sm-center justify-content-between  align-items-end flex-column">
        <div class="address__action--delEdit d-flex mb-2">
            <a class="d-block aa__edit" data-id="{{ $address ->id }}">Sửa</a>
            @if ($address->def != 1)
            <a class="d-block ml-4 aa__del" data-id="{{ $address ->id }}">Xoá</a>
            @endif
        </div>
        <div class="address__action--setDef">
            <button class="btn btn-outline-secondary font-14 aa__btn @if($address->def == 1) disabled @endif" @if($address->def ==1 ) disabled="disabled" style="cursor:not-allowed"@endif data-id="{{ $address->id }}">Thiết Lập Mặc Định</button>
        </div>
    </div>
</div>
