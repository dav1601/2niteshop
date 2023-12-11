@props(['galleries' => [], 'productAct' => 'add'])
<div class="a-product-gallery">
    <div class="justify-content-start align-items-center" id="product-galleries">
        @if (count($galleries) > 0)
            @foreach ($galleries as $key => $item)
                <x-admin.product.gallery.item :productact="$productAct" :key="$key" :large="$item->path_700" :thumb="$item->path_80"
                    :id="$item->id" />
            @endforeach
        @endif
    </div>

    <a class="a-product-gallery-add col-10 mx-auto" product-act="{{ $productAct }}">
        <img src="https://res.cloudinary.com/vanh-tech/image/upload/v1684744084/logo/gallery_bqe9ej.png" width="40px">
    </a>
</div>
