@php
    $slides = collect($slides)->groupBy('status');
    $check = $slides->first()[0]->status == 1;
    if (!$check) {
        $slides = $slides->reverse();
    }
@endphp


<div class="row w-100">
    @foreach ($slides as $stt => $items)
        {{-- <h5 class="card-header text-center"> {{ $stt == 1 ? 'Hoạt động' : 'Chờ' }} </h5> --}}
        <ul class="col-6 stt-{{ $stt }} px-2">
            <h5 class="card-header text-center"> {{ $stt == 1 ? 'Hoạt động' : 'Chờ' }} </h5>
            @php
                $items = collect($items)->sortBy('index');
            @endphp
            @foreach ($items as $item)
                <x-admin.slides.show.item :slide="$item" />
            @endforeach
        </ul>
    @endforeach

</div>
