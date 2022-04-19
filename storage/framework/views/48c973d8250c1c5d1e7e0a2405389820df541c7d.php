<div class="col-3 prd__s--item mb-4">
    <div class="card">
        <div class="prd-img">
            <img src="<?php echo e($file->ver_img($prd->main_img)); ?>" alt="" class="prd-img--main">
            <img src="<?php echo e($file->ver_img($prd->sub_img)); ?>" alt="" class="prd-img--sub">
        </div>
        <div class="prd-info p-3">
            <span class="name d-block"><?php echo e($prd->name); ?></span>
            <div class="accordion" style="margin-bottom:15px" id="parent_category-<?php echo e($prd->id); ?>">
                <div class="d-flex justify-content-between align-items-center category" data-toggle="collapse"
                    data-target="#item-category-<?php echo e($prd->id); ?>" aria-controls="item-category">
                    <span><img src="<?php echo e($file->ver_img(App\Models\Category::where('id', '=' , $prd->cat_id)->first()->icon)); ?>"
                            width="40px" alt="" class="pr-2"> <?php echo e($prd->cat_name); ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div id="item-category-<?php echo e($prd->id); ?>" class="collapse" style="padding: 5px;"
                    aria-labelledby="headingOne" data-parent="#parent_category-<?php echo e($prd->id); ?>">
                    <span class="d-block mb-0 pt-2">---- <?php echo e($prd->sub_1_cat_name); ?></span>
                    <?php if($prd->sub_2_cat_name != NULL): ?>
                    <span class="d-block mb-0 pt-2">-------- <?php echo e($prd->sub_2_cat_name); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <span class="price d-block"><i class="fas fa-tags pr-1"></i>Giá bán: <?php echo e(crf($prd->price)); ?></span>
            <span class="price__cost price d-block" style="color:#dd991b;"><i class="fas fa-tags pr-1"></i>Giá gốc: <?php echo e(crf($prd->historical_cost)); ?></span>
            <span class="prdcer d-block"><i class="fas fa-building pr-1"></i>Producer: <?php echo e(App\Models\Producer::where('id', '=' , $prd->producer_id)->first()->name); ?></span>
            <span class="model d-block"><i class="fab fa-unity pr-1"></i>Model: <?php echo e($prd->model); ?></span>
            <span class="usage d-block"><i class="fas fa-box-open pr-1"></i> <?php echo e(usage_stt($prd->usage_stt)); ?></span>
            <div class="row mx-0 mt-3">
                <div class="form-group col-6 p-0">
                    <select class="custom-select" name="" id="product__show--new" data-id="<?php echo e($prd->id); ?>">
                        <option value="<?php echo e($prd->new); ?>"><?php echo e(new_stt($prd->new)); ?></option>
                        <?php $__currentLoopData = Config::get('product.new'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($new1 != $prd->new): ?>
                        <option value="<?php echo e($new1); ?>"><?php echo e(new_stt($new1)); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-6 pr-0">
                    <select class="custom-select" name="" id="product__show--hl" data-id="<?php echo e($prd->id); ?>">
                        <option value="<?php echo e($prd->highlight); ?>"><?php echo e(highlight_stt($prd->highlight)); ?></option>
                        <?php $__currentLoopData = Config::get('product.highlight'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $highlight != $prd->highlight): ?>
                        <option value="<?php echo e($highlight); ?>"><?php echo e(highlight_stt( $highlight)); ?>

                        </option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group mt-2">
                <select class="custom-select" name="" id="product__show--stock" data-id="<?php echo e($prd->id); ?>">
                    <option value="<?php echo e($prd->stock); ?>"><?php echo e(stock_stt($prd->stock )); ?></option>
                    <?php $__currentLoopData = Config::get('product.stock'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $stock != $prd->stock ): ?>
                    <option value="<?php echo e($stock); ?>"><?php echo e(stock_stt( $stock )); ?>

                    </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="prd-date d-flex justify-content-between align-items-center mb-2 mt-2">
                <div class="date">
                    <i class="far fa-calendar pr-1"></i>
                    <span><?php echo e($prd->created_at -> toFormattedDateString()); ?></span>
                </div>
                <div class="author">
                    <span><?php echo e($prd->author); ?></span>
                </div>
            </div>
            <div class="action d-flex justify-content-center align-items-center mt-4">
                <div class="action-edit mx-2">
                    <a target="_blank" href="<?php echo e(route('product_view_edit', ['id'=>$prd->id])); ?>"
                        class="d-block btn navi_btn"><i class="fas fa-edit pr-1"></i>
                        Chỉnh Sửa</a>
                </div>
                <div class="action-delete">
                    <a data-url="<?php echo e(route('delete_product', ['id'=>$prd->id])); ?>" class="d-block btn navi_btn mx-3 remove__product"><i
                            class="fas fa-trash pr-1"></i>
                        Xoá</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/components/admin/product/item.blade.php ENDPATH**/ ?>