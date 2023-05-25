@props(['modal', 'dialog', 'content', 'header', 'body', 'footer', 'title' => ''])
<div
    {{ $modal->attributes->merge(['class' => 'modal fade', 'data-keyboard' => 'false', 'data-backdrop' => 'static', 'tabindex' => '-1', 'aria-hidden' => true]) }}>
    <div {{ isset($dialog) ? $dialog->attributes->merge(['class' => 'modal-dialog']) : 'class=modal-dialog' }}>
        <div {{ isset($content) ? $content->attributes->merge(['class' => 'modal-content']) : 'class=modal-content' }}>
            <div {{ isset($header) ? $header->attributes->merge(['class' => 'modal-header']) : 'class=modal-header' }}>
                @if (isset($header))
                    {{ $header }}
                @else
                    <h5 class="modal-title">{{ $title }}</h5>
                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div {{ isset($body) ? $body->attributes->merge(['class' => 'modal-body']) : 'class=modal-body' }}>
                @isset($body)
                    {{ $body }}
                @endisset
            </div>
            <div {{ isset($footer) ? $footer->attributes->merge(['class' => 'modal-footer']) : 'class=modal-footer' }}>
                @isset($footer)
                    {{ $footer }}
                @endisset
            </div>
        </div>
    </div>
</div>
