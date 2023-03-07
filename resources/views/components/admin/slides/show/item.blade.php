<li class="slide-item slide-item-{{ $slide->id }}" slide-stt="{{ $slide->status }}" slide-id="{{ $slide->id }}"
    slide-index="{{ $slide->index }}">
    <div class="slide-item-wp">
        <div class="d-flex justify-content-between align-items-center">
            @if ($slide->status == 1)
                <div class="slide-item-dd" data-id="{{ $slide->id }}">
                    <i class="fa-solid fa-bars"></i>
                </div>
            @endif
            <div class="slide-item-info d-flex justify-content-between align-items-center" style="flex:1">
                <img src="{{ $file->ver_img($slide->img) }}" style="flex:1;height:300px" alt="">
                <div class="--act d-flex">
                    <i class="fa-solid fa-pen-to-square slide-item-edit" data-id="{{ $slide->id }}"></i>
                    <i class="fa-solid fa-trash slide-item-remove" data-id="{{ $slide->id }}"></i>
                    <div class="switch">
                        <input type="checkbox" id="{{ 'switch-slide-' . $slide->id }}" data-id="{{ $slide->id }}"
                            class="switch-slide" @if ($slide->status == 1) checked @endif /><label
                            for="{{ 'switch-slide-' . $slide->id }}">Toggle</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</li>
