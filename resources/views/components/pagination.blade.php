@props(['number_page' => 0, 'page' => 1, 'classWp' => '', 'id' => '', 'class' => ''])
@php
    $page = (int) $page;
    $number = (int) $number_page;
    $prev = $page - 1;
    $next = $page + 1;
    $point = 2;
    $pointShowPageFirst = 4;
@endphp
@if ($number_page > 0)
    <nav aria-label="Page navigation example">
        <ul class="pagination {{ $classWp }}" id="{{ $id }}">
            @if ($page > 1)
                <li class="page-item {{ $class }}">
                    <a class="page-link" data-page="{{ $prev }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif
            @if ($page >= $pointShowPageFirst)
                <li class="page-item {{ $class }}"><a class="page-link" data-page="1">1</a></li>
                <li class="page-item"><a class="page-link">...</a></li>
            @endif
            @for ($i = 1; $i <= $number_page; $i++)
                @if ($i < $page + $point && $i > $page - $point)
                    <li class="page-item {{ $class }} {{ $page === $i ? 'active' : '' }}"><a class="page-link"
                            data-page="{{ $i }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if ($page < $number_page - $point)
                <li class="page-item"><a class="page-link">...</a></li>
                <li class="page-item {{ $class }}"><a class="page-link" data-page="{{ $number_page }}">
                        {{ $number_page }}
                    </a>
                </li>
            @endif
            @if ($page < $number_page)
                <li class="page-item {{ $class }}">
                    <a class="page-link" aria-label="Next" data-page="{{ $next }}">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
