<div class="form-group mb-5">
    <label for="">Tên Danh Mục</label>
    <input type="text" class="form-control" name="name" id="" value="{{ $category->name }}" placeholder="">
</div>
<div class="form-group">
    <label for="">Danh Mục Cha</label>
    <select class="custom-select" name="parent" id="parent">
        <option @if ($category->parent_id == 0) selected @endif value="0">⭐Là Danh Mục Chính</option>
        <x-admin.form.select.option :categories="App\Models\Category::tree()" :selected="$category->parent_id" />
    </select>
</div>
<input type="hidden" name="id" value="{{ $category->id }}">
<div class="form-group mb-5">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" id="" placeholder="Title Danh Mục"
        value="{{ $category->title }}">

</div>
<div class="form-group mb-5">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" id=""
        placeholder="">
</div>
{{-- --}}
<div class="form-group mb-5">
    <label for="">Description</label>
    <textarea type="text" class="form-control" name="desc" id="" placeholder="" rows="4">{{ $category->desc }}</textarea>
</div>
{{-- --}}
<div class="form-group mb-5">
    <label for="">Keywords</label>
    <input type="text" data-role="tagsinput" id="m_editCategoryKw" class="form-control" name="keywords"
        value="{{ $category->keywords }}">
</div>
{{-- --}}
<div class="my-4">
    <label class="mb-4">Active:</label>
    <div class="switch">
        <input type="checkbox" id="{{ 'switch-category-' . $category->id }}" name="active-category"
            data-id="{{ $category->id }}" class="switch-category"
            @if ($category->active == 1) checked @endif /><label
            for="{{ 'switch-category-' . $category->id }}">Toggle</label>
    </div>
</div>
{{-- --------- --}}
<x-admin.ui.form.image name="img" blockEventDef="true" classImage="rounded" classWp="w-100 mb-5"
    classClear="image-category-clear" classUpload="image-category-upload" classInput="image-category-input"
    id="m_editCategoryBanner" :image="$file->ver_img($category->img)" label="Banner">
    <x-slot name="input" :data-id="$category->id" data-type="img">

    </x-slot>
    <x-slot name="btn_clear" :data-id="$category->id" data-type="img">

    </x-slot>
    <x-slot name="btn_upload" :data-id="$category->id" data-type="img">

    </x-slot>
</x-admin.ui.form.image>
<x-admin.ui.form.image name="icon" blockEventDef="true" classImage="rounded" classClear="image-category-clear"
    classUpload="image-category-upload" classInput="image-category-input" id="m_editCategoryIcon" :image="$file->ver_img($category->icon)"
    label="icon" width="64px" height="64px">
    <x-slot name="input" :data-id="$category->id" data-type="icon">

    </x-slot>
    <x-slot name="btn_clear" :data-id="$category->id" data-type="icon">

    </x-slot>
    <x-slot name="btn_upload" :data-id="$category->id" data-type="icon">

    </x-slot>
</x-admin.ui.form.image>
