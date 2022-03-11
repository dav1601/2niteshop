@php
$categories = App\Models\Category::tree();
@endphp
<ul id="home__menu" class="menu__toggle">
    <x-client.menu.categories :categories="$categories" />
</ul>
