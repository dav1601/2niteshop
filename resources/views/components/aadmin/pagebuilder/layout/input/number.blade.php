<div class="form-group my-3">
    <label class="mb-2"> {{ $header }} </label>
    <div class="row w-100">
        @for ($i = 0; $i <= 3; $i++)
            <div class="col-3 input-group">
                <input type="number" min="0" max="100" value="{{ $values[$i] }}"
                    class="form-control {{ $classes[$i] }}">
                <div class="input-group-append">
                    <span class="input-group-text text-uppercase">{{ $appends[$i] }}</span>
                </div>
            </div>
        @endfor
    </div>
</div>
