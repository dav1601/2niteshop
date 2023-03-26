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
        <div id="{{ $idcoll }}" class="{{ $show ? 'show' : '' }} collapse {{ $classcoll }}" {{ $customattr }}>
            <div class="card-body row w-100">
                @foreach (App\Models\Category::tree() as $cate)
                    <div class="col-3 mb-4">
                        <div class="va-checkbox d-flex align-items-center w-100"
                            style="margin-left: calc({{ $cate->level }} * 25px);">
                            <input type="checkbox" name="{{ $name }}" id="{{ $id . $cate->id }}"
                                value="{{ $cate->id }}" class="{{ $class }}" {{ $customattr }}
                                @checked(in_array($cate->id, $selected))>
                            <label for="{{ $id . $cate->id }}">
                                {{ $cate->name }}
                            </label>
                        </div>
                        @while (count($cate->children) > 0)
                            @foreach ($cate->children as $cate)
                                <div class="va-checkbox d-flex align-items-center w-100"
                                    style="margin-left: calc({{ $cate->level }} * 25px);">
                                    <input type="checkbox" name="{{ $name }}" id="{{ $id . $cate->id }}"
                                        value="{{ $cate->id }}" class="{{ $class }}" {{ $customattr }}
                                        @checked(in_array($cate->id, $selected))>
                                    <label for="{{ $id . $cate->id }}">
                                        {{ $cate->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endwhile
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
