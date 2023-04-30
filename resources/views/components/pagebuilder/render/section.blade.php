{{-- {{ renderVsb($section['advanced']['visible']) }} --}}

<div class="pgb-render-section-wp {{ renderVsb($section['advanced']['visible']) }}" s id="{{ $section['id'] }}">
    {{-- ---- --}}
    <div class="@if ($section['container'] === 'true') container @endif pgb-render-section">
        {{-- ---- --}}
        <div
            class="row no-gutters align-items-start justify-content-start {{ renderSpacing($section['advanced']['spacing']) }} {{ rC($section['payload']['class']) }}">
            @foreach ($section['layout'] as $key => $col)
                @php
                    $column = $section['column'][$key];
                @endphp

                <div class="layout-col col-{{ $col }} {{ rC($column['class']) }} pbg-render-col {{ renderAdvanced($column['advanced']) }} {{ renderColFW($column['advanced']['fw_devices']) }}"
                    id="{{ $column['id'] }}">
                    @if (isset($column['package']))
                        @foreach ($column['package'] as $keyPack => $package)
                            @php
                                $component = 'pagebuilder.render.package.' . $package['payload']['type'];
                            @endphp
                            <x-dynamic-component :component="$component" :package="$package" />
                        @endforeach
                    @endif
                </div>
            @endforeach

        </div>
        {{-- ---- --}}
    </div>
    {{-- ---- --}}
</div>
