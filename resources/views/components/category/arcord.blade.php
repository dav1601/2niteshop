<div id="collapse-{{ $id}}" class="collapse multi-collapse" data-id="{{ $id }}" aria-labelledby="headingOne"  >
<ul class="nite__menu lv-{{ $level }}">
    <x-category.categories :categories="$category" />
   @if ($id == 120)
   <li class="nite__menu--item">
    <a href="{{ url('category/amiibo') }}"  >
        <div class="icon-name">
            <span>Amiibo</span>
        </div>
    </a>
</li>
<li class="nite__menu--item">
    <a href="{{ url('category/nintendo-labo') }}"  >
        <div class="icon-name">
            <span>Nintendo Labo</span>
        </div>
    </a>
</li>
   @endif
</ul>
</div>
