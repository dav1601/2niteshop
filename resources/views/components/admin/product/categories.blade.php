@props(['col' => 'col-3', 'selected' => [], 'show' => true, 'classCheckbox' => ''])

@php
    $attrInput = [];
    if (isset($cusAttrInput)) {
        foreach ($cusAttrInput->attributes as $key => $value) {
            $attrInput[$key] = $value;
        }
    }
    $categories = App\Models\Category::tree();
@endphp
<div id="{{ $idard }}">
    @php
        $idcoll = 'collapse-' . $idard;
    @endphp
    <div class="card">
        <div class="card-header p-0" id="headingOne">
            <h2 class="mb-0">
                <button
                    class="btn btn-link btn-block navi_btn {{ $classbtn }} d-flex justify-content-between align-items-center text-light"
                    type="button" data-toggle="collapse" data-target="#{{ $idcoll }}" aria-expanded="true"
                    aria-controls="{{ $idcoll }}">
                    Danh Mục Sản Phẩm
                    <i class="fa-solid fa-angles-down"></i>
                </button>
            </h2>
        </div>
        <div id="{{ $idcoll }}" class="{{ $classcoll }} {{ $show ? 'show' : '' }} collapse">
            <div class="card-body w-100 row" style="max-height: 500px; overflow-y: auto ; overflow-x:hidden">
                @foreach ($categories as $cate)
                    @php
                        $margin = 'margin-left:' . $cate->level * 30 . 'px';
                    @endphp
                    <div class="{{ $col }} mb-2 pb-2" style="border-bottom:1px solid grey">

                        <x-admin.layout.form.acheckbox :checked="in_array($cate->id, $selected)" :customattr="$attrInput" :id="$id . $cate->id">
                            <x-slot name="input" :name="$name" :value="$cate->id">
                            </x-slot>
                            <x-slot name="label">
                                {{ $cate->name }}
                            </x-slot>
                            <x-slot name="main" :style="$margin">

                            </x-slot>
                        </x-admin.layout.form.acheckbox>
                        @while (count($cate->children) > 0)
                            @foreach ($cate->children as $cate)
                                @php
                                    $margin = 'margin-left:' . $cate->level * 30 . 'px';
                                @endphp
                                <x-admin.layout.form.acheckbox :checked="in_array($cate->id, $selected)" :customattr="$attrInput" :id="$id . $cate->id">
                                    <x-slot name="input" :name="$name" :value="$cate->id">
                                    </x-slot>
                                    <x-slot name="label">
                                        {{ $cate->name }}
                                    </x-slot>
                                    <x-slot name="main" :style="$margin" class="" id="">

                                    </x-slot>
                                </x-admin.layout.form.acheckbox>
                            @endforeach
                        @endwhile
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
