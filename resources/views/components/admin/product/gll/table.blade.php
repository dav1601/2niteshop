@props(['gll700' => [], 'gll80' => []])
@if (count($gll700) > 0)
    <table class="table-bordered table text-center">
        <thead>
            <tr>
                <th>Index</th>
                <th>Image 700x700</th>
                <th>Image 80x80</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gll700 as $index => $image700)
                @php
                    $image80 = $gll80[$index];
                @endphp
                <tr>
                    <td scope="row">{{ $index }}</td>
                    <td>
                        <img src="{{ $file->ver_img($image700['link']) }}" width="160" height="160" class="rounded">
                    </td>
                    <td>
                        <img src="{{ $file->ver_img($image80['link']) }}" width="80" height="80" class="rounded">
                    </td>

                    <td>
                        <button type="button" class="btn btn-outline-danger delete_gll"
                            data-index="{{ $index }}" data-id="{{ $image700['products_id'] }}">Delete</button>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
@else
    <span>No Data</span>
@endif
