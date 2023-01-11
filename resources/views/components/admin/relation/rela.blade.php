<div class="w-100">
    <div class="card">
        <div class="card-header text-center">
            {{ $title }}
        </div>
        <div class="card-body d-flex justify-content-center">
            <input type="hidden" name="{{ $name }}" value="{{ $selected }}">
            <button type="button" id="" class="btn btn-primary btn-lg init__select"
                data-model="{{ $model }}" relaName="{{ $rela[0] }}" relaKey="{{ $rela[1] }}"
                relaId="{{ $relaId }}" relaModel="{{ $modelRela }}">
                {{ $text }}
                <span class="btn btn-outline-light">{{ $selected ? count(explode(',', $selected)) : 0 }} Item</span>
            </button>
        </div>
    </div>
</div>
