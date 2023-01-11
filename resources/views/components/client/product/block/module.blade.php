<div class="module__block">
    <div class="module__block--item">
        @foreach ($contents as $content)
            <x-client.product.block.content :content="$content" />
        @endforeach
    </div>
</div>
