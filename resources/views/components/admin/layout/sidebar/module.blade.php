@props(['active', 'data', 'key'])
@php
    $id = str_replace(' ', '-', $key);
    $isActive =  Session::get('active', 'dashboard') === $data['module'];
@endphp
<li class="module">
    <a class="{{ $isActive ? 'module_active' : '' }}" data-toggle="collapse" data-target="#{{ $id }}"
        aria-expanded="true" aria-controls="{{ $id }}">
        <div class="d-flex align-items-center justify-content-between">
            <div class="left">
                <i class="fa-solid {{ $data['icon'] }}"></i>
                <span class="text-capitalize">{{ $key }}</span>
            </div>
            <div class="right">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div id="{{ $id }}" class="module_drop {{ $isActive ? 'show' : '' }} collapse"
        data-parent="#sidebar__content--accordion">
        <ul class="module__drop--menu">
            @foreach ($data['childrend'] as $key_c => $item)
                @php
                    $r = $item['route'] ? $item['route'] : 'test';

                @endphp
                <li class="item">
                    <a href="{{ route($r, isset($item['params']) ? ['id' => Auth::id()] : '') }}"
                        class="{{ $r === Route::currentRouteName() ? 'route_active' : '' }}">
                        <i class="fas fa-long-arrow-alt-right"></i>
                        <span class="text-capitalize">{{ $key_c }}</span>
                    </a>
                </li>
            @endforeach




        </ul>
    </div>
</li>
