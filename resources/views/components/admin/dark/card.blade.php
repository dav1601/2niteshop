<div class="card {{ $class }} mb-4" id="{{ $id }}">
    <div class="card-header text-center">
        @isset($header)
            {{ $header }}
        @endisset
    </div>
    <div class="card-body">
        @isset($body)
            {{ $body }}
        @endisset
    </div>
</div>
