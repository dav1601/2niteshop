@props(['heading', 'content', 'footer', 'type' => 'def', 'idColl' => '', 'title' => 'Card'])
@php
    $attrHeader = [];
    $attrBody = [];
    $classHeader = ['card-header', 'd-flex', 'justify-content-between', 'align-items-center'];
    $classBody = ['card-body'];
    $isColl = $type === 'collapse';
    if ($isColl) {
        array_push($classHeader, 'cursor-pointer');
        // array_push($classBody, 'collapse', 'multi-collapse');
        $attrHeader['data-toggle'] = 'collapse';
        $attrHeader['data-target'] = '#' . $idColl;
        $attrHeader['aria-expanded'] = 'true';
        $attrHeader['aria-controls'] = $idColl;
    }

    $attrHeader['class'] = implode(' ', $classHeader);
    $attrBody['class'] = implode(' ', $classBody);
    $attrBody['id'] = $idColl;

@endphp
<div {{ $attributes->merge(['class' => ' w-100 card va-card']) }}>

    @isset($heading)
        <div {{ $heading->attributes->merge($attrHeader) }}>
            {{ $heading }}
            @if ($isColl)
                <i class="fa-solid fa-caret-down text-white"></i>
            @endif
        </div>
    @endisset
    @if ($isColl)
        <div class="multi-collapse va-card-collapse collapse" id="{{ $idColl }}">
    @endif
    <div {{ $content->attributes->merge($attrBody) }}>

        @isset($content)
            {{ $content }}
        @endisset

    </div>
    @if ($isColl)
</div>
@endif
@if ($type === 'def')
    @isset($footer)
        <div {{ $footer->attributes->merge(['class' => 'card-footer']) }}>
            {{ $footer }}
        </div>
    @endisset
@endif


</div>
