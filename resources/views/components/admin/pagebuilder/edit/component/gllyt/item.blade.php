<div class="p-e-component-gllyt card col-6">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Video {{ $index + 1 }}</span>
        <span class="p-e-gllYt-remove hover-action d-block cursor-pointer" data-index="{{ $index }}"><i
                class="fa-solid fa-trash"></i></span>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Link Video Youtube</label>
            <input type="text" class="form-control p-e-gllYt-link" value="{{ $payload }}"
                placeholder="https://www.youtube.com/watch?v=SiSkC_5TKQE">
        </div>
    </div>
</div>
