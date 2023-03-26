<div class="form-group mb-5">
    <label for="">Tên Danh Mục</label>
    <input type="text" class="form-control" name="name" id="" value="{{ $category->name }}" placeholder="">

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
<x-admin.form.file name='img' id="m_editCategoryBanner" :custom="[
    'plh' => 'Cập Nhật Hình Ảnh Banner (Không update
    bỏ trống)',
]" />
<div class="my-4">
    @if (empty($category->img))
        <span>Chưa Có Hình Ảnh Banner </span>
    @else
        <img src="{{ $file->ver_img($category->img) }}" style="max-width:100%;" class="va-radius-fb" alt="">
    @endif
</div>
<x-admin.form.file name='icon' id="m_editCategoryIcon" :custom="[
    'plh' => 'Cập Nhật Icon (Không update bỏ
    trống)',
]" />
<div class="my-4">
    @if (empty($category->icon))
        <span>Chưa Có Hình Ảnh Icon</span>
    @else
        <img src="{{ $file->ver_img($category->icon) }}" style="max-width:100%;" class="va-radius-fb" alt="">
    @endif
</div>
