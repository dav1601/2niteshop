<div class="w-100">
    <div class="card">
        <div class="card-header text-center">
            <h6> {{ $title }}</h6>
        </div>
        <div class="card-body d-flex justify-content-center">
            <input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ $selected }}">
            @if ($onlymodel)
                <button type="button" class="btn btn-primary init__select" data-model="{{ $onlymodel }}"
                    relaName="null" relaKey="null" relaId="null" relaModel="null">
                    {{-- {{ $text }} --}}

                    <span class="">{{ $selected ? count(explode(',', $selected)) : 0 }}
                        Items</span>
                </button>
            @else
                <button type="button" class="btn btn-primary init__select" data-model="{{ $model }}"
                    relaName="{{ $rela[0] }}" relaKey="{{ $rela[1] }}" relaId="{{ $relaId }}"
                    relaModel="{{ $modelRela }}">
                    {{-- {{ $text }} --}}

                    <span class="">{{ $selected ? count(explode(',', $selected)) : 0 }}
                        Items</span>
                </button>
            @endif

        </div>
    </div>
</div>
