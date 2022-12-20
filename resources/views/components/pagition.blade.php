@php
    $prev = $page - 1;
    $next = $page + 1;
    $point = 2;
    
@endphp
<nav aria-label="Page navigation example">
    <ul class="pagination {{ $position . '  ' . $size }}" id="{{ $id }}">
        @if ($page > 1)
            <li class="page-item">
                <a class="page-link" data-page="{{ $prev }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        <li class="page-item"><a class="page-link" data-page="{{ $page }}">$page</a></li>


    </ul>
</nav>
