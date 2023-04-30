@php
    $style = $package['style'];
@endphp
<x-admin.dark.card>
    <x-slot name="header">
        Border
    </x-slot>
    <x-slot name="body">
        <div class="border-type">
            <h5 class="a-sub-header mb-2">General</h5>
            <div class="row no-gutters align-items-center">
                <div class="col-2 form-group">
                    <label for="">Style</label>
                    @php
                        $style_border = ['none', 'solid', 'dashed', 'dotted', 'double'];
                    @endphp
                    <select class="custom-select text-capitalize pgb_border_style">
                        @foreach ($style_border as $item)
                            <option @if ($item === $style['border']['properties']['style']) selected @endif>
                                {{ $item }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 form-group px-4">
                    <label for="">Color</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker pgb_border_color"
                            value="{{ $style['border']['properties']['color'] }}">
                    </div>

                </div>
                <div class="col-8 form-group">
                    <label for="">Width</label>
                    @php
                        $poss = array_keys($style['border']['properties']['width']);
                        $values = array_values($style['border']['properties']['width']);
                        $classes = [];
                        foreach ($poss as $pos) {
                            $classes[] = 'pgb_border_width_' . $pos;
                        }
                    @endphp
                    <x-admin.pagebuilder.layout.input.number :classes="$classes" :values="$values" :appends="$poss" />

                </div>
            </div>
        </div>
        {{-- ------ --}}
        <div class="border-type my-4">
            <h5 class="a-sub-header mb-2">Border Radius</h5>
            @php
                $poss = array_keys($style['border']['properties']['radius']);
                $values = array_values($style['border']['properties']['radius']);
                $classes = [];
                foreach ($poss as $pos) {
                    $classes[] = 'pgb_border_radius_' . $pos;
                }
            @endphp
            <div class="row no-gutters">
                <div class="col-11">
                    <x-admin.pagebuilder.layout.input.number :classes="$classes" :values="$values" :appends="$poss" />
                </div>
                <div class="col-1">
                    <select class="custom-select" name="" id="pgb-border-radius-unit">
                        <option @if ($style['border']['unit_border_radius'] === 'px') selected @endif value="px">PX</option>
                        <option @if ($style['border']['unit_border_radius'] === '%') selected @endif value="%">%</option>
                    </select>

                </div>
            </div>

        </div>
        {{-- --------------- --}}
        <div class="border-type my-4">
            <h5 class="a-sub-header mb-2">Box Shadow</h5>
            @php
                $poss = array_keys($style['box_shadow']['properties']);
                $values = array_values($style['box_shadow']['properties']);
                $classes = [];
                foreach ($poss as $pos) {
                    $classes[] = 'pgb_box_shadow_' . $pos;
                }
            @endphp
            <div class="row no-gutters">
                <div class="col-3">
                    <label for="">Color</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker"
                            value="{{ $style['box_shadow']['properties']['color'] }}" id="pgb-border-style">
                    </div>
                </div>
                <div class="col-9 pl-4">
                    <label for="">Properties</label>
                    <x-admin.pagebuilder.layout.input.number :classes="$classes" :values="$values" :appends="$poss" />
                </div>
            </div>
        </div>
    </x-slot>
</x-admin.dark.card>
