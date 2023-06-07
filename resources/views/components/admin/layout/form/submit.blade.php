@props(['act' => 'Create', 'classAct' => '', 'class' => '', 'id' => ''])
<div class="form-group {{ $class ?? '' }}">
    <button type="submit" id="{{ $id }}" class="btn btn-primary {{ $classAct ?? '' }}">
        {{ $act }}
    </button>
    @isset($btn)
        {{ $btn }}
    @endisset
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ml-2">Cancel</a>
</div>
