<div class="col-3 prd__s--item mb-4">
    <div class="card">
        <div class="prd-img">
            <img src="<?php echo e($file->ver_img($prd->main_img)); ?>" alt="" class="prd-img--main">
            <img src="<?php echo e($file->ver_img($prd->sub_img)); ?>" alt="" class="prd-img--sub">
        </div>
        <div class="prd-info p-3">
            <span class="name d-block"><?php echo e($prd->name); ?></span>
            <span class="price d-block"><i class="fas fa-tags pr-1"></i>Giá bán: <?php echo e(crf($prd->price)); ?></span>
            <span class="price__cost price d-block" style="color:#dd991b;"><i class="fas fa-tags pr-1"></i>Giá gốc:
                <?php echo e(crf($prd->historical_cost)); ?></span>
            <span class="prdcer d-block"><i class="fas fa-building pr-1"></i>Producer: <?php echo e($prd->producer->name); ?></span>
            <span class="model d-block"><i class="fab fa-unity pr-1"></i>Model: <?php echo e($prd->model); ?></span>
            <span class="usage d-block"><i class="fas fa-box-open pr-1"></i> <?php echo e(usage_stt($prd->usage_stt)); ?></span>
            <div class="row mx-0 mt-3">
                
                <div class="form-group col-12 pr-0 pl-0">
                    <select class="custom-select" name="" id="product__show--hl" data-id="<?php echo e($prd->id); ?>">
                        <option value="<?php echo e($prd->highlight); ?>"><?php echo e(highlight_stt($prd->highlight)); ?></option>
                        <?php $__currentLoopData = Config::get('product.highlight'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($highlight != $prd->highlight): ?>
                                <option value="<?php echo e($highlight); ?>"><?php echo e(highlight_stt($highlight)); ?>

                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group mt-2">
                <select class="custom-select" name="" id="product__show--stock" data-id="<?php echo e($prd->id); ?>">
                    <option value="<?php echo e($prd->stock); ?>"><?php echo e(stock_stt($prd->stock)); ?></option>
                    <?php $__currentLoopData = Config::get('product.stock'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($stock != $prd->stock): ?>
                            <option value="<?php echo e($stock); ?>"><?php echo e(stock_stt($stock)); ?>

                            </option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="prd-date d-flex justify-content-between align-items-center mb-2 mt-2">
                <div class="date">
                    <i class="far fa-calendar pr-1"></i>
                    <span><?php echo e($prd->created_at->toFormattedDateString()); ?></span>
                </div>
                <div class="author">
                    <span><?php echo e($prd->author); ?></span>
                </div>
            </div>
            <div class="action d-flex justify-content-center align-items-center mt-4">
                <div class="action-edit mx-2">
                    <a target="_blank" href="<?php echo e(route('product_view_edit', ['id' => $prd->id])); ?>"
                        class="d-block btn navi_btn"><i class="fas fa-edit pr-1"></i>
                        Chỉnh Sửa</a>
                </div>
                <div class="action-delete">
                    <a data-url="<?php echo e(route('delete_product', ['id' => $prd->id])); ?>"
                        class="d-block btn navi_btn remove__product mx-3"><i class="fas fa-trash pr-1"></i>
                        Xoá</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/product/item.blade.php ENDPATH**/ ?>