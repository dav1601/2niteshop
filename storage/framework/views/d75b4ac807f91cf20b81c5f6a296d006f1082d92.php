<input type="hidden" name="" id="edit-package-type" value="<?php echo e($type); ?>">
<input type="hidden" name="" id="edit-package-id" value="<?php echo e($package['id']); ?>">
<?php if (isset($component)) { $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Layout\Tabs::resolve(['isPack' => true,'adv' => $package['advanced']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.layout.tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Layout\Tabs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('content', null, []); ?> 
        <?php switch($type):
            case ('image'): ?>
                <div class="form-group my-3">
                    <?php if (isset($component)) { $__componentOriginala68d1e50a1ce90d6687b663c9bf0d38e58918858 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\File\Upload\Lfm::resolve(['id' => 'package-edit-image','images' => $package['payload']['content']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.file.upload.lfm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\File\Upload\Lfm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala68d1e50a1ce90d6687b663c9bf0d38e58918858)): ?>
<?php $component = $__componentOriginala68d1e50a1ce90d6687b663c9bf0d38e58918858; ?>
<?php unset($__componentOriginala68d1e50a1ce90d6687b663c9bf0d38e58918858); ?>
<?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="pack-edit-image-href">Link</label>
                    <input type="text" class="form-control" value="<?php echo e($package['payload']['options']['href']); ?>"
                        name="" id="pack-edit-href" placeholder="">
                </div>

                 <?php $__env->slot('style', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Style\Border::resolve(['package' => $package] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.style.border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Style\Border::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1)): ?>
<?php $component = $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1; ?>
<?php unset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
            <?php break; ?>

            <?php case ('video'): ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="pgb-m-content-type">Chọn Nền Tảng Video</label>
                    </div>

                    <select class="custom-select" name="video-platform" id="pgb-m-video-platform">
                        <option <?php if($package['payload']['options']['pf'] == 'def'): ?> selected <?php endif; ?> value="0">Chọn Platform</option>
                        <option <?php if($package['payload']['options']['pf'] == 'yt'): ?> selected <?php endif; ?> value="yt">YouTube
                            (<strong>Recommended</strong>)</option>
                        <option <?php if($package['payload']['options']['pf'] == 'drive'): ?> selected <?php endif; ?> value="drive">Google Drive</option>
                        <option <?php if($package['payload']['options']['pf'] == 'other'): ?> selected <?php endif; ?> value="other">Khác</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="pack-edit-video-source">Source</label>
                    <input type="text" class="form-control" name="" value="<?php echo e($package['payload']['content']); ?>"
                        id="pack-edit-video-source" placeholder="">
                </div>
            <?php break; ?>

            <?php case ('texteditor'): ?>
                <div class="form-group">
                    <label for="pack-edit-tiny">Editor</label>
                    <textarea name="content" id="pgb-package-edit-tiny" style="z-index: 20000;" class="my-editor position-relative">  <?php echo e($package['payload']['content']); ?>  </textarea>
                </div>
            <?php break; ?>

            <?php case ('tabs'): ?>
                <div class="form-group">
                    <label>TABS</label>
                </div>
                <div id="form-group mt-4">
                    <div class="row align-items-center" id="pack-edit-tabs-output">
                        <?php if (isset($component)) { $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33 = $component; } ?>
<?php $component = App\View\Components\Layout\Loading::resolve(['center' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\Loading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33)): ?>
<?php $component = $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33; ?>
<?php unset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="form-group border-bottom-1 bb-g-1 mt-3 pb-5 text-center">
                    <button type="button" id="pack-edit-tabs-add" style="width:200px;" class="btn btn-primary"><i
                            class="fa-solid fa-plus"></i>
                        TAB</button>
                </div>
                 <?php $__env->slot('style', null, []); ?> 
                    <div class="form-group mt-5">
                        <div class="form-group mb-4">
                            <label for="color-active-tabs">Màu active</label>
                            <div class="input-group myColorPicker">
                                <input type="text" class="form-control color-picker"
                                    value="<?php echo e($package['style']['activeColor']); ?>" id="color-active-tabs">
                            </div>
                        </div>
                    </div>
                 <?php $__env->endSlot(); ?>
            <?php break; ?>

            <?php case ('crsimages'): ?>
                <div class="form-group mb-4">
                    <label for="pack-edit-carousel-images">Items</label>
                    <div class="input-group">
                        <input type="number" min="1" max="16" value="1" class="form-control"
                            id="pack-edit-crs-image-number">
                        <div class="input-group-append">
                            <button type="button" id="pack-edit-crs-image-add" style="width:200px;" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i>
                                Item</button>
                        </div>
                    </div>
                    <span class="d-block mt-4">Total Item: <strong id="p-e-items">0</strong></span>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-crs-image-items">
                        <?php if (isset($component)) { $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33 = $component; } ?>
<?php $component = App\View\Components\Layout\Loading::resolve(['center' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\Loading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33)): ?>
<?php $component = $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33; ?>
<?php unset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php break; ?>

            <?php case ('category'): ?>
                <?php
                    $categories = App\Models\Category::tree(false);
                ?>
                <div class="form-group mb-5">
                    <label for="">Danh Mục</label>
                    <?php
                        $selected = $package['payload']['content'] ? $package['payload']['content'] : 'none';
                    ?>
                    <select class="custom-select" id="pack-edit-category">
                        <?php if (isset($component)) { $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18 = $component; } ?>
<?php $component = App\View\Components\Admin\Form\Select\Option::resolve(['selected' => $selected,'categories' => $categories] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Form\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18)): ?>
<?php $component = $__componentOriginalc9001fce224566214481bc365a1025e7bd824b18; ?>
<?php unset($__componentOriginalc9001fce224566214481bc365a1025e7bd824b18); ?>
<?php endif; ?>
                    </select>
                </div>
            <?php break; ?>

            <?php case ('header'): ?>
                <div class="form-group mb-2">
                    <label for="pack-edit-header">Nội Dung</label>
                    <input type="text" class="form-control" name="" value="<?php echo e($package['payload']['content']); ?>"
                        id="pack-edit-header" placeholder="">
                </div>
            <?php break; ?>

            <?php case ('googlemap'): ?>
                <div class="form-group mb-2">
                    <label for="pack-edit-ggmap">Nhúng mã html google map - Xem hướng dẫn tại đây: <strong><a
                                href="https://support.google.com/maps/answer/144361?hl=vi" target="_blank">Hướng dẫn lấy mã
                                nhúng</a></strong></label>
                    <input type="text" class="form-control" name="" value="<?php echo e($package['payload']['content']); ?>"
                        id="pack-edit-ggmap" placeholder="">
                </div>
            <?php break; ?>

            <?php case ('blogs'): ?>
                <div class="form-group mb-2">
                    <label for="pack-edit-blogs">Số lượng bài viết hiển thị</label>
                    <input type="number" max="100" min="1" class="form-control" name=""
                        value="<?php echo e($package['payload']['content']); ?>" id="pack-edit-blogs" placeholder="">
                </div>
            <?php break; ?>

            <?php case ('banners'): ?>
                <div class="form-group mb-4">
                    <div class="row no-gutters my-4">
                        <div class="col-6">
                            <label for="pack-edit-carousel-images">Số banners muốn thêm</label>
                            <div class="input-group">
                                <input type="number" min="1" max="8" value="1" class="form-control"
                                    id="pack-edit-banners-number">
                                <div class="input-group-append">
                                    <button type="button" id="pack-edit-banners-add" style="width:200px;"
                                        class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Item</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 form-group px-4">
                            <label for="">Hiển thị tối thiểu:</label>
                            <input type="number" min="0" max="0"
                                value="<?php echo e($package['payload']['content']['min']); ?>" class="form-control"
                                id="pack-edit-banners-min" aria-describedby="pack-edit-banners-help-min">
                            <small id="pack-edit-banners-help-min" class="form-text text-muted">Số item nằm trên 1 hàng ở
                                thiết bị nhỏ</small>
                        </div>
                        <div class="col-3 form-group">
                            <label for="">Hiển thị tối đa:</label>
                            <input type="number" min="0" max="0"
                                value="<?php echo e($package['payload']['content']['max']); ?>" class="form-control"
                                id="pack-edit-banners-max" aria-describedby="pack-edit-banners-help-max">
                            <small id="pack-edit-banners-help-max" class="form-text text-muted">Số item nằm trên 1 hàng ở
                                thiết bị to</small>
                        </div>
                    </div>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-banners-items">
                        <?php if (isset($component)) { $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33 = $component; } ?>
<?php $component = App\View\Components\Layout\Loading::resolve(['center' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\Loading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33)): ?>
<?php $component = $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33; ?>
<?php unset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33); ?>
<?php endif; ?>
                    </div>
                </div>
                 <?php $__env->slot('style', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1 = $component; } ?>
<?php $component = App\View\Components\Admin\Pagebuilder\Style\Border::resolve(['package' => $package] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.pagebuilder.style.border'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Pagebuilder\Style\Border::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1)): ?>
<?php $component = $__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1; ?>
<?php unset($__componentOriginal473117a5f2695396ed878d09de079a810f9c4ab1); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
            <?php break; ?>

            <?php case ('galleryyt'): ?>
                <div class="form-group mb-4">
                    <div class="row no-gutters my-4">
                        <div class="col-6">
                            <label for="pack-edit-carousel-images">Số video muốn thêm</label>
                            <div class="input-group">
                                <input type="number" min="1" max="16" value="1" class="form-control"
                                    id="pack-edit-banners-number">
                                <div class="input-group-append">
                                    <button type="button" id="pack-edit-gll-yt-add" style="width:200px;"
                                        class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                        Video</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pl-4">
                            <label for="">Số video hiển thị:</label>
                            <input type="number" min="1" max="8"
                                value="<?php echo e($package['payload']['content']['number_item']); ?>" class="form-control"
                                id="pack-edit-gll-yt-items" aria-describedby="pack-edit-gll-yt-help-max">
                            <small id="pack-edit-gll-yt-help-max" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="b-g-1 row my-4 py-4" id="pack-edit-gll-yt">
                        <div class="d-flex justify-content-center w-100 my-4">
                            <?php if (isset($component)) { $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33 = $component; } ?>
<?php $component = App\View\Components\Layout\Loading::resolve(['center' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Layout\Loading::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33)): ?>
<?php $component = $__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33; ?>
<?php unset($__componentOriginal48f2abf0c4f5727beb7bd4e16940ceebf447da33); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php break; ?>

            <?php default: ?>
        <?php endswitch; ?>
     <?php $__env->endSlot(); ?>
     <?php $__env->slot('advanced', null, []); ?> 
        <div class="form-group mb-4">
            <label for="edit-package-class">Classes</label>
            <input type="text" class="form-control" value="<?php echo e($package['payload']['class']); ?>"
                data-role="tagsinput" name="" id="edit-package-class" aria-describedby="helpId"
                placeholder="">

        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984)): ?>
<?php $component = $__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984; ?>
<?php unset($__componentOriginalc55512298d7256a3e33ccdb5da5f3996d1902984); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/edit/package.blade.php ENDPATH**/ ?>