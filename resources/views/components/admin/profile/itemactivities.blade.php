@if (count($sorted) > 0)
    @foreach ($sorted as $item)
        @if ($item->name != null || $item->name != '')
            <div class="d-flex item-activiti justify-content-start align-items-center">
                <img src="{{ urlImg($item->main_img, 'media') }}" class="rounded-circle" width="50" height="50"
                    alt="">
                <div class="content flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="activivi">
                        <span class="d-block title"><strong>Bạn</strong> đã đăng sản phẩm <a target="_blank"
                                href="{{ route('detail_product', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                        </span>
                        <span class="d-block time">
                            @if ($carbon->create($item->created_at)->isToday())
                                Hôm nay , {{ $carbon->create($item->created_at)->fomat('H:i a') }}
                            @elseif ($carbon->create($item->created_at)->isYesterday())
                                Hôm qua , {{ $carbon->create($item->created_at)->fomat('H:i a') }}
                            @elseif (!$carbon->create($item->created_at)->isToday() && !$carbon->create($item->created_at)->isYesterday())
                                {{ $item->created_at }}
                            @endif
                        </span>
                    </div>
                    <div class="view_time">
                        <span class="d-block time-ago mb-1">
                            {{ $carbon->create($item->created_at)->diffForHumans($carbon->now()) }}</span>
                    </div>
                </div>
            </div>
            <hr>
        @else
            <div class="d-flex item-activiti justify-content-start align-items-center">
                <img src="{{ urlImg($item->img) }}" class="rounded-circle" width="50" height="50" alt="">
                <div class="content flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="activivi">
                        @php
                            $href = url('tin-tuc/' . App\Models\CatBlog::where('id', '=', $item->cat_id)->first()->slug . '/' . $item->slug);
                        @endphp
                        <span class="d-block title"><strong>Bạn</strong> đã đăng bài viết <a target="_blank"
                                href="{{ $href }}">{{ $item->title }}</a> </span>
                        <span class="d-block time">
                            @if ($carbon->create($item->created_at)->isToday())
                                Hôm nay , {{ $carbon->create($item->created_at)->fomat('H:i a') }}
                            @elseif ($carbon->create($item->created_at)->isYesterday())
                                Hôm qua , {{ $carbon->create($item->created_at)->fomat('H:i a') }}
                            @elseif (!$carbon->create($item->created_at)->isToday() && !$carbon->create($item->created_at)->isYesterday())
                                {{ $item->created_at }}
                            @endif
                        </span>
                    </div>
                    <div class="view_time">
                        <span class="d-block time-ago mb-1">
                            {{ $carbon->create($item->created_at)->diffForHumans($carbon->now()) }}</span>
                    </div>
                </div>
            </div>
            <hr>
        @endif
    @endforeach
@endif
