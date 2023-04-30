@php
    $arrayVisible = explode(',', $adv['visible']);
    $spacing = $adv['spacing'];
@endphp
<div class="nav nav-pills justify-content-center my-4" id="nav-tab-pgb-modal" role="tablist">
    @if ((bool) $isPack)
        <button class="nav-link active" id="pgb-content-pack" data-toggle="tab" data-target="#pgb-pane-content-pack"
            type="button" role="tab" aria-controls="pgb-pane-content-pack" aria-selected="true">General</button>
    @endif
    <button class="nav-link {{ !$isPack ? 'active' : '' }}" id="pgb-nav-style" data-toggle="tab"
        data-target="#pgb-pane-style" type="button" role="tab" aria-controls="pgb-pane-style"
        aria-selected="false">Style</button>
    <button class="nav-link" id="pgb-nav-advanced" data-toggle="tab" data-target="#pbg-pane-advanced" type="button"
        role="tab" aria-controls="pbg-pane-advanced" aria-selected="false">Advanced</button>
</div>

<div class="tab-content" id="pgb-tabContent">
    @if ((bool) $isPack)
        <div class="tab-pane fade show active" id="pgb-pane-content-pack" role="tabpanel"
            aria-labelledby="pgb-content-pack">
            @if (isset($content))
                {{ $content }}
            @endif
        </div>
    @endif
    <div class="tab-pane fade {{ !$isPack ? 'active show' : '' }}" id="pgb-pane-style" role="tabpanel"
        aria-labelledby="pgb-nav-style">
        @if (isset($style))
            {{ $style }}
        @endif
    </div>
    <div class="tab-pane fade" id="pbg-pane-advanced" role="tabpanel" aria-labelledby="pgb-nav-advanced">
        <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
            <strong>TIPS AND TRICKS</strong> Nếu bạn muốn 1 khoảng cách cho mọi thiết bị thì bạn có thể sử dụng classes
            <strong>SPACING</strong> của boostrap 4 cheat sheet: <strong><a
                    href="https://hackerthemes.com/bootstrap-cheatsheet/#m-1" target="_blank">boostrap 4 cheat
                    sheet</a></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <x-admin.dark.card>
            <x-slot name="header">
                Hiển thị
            </x-slot>
            <x-slot name="body">

                @foreach (config('pagebuilder.breakpoint') as $key => $item)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" @checked(in_array($key, $arrayVisible)) value="{{ $key }}"
                            id="visible-on-{{ $key }}" class="custom-control-input pgb-device-visible">
                        <label class="custom-control-label" for="visible-on-{{ $key }}">Hiển thị trên
                            {{ $item['name'] }}
                        </label>
                    </div>
                @endforeach
            </x-slot>
        </x-admin.dark.card>
        {{-- ///////////// --}}
        <x-admin.dark.card>
            <x-slot name="header">
                Spacing
            </x-slot>
            <x-slot name="body">
                <x-admin.modal.pagebuilder.tabs.spacing type="m" :spacing="$spacing" />
                <x-admin.modal.pagebuilder.tabs.spacing type="p" :spacing="$spacing" />
            </x-slot>
        </x-admin.dark.card>
        @isset($advanced)
            {{ $advanced }}
        @endisset
    </div>
</div>
