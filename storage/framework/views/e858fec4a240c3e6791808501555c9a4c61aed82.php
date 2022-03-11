<?php $__env->startSection('import_js'); ?>
<script src="<?php echo e($file->ver('client/app/js/home.js')); ?>"></script>
<script src="<?php echo e($file->ver('client/app/js/scrollReval.js')); ?>"></script>
<script src="https://unpkg.com/scrollreveal"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('margin'); ?> dtl__margin <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="breadCrumb">
    <div class="container">
        <ol class="b__crumb">
            <li class="b__crumb--item">
                <i class="fas fa-home"></i>
            </li>
            <li class="b__crumb--item">
                <i class="fas fa-long-arrow-alt-right"></i>
            </li>
            <li class="b__crumb--item">
               Tìm Kiếm
            </li>
        </ol>
    </div>
</div>
<input type="hidden" name="" value="<?php echo e(route('search_main_ajax')); ?>" id="search_main_ajax">
<div class="container">
<div class="row mx-0">
<div id="category" class="col-12 pr-0">
    <div id="category__header">
        <h1> Tìm Kiếm - <?php echo e($kw); ?> </h1>
    </div>
    <div id="category__filter" class="container w-100">
        <div class="d-flex align-items-center justify-content-between" id="category__filter--box">
            <div class="view d-flex align-items-center nav" role="tablist">
                <span id="gridProduct" class="nav-item item-view  <?php if($view == "grid"): ?> active <?php endif; ?>" data-type="grid" role="presentation" data-toggle="tab" href="#grid"
                    role="tab"  aria-selected="true" >
                    <i class="fas fa-th"  data-toggle="tooltip" data-placement="top" title="Grid"></i>
                </span>
                <span id="listProduct" class="nav-item item-view <?php if($view == "list"): ?> active <?php endif; ?>" data-type="list" role="presentation" data-toggle="tab" href="#list"
                    role="tab"  aria-selected="true"  >
                    <i class="fas fa-list" data-toggle="tooltip" data-placement="top" title="List"></i>
                </span>
            </div>
            <div class="sort d-flex align-items-center">
                <label for="">Sắp xếp theo</label>
                <select class="" name="sort" data-view="<?php echo e($view); ?>" id="sort__search--main" data-kw="<?php echo e($kw); ?>">
                    <option value="id" ord="DESC" <?php if($sort == 0 && $ord == ""): ?> selected <?php endif; ?>>Mặc định</option>
                    <option value="price" ord="ASC" <?php if($sort == "price" && $ord == "ASC"): ?> selected <?php endif; ?>>Giá thấp > cao</option>
                    <option value="price" ord="DESC" <?php if($sort == "price" && $ord == "DESC"): ?> selected <?php endif; ?>>Giá cao > thấp</option>
                    <option value="name" ord="ASC"  <?php if($sort == "name" && $ord == "ASC"): ?> selected <?php endif; ?>>Từ A-Z</option>
                    <option value="name" ord="DESC" <?php if($sort == "name" && $ord == "DESC"): ?> selected <?php endif; ?>>Từ Z-A</option>
                </select>
            </div>
        </div>
    </div>
    <div id="products" class="container">
<div class="tab-content">
    <div class="tab-pane <?php if($view == "grid"): ?> active <?php endif; ?>" id="grid"  role="tabpanel">
     <?php if(count($products) > 0 ): ?>
     <div class="row mx-0" id="outputGrid" >
         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-3 col-md-4 col-12 col-sm-6 item w-100">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.itemgrid','data' => ['type' => '2','class' => 'prdcat','message' => $prd]]); ?>
<?php $component->withName('product.itemgrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => '2','class' => 'prdcat','message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prd)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
             </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($number_page > 1 ): ?>
            <div class="products__page  page__search--main mt-4">
                <?php echo navi_ajax_page($number_page, $page, $size = "pagination-sm", "justify-content-start", $mt = "mt-4"); ?>

            </div>
        <?php endif; ?>
     <?php else: ?>
         <strong>Hiện chưa có sản phẩm nào thuộc  từ khoá <?php echo e($kw); ?></strong>
     <?php endif; ?>
    </div>
    <div class="tab-pane <?php if($view == "list"): ?> active <?php endif; ?>"  id="list" role="tabpanel">
        <?php if(count($products) > 0 ): ?>
     <div class="row mx-0 flex-column" id="outputList" >
         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="item w-100">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.listitem','data' => ['message' => $prd]]); ?>
<?php $component->withName('listitem'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prd)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
             </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($number_page > 1 ): ?>
            <div class="products__page  page__search--main mt-4">
                <?php echo navi_ajax_page($number_page, $page,  "pagination-sm", "justify-content-start",  "mt-4"); ?>

            </div>
        <?php endif; ?>
     <?php else: ?>
         <strong>Hiện chưa có sản phẩm nào cho từ khoá <?php echo e($kw); ?></strong>
     <?php endif; ?>
    </div>
</div>
    </div>
</div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/search.blade.php ENDPATH**/ ?>