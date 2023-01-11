<div class="card secsion__home my-3">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="secsion__home--header">
                Section-{{ $index + 1 }}
            </div>
            <div class="section__home--action">
                <button type="button" class="btn btn-primary section__home--delete" data-id="{{ $showid }}"
                    data-index="{{ $index }}"><i class="fa-solid fa-trash"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body text-center">
        @php
            $name = 'section-category-' . $index . '[]';
            $id = 'category__section-' . $index;
            $attr = 'data-index=' . $index;
            $idard = 'section-accord-' . $index;
        @endphp
        <x-admin.product.categories :name="$name" class="section__category" :id="$id" :customattr="$attr"
            :selected="$selected" :idard="$idard" />
    </div>
</div>
