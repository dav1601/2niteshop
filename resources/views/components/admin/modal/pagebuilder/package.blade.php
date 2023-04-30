@switch($type)
    @case('change-layout')
        @php
            $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['flex-custom-25', 'flex-custom-50', 'flex-custom-25'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
            // $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['flex-custom-25', 'flex-custom-50', 'flex-custom-25'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
        @endphp
        <input type="hidden" id="selected_layout" sid="{{ $data['id'] }}" data-layout="{{ implode(',', $data['layout']) }}">
        @foreach ($arrLayout as $key => $item)
            @php
                $string_1 = implode(',', $item['layout']);
                $string_2 = implode(',', $data['layout']);
            @endphp


            <div class="select-layout col-12 @if ($string_1 === $string_2) active @endif row w-100 no-gutters mx-0 mb-4"
                data-layout="{{ $string_1 }}">
                @foreach ($item['layout'] as $col)
                    <div class="col-{{ $col }} px-2">
                        <div class="select-layout-item d-flex justify-content-center align-items-center">
                            <strong class="text-dark"> {{ $col }} </strong>
                        </div>
                    </div>
                @endforeach

            </div>

            @if ($item['rvs'])
                @php
                    $arrRev = array_reverse($item['layout']);
                    $string_3 = implode(',', $arrRev);
                @endphp
                <div class="select-layout @if ($string_3 === $string_2) active @endif row w-100 mx-0 mb-4"
                    data-layout="{{ $string_3 }}">
                    @foreach ($arrRev as $colRev)
                        <div class="col-{{ $colRev }} px-2">
                            <div class="select-layout-item d-flex justify-content-center align-items-center">
                                <strong class="text-dark"> {{ $colRev }} </strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    @break

    @case('edit-package')
        <x-admin.pagebuilder.edit.package :package="$data['package']" :type="$data['typePack']" />
    @break

    @case('edit-column')
        <input type="hidden" name="" id="edit-col-id" value="{{ $data['id'] }}">
        <x-admin.pagebuilder.layout.tabs :isPack="false" :adv="$data['advanced']">
            <x-slot name="style">
                <div class="form-group mb-4">
                    <label>Background Column</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker" value="{{ $data['style']['background'] }}"
                            id="pgb-col-bg">
                    </div>
                </div>
                <x-admin.pagebuilder.style.border :package="$data" />
            </x-slot>
            <x-slot name="advanced">
                <x-admin.dark.card>
                    <x-slot name="header">
                        Full Width On Devices
                    </x-slot>
                    <x-slot name="body">
                        @foreach (config('pagebuilder.breakpoint') as $key => $item)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" @checked(in_array($key, explode(',', $data['advanced']['fw_devices']))) value="{{ $key }}"
                                    id="col-fw-on-{{ $key }}" class="custom-control-input pgb-fw-devices">
                                <label class="custom-control-label" for="col-fw-on-{{ $key }}">Full Width On
                                    {{ $item['name'] }}
                                </label>
                            </div>
                        @endforeach
                    </x-slot>
                </x-admin.dark.card>
                <div class="form-group mb-4">
                    <label for="edit-col-class">Classes</label>
                    <input type="text" data-role="tagsinput" class="form-control" value="{{ $data['class'] }}"
                        id="edit-col-class" aria-describedby="classesHelp">
                    <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                        <strong>Enter</strong></small>
                </div>
            </x-slot>
        </x-admin.pagebuilder.layout.tabs>
    @break

    @case('edit-section')
        <input type="hidden" name="" id="edit-section-id" value="{{ $data['id'] }}">
        <x-admin.pagebuilder.layout.tabs :isPack="false" :adv="$data['advanced']">
            <x-slot name="style">
                <div class="form-group mb-4">
                    <label>Background Section</label>
                    <div class="input-group myColorPicker">
                        <input type="text" class="form-control color-picker"
                            value="{{ $data['style']['background_section'] }}" id="pgb-section-bg-wp">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label>Background Container</label>
                    <div class="input-group myColorPicker">

                        <input type="text" class="form-control color-picker"
                            value="{{ $data['style']['background_container'] }}" id="pgb-section-bg">
                    </div>

                </div>
                <x-admin.pagebuilder.style.border :package="$data" />
            </x-slot>
            <x-slot name="advanced">
                <div class="form-group">
                    <label>Container Content:</label>
                    {{-- @dump($data) --}}
                    <div class="switch" style="top: -15px">
                        <input type="checkbox" id="{{ 'switch-section-cotainer' }}" class="switch-slide"
                            @if ($data['container'] == 'true') checked @endif /><label
                            for="{{ 'switch-section-cotainer' }}">Toggle</label>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="edit-section-class">Classes</label>
                    <input type="text" data-role="tagsinput" class="form-control" value="{{ $data['payload']['class'] }}"
                        id="edit-section-class" aria-describedby="classesHelp">
                    <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                        <strong>Enter</strong></small>
                </div>
            </x-slot>
        </x-admin.pagebuilder.layout.tabs>
    @break

    @default
        <div class="pgb-shortCode" style="min-width: 800px" id="pgb-shortCode">
            <div class="row justify-content-start no-gutters align-items-center w-100">
                @foreach (config('pagebuilder.short_code') as $t => $shortCode)
                    <div class="pgb-shortCode-item col-3" value="{{ $t }}" cid="{{ $data }}">
                        <img src="{{ $shortCode['icon'] }}" alt="shortcodeimg">
                        <span class="name font-weight-bold d-block text-dark">{{ $shortCode['name'] }}</span>
                        <span class="note text-muted d-block text-dark mt-1">
                            {{ $shortCode['note'] }}
                        </span>
                    </div>
                @endforeach

            </div>
        </div>
@endswitch
<input type="hidden" name="type" id="pgb-modal-type" value="{{ $type }}">
