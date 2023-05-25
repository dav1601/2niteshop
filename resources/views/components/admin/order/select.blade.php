<div class="row w-100 mx-0 mb-4">
    <div class="col-6 pl-0">

        <select name="" id="" class="custom-select update__status" data-id="{{ $ordered->id }}">
            @if ($ordered->status <= 2)
                @foreach (config('orders.status') as $key => $status)
                    @if ($key >= $ordered->status)
                        <option @if ($key === $ordered->status) selected @endif value="{{ $key }}">
                            {{ status_order($key) }}</option>
                    @endif
                @endforeach
            @endif

        </select>
    </div>
    <div class="col-6 pr-0">
        <select name="" id="" class="custom-select update__paid up-{{ $ordered->id }}"
            data-id="{{ $ordered->id }}">

            @foreach (config('orders.paid') as $key => $paid)
                @if ($key >= $ordered->paid)
                    <option @if ($key === $ordered->paid) selected @endif value="{{ $key }}">
                        {{ paid_order($key) }}</option>
                @endif
            @endforeach


        </select>
    </div>
</div>
