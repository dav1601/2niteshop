<a href="{{ route('detail_product' , ['slug'=> $prd->slug]) }}" class="rsl__item text-decoration-none">
    <div class="rsl__item--image">
         <img src="{{ $file->ver_img($prd->main_img) }}" alt="" class="img-fluid">
    </div>
    <div class="rsl__item--info">
         <span class="name d-block">
            {{ $prd->name }}
         </span>
       <span class="price d-block">{{ crf($prd->price) }}</span>
    </div>
</a>
