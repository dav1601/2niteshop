@foreach ($categories as $cat)
    <option value="{{ $cat->id }}">{{ str_repeat('--', $cat->level) }}
        {{ $cat->name }}
    </option>
    @if ($cat->children)
        <x-admin.form.select.option :categories="$cat->children" />
    @endif
@endforeach
