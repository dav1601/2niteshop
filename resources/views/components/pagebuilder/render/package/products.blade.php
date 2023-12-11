@php
    $p = $package['payload'];
    $products = explode(',', $p['content']);
    array_shift($products);
    $products = App\Models\Products::whereIn('id', $products)->get();
@endphp
@dd($products)
{{-- <div class="{{ rC($p['class']) }}  {{ renderAdvanced($package['advanced']) }}" id="{{ $package['id'] }}">
    <x-client.products.slides :products="$products" />
   </div> --}}

