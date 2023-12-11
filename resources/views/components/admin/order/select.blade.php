<div class="row w-100 mx-0 mb-4">
    <div class="col-6 pl-0">

        <select name="" id="" class="custom-select update_order update__status" data-update="status"
            data-id="{{ $ordered->id }}">

            @if ($ordered->status <= 2)
                @foreach (config('orders.status') as $key => $status)
                    @if ($key >= $ordered->status && $key !== 4)
                        <option @if ($key === $ordered->status) selected @endif value="{{ $key }}">
                            {{ status_order($key) }}</option>
                    @endif
                    @if ($key === 4 && $ordered->status === 1)
                        <option value="4">
                            {{ status_order(4) }}</option>
                    @endif
                @endforeach
            @else
                <option value="{{ $ordered->status }}">
                    {{ status_order($ordered->status) }}</option>
            @endif

        </select>
    </div>
    <div class="col-6 pr-0">
        <select name="" id="" class="custom-select update_order update__paid up-{{ $ordered->id }}"
            data-id="{{ $ordered->id }}" data-update="paid">

            @foreach (config('orders.paid') as $key => $paid)
                @if ($key >= $ordered->paid)
                    <option @if ($key === $ordered->paid) selected @endif value="{{ $key }}">
                        {{ paid_order($key) }}</option>
                @endif
            @endforeach


        </select>
    </div>
</div>
