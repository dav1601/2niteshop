@php
    $categories = App\Models\Category::tree(false);
@endphp
<select class="custom-select {{ $class }}" name="{{ $name }}" id="{{ $id }}">
    <x-admin.form.select.option :categories="$categories" :selected="$selected" />
</select>
