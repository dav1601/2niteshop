@props(['media' => [], 'multiple' => true, 'collections' => [], 'models' => []])

<div id="a-media-media" class="row no-gutters">
    <div class="col-10" id="a-media-media-l">
        <div id="a-media-filters">
            {!! Form::open(['url' => route('a-media.load'), 'id' => 'formFilterMedia']) !!}
            <div class="row justify-content-between">
                <div class="col-9">
                    <div class="form-group">
                        <x-admin.layout.form.label text="filter media" />
                        <div class="row no-gutters">
                            <div class="col-2 px-1">
                                <select class="custom-select" name="" id="">
                                    <option selected>All Model</option>
                                </select>
                            </div>
                            <div class="col-2 px-1">
                                <select class="custom-select" name="" id="">
                                    <option selected>All Collection</option>
                                </select>
                            </div>
                            <div class="col-2 px-1">
                                <select class="custom-select" name="" id="">
                                    <option selected>All Date</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 pr-5">
                    <div class="form-group">
                        <x-admin.layout.form.label text="search" />
                        <input type="text" class="form-control" name="" id="">

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div id="a-media" class="a-media">
            <div class="d-flex flex-wrap" id="a-media-files">
                @if (count($media) > 0)
                    @foreach ($media as $file)
                        <x-admin.media.item.image :image="$file" />
                    @endforeach
                @endif

            </div>
            <input type="hidden" value="{{ $multiple ? 'm' : 's' }}" id="media-multiple">

        </div>
    </div>
    <div class="col-2" id="a-media-media-r">
        {{-- <x-admin.media.item.detail /> --}}
    </div>
</div>
