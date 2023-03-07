<div class="form-group mb-5">
    <label for="">Tên Slide</label>
    <input type="text" class="form-control" name="name" value="{{ $slide->name }}" id="m-slideName"
        placeholder="Tên slide">
</div>
<div class="form-group mb-5">
    <label for="">Link Banner</label>
    <input type="text" class="form-control" name="link" value="{{ $slide->link }}" id="m-slideLink"
        placeholder="">
</div>
<x-admin.form.file name="img" id="m-slideImg" :custom="['plh' => 'Nếu không thay đổi bỏ qua']" />
<input type="hidden" name="id" value="{{ $slide->id }}" id="idSlide">
<div class="my-2">
    <span class="d-block">Hình ảnh hiện tại:</span>
    <img src="{{ $file->ver_img($slide->img) }}" class="w-100" style="max-height: 350px;" alt="">
</div>
