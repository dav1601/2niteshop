@props(['user_address' => []])
@php
    $user_address = $user_address ? $user_address : Auth::user()->address;
@endphp
@foreach ($user_address as $item)
    <div class="form-check mb-4">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="cko-address" id="cko-address-{{ $item->id }}"
                value="{{ $item->id }}" @checked($item->def)>
            {{ $item->name }} , {{ $item->phone }} ,{{ $item->type }}
            ,{{ $item->detail }},{{ $item->ward }},{{ $item->dist }},{{ $item->prov }}
        </label>
    </div>
@endforeach
