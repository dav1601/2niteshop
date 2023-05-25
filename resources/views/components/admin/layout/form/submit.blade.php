@props(['act' => 'Create', 'classAct', 'class'])
<div class="form-group {{ $class ?? '' }}">
    <input type="submit" value="{{ $act }}" class="btn btn-primary {{ $classAct ?? '' }}">
    @isset($btn)
        {{ $btn }}
    @endisset
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ml-2">Cancel</a>
</div>
