@php
    $p = $package['payload'];
    $category = App\Models\ProductCategories::with(['product', 'cat'])
        ->where('category_id', '=', $p['content'])
        ->get();
@endphp
<div class="{{ rC($p['class']) }} " id="{{ $package['id'] }}">
    <x-client.products.slides :products="$category" />
</div>
