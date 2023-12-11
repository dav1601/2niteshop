<div id="a-media-media" class="row no-gutters h-100">
    <div class="col-10" id="a-media-media-l">
        <div id="a-media-filters" class="mt-2">
            {!! Form::open(['url' => route('a-media.load'), 'id' => 'formFilterMedia']) !!}
            <div class="row justify-content-between">
                <div class="col-8">
                    <div class="form-group">
                        <x-admin.layout.form.label text="filter media" />
                        <div class="row no-gutters">
                            <div class="col-1 px-1">
                                <select class="custom-select" id="filter-media-items-page">
                                    <option value="50" selected>50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                            </div>
                            <div class="col-2 px-1">
                                <select class="custom-select" id="filter-media-model">
                                    <option value="all" selected>All Model</option>
                                    @foreach (config('avmedia.models') as $model)
                                        <option value="{{ $model }}">{{ $model }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 px-1">
                                <select class="custom-select" id="filter-media-collection">
                                    <option value="all" selected>All Collection</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-4 pr-5">
                    <div class="row justify-content-end align-items-center">
                        <div class="col-3">
                            <x-admin.layout.form.label text="Multiple" />
                            <div class="switch position-relative mx-auto" style="top:-15px;">
                                <input type="checkbox" id="a-media-mode" /><label for="a-media-mode">Multiple</label>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <x-admin.layout.form.label text="search" />
                                <input type="text" class="form-control" id="filter-media-search">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div id="a-media" class="a-media">
            {{-- ----- --}}
            <div id="a-media-files">



            </div>
            {{-- ------- --}}
            <strong class="muted w-100 d-block my-2 text-center" id="a-media-out-of">No Media</strong>


        </div>
    </div>
    <div class="col-2" id="a-media-media-r">
        {{-- <x-admin.media.item.detail /> --}}
    </div>
</div>
