@switch($type)
    @case('change-layout')
        @php
            $arrLayout = [['layout' => ['12'], 'rvs' => false], ['layout' => ['10', '2'], 'rvs' => true], ['layout' => ['9', '3'], 'rvs' => true], ['layout' => ['8', '4'], 'rvs' => true], ['layout' => ['7', '5'], 'rvs' => true], ['layout' => ['6', '6'], 'rvs' => false], ['layout' => ['4', '4', '4'], 'rvs' => false], ['layout' => ['3', '3', '3', '3'], 'rvs' => false], ['layout' => ['5ths', '5ths', '5ths', '5ths', '5ths'], 'rvs' => false]];
        @endphp
        <input type="hidden" id="selected_layout" sid="{{ $data['id'] }}" data-layout="{{ implode(',', $data['layout']) }}">
        @foreach ($arrLayout as $key => $item)
            @php
                $string_1 = implode(',', $item['layout']);
                $string_2 = implode(',', $data['layout']);
            @endphp


            <div class="select-layout col-12 @if ($string_1 === $string_2) active @endif row w-100 mb-3"
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
                <div class="select-layout @if ($string_3 === $string_2) active @endif row w-100 mb-3"
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

    @case('edit-section')
        <input type="hidden" name="" id="edit-section-id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label for="edit-section-bg">Background Wrapper Section</label>
            <input type="text" class="form-control" id="edit-section-bg" value="{{ $data['payload']['background'] }}"
                placeholder="Fill in the background color code">

        </div>
        <div class="form-group">
            <label for="edit-section-class">Classes</label>
            <input type="text" data-role="tagsinput" class="form-control" value="{{ $data['payload']['class'] }}"
                id="edit-section-class" aria-describedby="classesHelp">
            <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
                <strong>Enter</strong></small>
        </div>
        <div class="form-group">
            <label>Container:</label>
            {{-- @dump($data) --}}
            <div class="switch">
                <input type="checkbox" id="{{ 'switch-section-cotainer' }}" class="switch-slide"
                    @if ($data['container'] == 'true') checked @endif /><label
                    for="{{ 'switch-section-cotainer' }}">Toggle</label>
            </div>
        </div>
    @break

    {{-- Làm tiếp các package còn lại video carouse...... --}}

    @default
        {{-- <div class="input-group pgb-section-m-content short-code mb-3" style="width: 400px;">
            <div class="input-group-prepend">
                <label class="input-group-text" for="pgb-m-content-type">Chọn ShortCode</label>
            </div>
            <select class="custom-select" name="shortCode" cid="{{ $data }}" id="pgb-m-content-type">
                <option selected value="0">Select</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
                <option value="editor">Editor</option>
                <option value="products">Slider Sản Phẩm</option>
            </select>
        </div> --}}

        <div class="pgb-shortCode w-100" id="pgb-shortCode">
            <div class="row justify-content-start no-gutters align-items-center w-100" >
                @foreach (config('pagebuilder.short_code') as $t => $shortCode)
                    <div class="pgb-shortCode-item col-3" value="{{ $t }}" cid="{{ $data }}">
                        <img src="{{ $shortCode['icon'] }}" alt="shortcodeimg">
                        <span class="name font-weight-bold d-block text-dark">{{ $shortCode['name'] }}</span>
                        <span class="note text-muted d-block text-dark">
                            {{ $shortCode['note'] }}
                        </span>
                    </div>
                @endforeach

            </div>
        </div>
@endswitch
<input type="hidden" name="type" id="pgb-modal-type" value="{{ $type }}">
