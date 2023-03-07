<div class="row w-100 mx-0 mb-4">
    {{-- <div class="d-none">
        <select class="custom-select" name="" id="ord__filter--sort">
            <option value="DESC">Mới nhất</option>
            <option value="ASC">Cũ nhất</option>
        </select>
    </div> --}}
    <div class="col-6 pl-0">

        <select name="" id="" class="custom-select update__status" data-id="{{ $ordered->id }}">
            <option value="{{ $ordered->status }}">{{ status_order($ordered->status) }}</option>
            @if ($ordered->status <= 2)
                @foreach (config('orders.status') as $key => $status)
                    @if ($key != $ordered->status)
                        <option value="{{ $key }}">{{ status_order($key) }}</option>
                    @endif
                @endforeach
            @endif

        </select>
    </div>
    <div class="col-6 pr-0">
        <select name="" id="" class="custom-select update__paid up-{{ $ordered->id }}"
            data-id="{{ $ordered->id }}">
            <option value="{{ $ordered->paid }}">{{ paid_order($ordered->paid) }}</option>
            @if ($ordered->status <= 2 && $ordered->paid != 2)
                {
                @foreach (config('orders.paid') as $key => $paid)
                    @if ($key != $ordered->paid)
                        <option value="{{ $key }}">{{ paid_order($key) }}</option>
                    @endif
                @endforeach
                }
            @endif
        </select>
    </div>
</div>
