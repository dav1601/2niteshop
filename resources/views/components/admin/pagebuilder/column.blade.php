<div class="pgb-wp-column">
    <ul class="pgb-col row no-gutters trans-025-all" sid="{{ $section->id }}">
        @foreach ($section->layout as $index => $c)
            @php
                $data_column = $section->column[$index];
            @endphp
            @if ($data_column)
                @php
                    $attr = 'id=' . $data_column['id'];
                @endphp
                <li class="col-{{ $c }} px-2">
                    <div class="pgb-section-col">
                        <ul class="pgb-sort-connect-package pgb-sort-package pgb-wp-package pgb-wp-package-{{ $data_column['id'] }} trans-025-all"
                            data-type="package">
                            @if (isset($data_column['package']))
                                @foreach ($data_column['package'] as $indexPack => $packItem)
                                    <x-admin.pagebuilder.package :package="$packItem" />
                                @endforeach
                            @endif
                        </ul>


                        <x-admin.pagebuilder.component.button.add class="render-modal-package ui-disabled"
                            t="render-package" :custom-attr="$attr" />
                    </div>
                </li>
            @endif
        @endforeach
    </ul>

</div>
{{--  dựa vào key của section layout và column ví dụ layout 0 thì lấy colum 0 --}}
