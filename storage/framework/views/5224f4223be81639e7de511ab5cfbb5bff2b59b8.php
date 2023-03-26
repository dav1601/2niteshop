<div id="<?php echo e($idard); ?>">
    <?php
        $idcoll = 'collapse-' . $idard;
    ?>
    <div class="card">
        <div class="card-header p-0" id="headingOne">
            <h2 class="mb-0">
                <button
                    class="btn btn-link btn-block navi_btn <?php echo e($classbtn); ?> d-flex justify-content-between align-items-center text-light"
                    type="button" data-toggle="collapse" data-target="#<?php echo e($idcoll); ?>" aria-expanded="true"
                    aria-controls="<?php echo e($idcoll); ?>">
                    Danh Mục Sản Phẩm
                    <i class="fa-solid fa-angles-down"></i>
                </button>
            </h2>
        </div>
        <div id="<?php echo e($idcoll); ?>" class="<?php echo e($show ? 'show' : ''); ?> collapse <?php echo e($classcoll); ?>" <?php echo e($customattr); ?>>
            <div class="card-body row w-100">
                <?php $__currentLoopData = App\Models\Category::tree(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3 mb-4">
                        <div class="va-checkbox d-flex align-items-center w-100"
                            style="margin-left: calc(<?php echo e($cate->level); ?> * 25px);">
                            <input type="checkbox" name="<?php echo e($name); ?>" id="<?php echo e($id . $cate->id); ?>"
                                value="<?php echo e($cate->id); ?>" class="<?php echo e($class); ?>" <?php echo e($customattr); ?>

                                <?php if(in_array($cate->id, $selected)): echo 'checked'; endif; ?>>
                            <label for="<?php echo e($id . $cate->id); ?>">
                                <?php echo e($cate->name); ?>

                            </label>
                        </div>
                        <?php while(count($cate->children) > 0): ?>
                            <?php $__currentLoopData = $cate->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="va-checkbox d-flex align-items-center w-100"
                                    style="margin-left: calc(<?php echo e($cate->level); ?> * 25px);">
                                    <input type="checkbox" name="<?php echo e($name); ?>" id="<?php echo e($id . $cate->id); ?>"
                                        value="<?php echo e($cate->id); ?>" class="<?php echo e($class); ?>" <?php echo e($customattr); ?>

                                        <?php if(in_array($cate->id, $selected)): echo 'checked'; endif; ?>>
                                    <label for="<?php echo e($id . $cate->id); ?>">
                                        <?php echo e($cate->name); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/product/categories.blade.php ENDPATH**/ ?>