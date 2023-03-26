<li class="pgb-package init-sort-package trans-025-all w-100" pack-id="{{ $package['id'] }}" data-type="package-item"
    id="pgb-package-{{ $package['id'] }}" cid="{{ $package['cid'] }}">
    <div class="w-100 d-flex justify-content-around align-items-center">
        <div class="pgb-package-name text-uppercase">
            {{ $package['payload']['type'] }}
        </div>
        <div class="pbg-package-act d-flex justify-content-center align-items-center">
            <i class="fa-regular fa-pen-to-square pack-edit" data-type="{{ $package['payload']['type'] }}"
                pack-id="{{ $package['id'] }}" cid="{{ $package['cid'] }}"></i>
            <i class="fa-regular fa-trash-can pack-remove" cid="{{ $package['cid'] }}"
                data-type="{{ $package['payload']['type'] }}" pack-id="{{ $package['id'] }}"></i>
        </div>
    </div>
</li>
{{-- Đã xong sort cơ bản chỉ cần xử lý các sự kiện sort và làm preview --}}
