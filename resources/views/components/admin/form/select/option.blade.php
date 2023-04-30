@foreach ($categories as $cat)
    <option value="{{ $cat->id }}" @if (collect($cat)->get($key) == $selected) selected @endif>
        {{ str_repeat('--', $cat->level) }}
        {{ $cat->name }}
    </option>
    @if ($cat->children)
        <x-admin.form.select.option :selected="$selected" :key="$key" :categories="$cat->children" />
    @endif
@endforeach
