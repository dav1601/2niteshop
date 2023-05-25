@props(['heading', 'content', 'footer'])
<div {{ $attributes->merge(['class' => ' w-100 card ']) }}>
    @isset($heading)
        <div {{ $heading->attributes->merge(['class' => 'card-header']) }}>
            {{ $heading }}
        </div>
    @endisset

    <div {{ $content->attributes->merge(['class' => 'card-body']) }}>
        @isset($content)
            {{ $content }}
        @endisset
    </div>
    @isset($footer)
        <div {{ $footer->attributes->merge(['class' => 'card-footer']) }}>
            {{ $footer }}
        </div>
    @endisset

</div>
