<table class="table-dark table-bordered w-100 mb-0 table">

    <tbody>
        @foreach ($vadata->data as $item)
            @php
                $name = '';
                $name = collect($item)->get($p);
            @endphp
            <tr>
                <td style="width:30px">
                    @php
                        $id = 'select__prd--check-' . $item->id;
                    @endphp
                    <div class="col-3 select__prd--item mb-4">
                        <div class="va-checkbox d-flex align-items-center w-100">
                            <input type="checkbox" value="{{ $item->id }}" class="select__prd--check"
                                id="{{ $id }}" {{ array_key_exists($item->id, $selected) ? 'checked' : '' }}
                                data-name="{{ $name }}">
                            <label for="{{ $id }}"></label>
                        </div>
                    </div>
                </td>

                <td> {{ $name }} </td>
                @if ($m === 'Options')
                    <td class="text-center">
                        Giá: {{ crf($item->price) }}
                    </td>
                @endif

                @if ($m === 'BlockProduct')
                    <td class="text-center">
                        <button type="button" data-content=" {{ $item->text }}"
                            class="btn btn-primary content__block"><i class="fa-solid fa-eye"></i></button>
                    </td>
                @endif
                @if ($m === 'PageBuilder')
                    <td class="text-center">
                        {{ $item->type }}
                    </td>
                @endif
                @if ($m === 'Policy')
                    <td class="text-center">
                        <button type="button" data-content=" {{ $item->content }}"
                            class="btn btn-primary content__block"><i class="fa-solid fa-eye"></i></button>
                    </td>
                    <td class="text-center">
                        {{ $item->position }}
                    </td>
                @endif
            </tr>
        @endforeach


    </tbody>
</table>
<div class="card-footer" id="select__prd--page">
    <x-pagination :number_page="$vadata->number_page" :page="$page" classWp="justify-content-center mt-2" />
</div>
@if ($m === 'BlockProduct' || $m === 'Policy')
    <div class="modal fade" id="view__content__block" tabindex="-1" role="dialog"
        aria-labelledby="view__content__blockTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="view__content__blockTitle">Content</h5>
                </div>
                <div class="modal-body" id="view__content__block__body">

                </div>
            </div>
        </div>
    </div>
@endif
