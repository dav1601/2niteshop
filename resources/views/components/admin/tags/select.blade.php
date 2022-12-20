@if (count($selected) > 0)
    @foreach ($selected as $id => $name)
        <li class="modal__select--tag-item badge badge-primary c-pointer my-2 mr-2" style="flex-grow: 0; flex-shrink:0"
            data-id="{{ $id }}">
            <span class="d-block"> {{ $name }} <i class="fa-solid fa-xmark ml-2"></i></span>
        </li>
    @endforeach
@endif
