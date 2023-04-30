<div class="pgb-advanced-section b-g-1 mb-5 py-4">
    <div class="d-flex justify-content-center align-items-center mb-4">
        <ul class="nav" role="tablist" id="pgb-nav-spacing-{{ $type }}">
            @foreach (config('pagebuilder.breakpoint') as $key => $item)
                <li class="nav-item ml-2" role="presentation">
                    <a class="nav-link {{ $key === 'xl' ? 'active' : '' }} space-item" data-toggle="tab"
                        data-target="#tab-pane-{{ $type }}-{{ $key }}" type="button" role="tab"
                        aria-selected="true">
                        <img src="{{ $item['icon'] }}" alt="">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content" id="pgb-tabs-{{ $type }}-content">
        @foreach (config('pagebuilder.breakpoint') as $key2 => $item2)
            <div class="tab-pane fade show {{ $key2 === 'xl' ? 'active' : '' }}"
                id="tab-pane-{{ $type }}-{{ $key2 }}" role="tabpanel"
                aria-labelledby="pgb-nav-{{ $type }}-{{ $key2 }}">
                <div class="row w-100">
                    @foreach (config('pagebuilder.pos') as $pos)
                        <div class="col-3 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ $type === 'm' ? 'Margin' : 'Padding' }}</span>
                            </div>
                            <input type="number" min="0" max="100"
                                value="{{ $spacing[$key2][$type . $pos] }}" class="form-control"
                                id="pgb-advanced-{{ $type . $pos }}-{{ $key2 }}">
                            <div class="input-group-append">
                                <span class="input-group-text text-uppercase">{{ $pos }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
