<div class="show__home--box box__<?php echo e($homeItem->id); ?>">
    <div class="box__banner">
        <div class="box__banner--main">
            <a href="<?php echo e(url($homeItem->main_link)); ?>" class="d-block px-2">
                <img src="<?php echo e($file->ver_img($homeItem->main_img)); ?>" alt="<?php echo e($homeItem->name); ?>" class="w-100">
            </a>
        </div>
        <div class="box__banner--sub swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if($homeItem->use_img != null): ?>
                    <div class="swiper-slide">
                        <a href="<?php echo e($homeItem->use_link); ?>" class="d-block pl-2">
                            <img src="<?php echo e($file->ver_img($homeItem->use_img)); ?>" alt="<?php echo e($homeItem->name); ?>"
                                class="w-100">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($homeItem->instruct_img != null): ?>
                    <div class="swiper-slide">
                        <a href="<?php echo e($homeItem->instruct_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($homeItem->instruct_img)); ?>" alt="<?php echo e($homeItem->name); ?>"
                                class="w-100">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($homeItem->access_img != null): ?>
                    <div class="swiper-slide">
                        <a href="<?php echo e($homeItem->access_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($homeItem->access_img)); ?>" alt="<?php echo e($homeItem->name); ?>"
                                class="w-100">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($homeItem->fix_img != null): ?>
                    <div class="swiper-slide">
                        <a href="<?php echo e($homeItem->fix_link); ?>" class="d-block">
                            <img src="<?php echo e($file->ver_img($homeItem->fix_img)); ?>" alt="<?php echo e($homeItem->name); ?>"
                                class="w-100">
                        </a>
                    </div>
                <?php endif; ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $id = 'section-' . $homeItem->id . $key;
    ?>
    <div class="box__cat pl-1">
        
        
        <div class="box__cat--item">
            
            <ul class="nav cat__tab" id="myTab__<?php echo e($id); ?>" role="tablist">
                
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.styletabs','data' => ['type' => 'cat','color' => $homeItem->color]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('styletabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'cat','color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($homeItem->color)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if(count($section) > 0): ?>
                    <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_1 => $item_1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id_tab = $id . '-tab-' . $item_1->category->id;
                            $id_nav = $id . '-nav-' . $item_1->category->id;
                        ?>
                        <?php if($item_1->category->is_game): ?>
                            <li class="nav-item" role="presentation">
                                <a class="active" data-toggle="tab" href="#tab__mh--game-hot-<?php echo e($id_tab); ?>"
                                    role="tab" aria-controls="game-hot" aria-selected="true"
                                    id="<?php echo e('game-new-' . $id_nav); ?>">
                                    game hot</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="" data-toggle="tab" href="#tab__mh--game-new-<?php echo e($id_tab); ?>"
                                    role="tab" aria-controls="game-hot" aria-selected="false"
                                    id="<?php echo e('game-new-' . $id_nav); ?>">
                                    game mới</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="" data-toggle="tab" href="#tab__mh--game-future-<?php echo e($id_tab); ?>"
                                    role="tab" aria-controls="game-future" aria-selected="false"
                                    id="<?php echo e('game-future-' . $id_nav); ?>">
                                    game sắp phát hành</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item" role="presentation">
                                <a class="<?php echo e($key_1 === 0 ? 'active' : ''); ?>" data-toggle="tab"
                                    href="#tab__mh--<?php echo e($id_tab); ?>" role="tab" id="<?php echo e($id_nav); ?>"
                                    aria-controls="<?php echo e('control-' . $id_tab); ?>"
                                    aria-selected="<?php echo e($key_1 === 0 ? 'true' : 'false'); ?>">
                                    <?php echo e($item_1->category->name); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
            
            
            <div class="tab-content" id="myTabContent__<?php echo e($id); ?>">
                <?php if(count($section) > 0): ?>
                    <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_2 => $item_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $id_pane = $id . '-tab-' . $item_2->category->id;
                            $id_pane_nav = $id . '-nav-' . $item_2->category->id;
                            $select = ['id', 'name', 'slug', 'price', 'main_img', 'sub_img', 'stock', 'highlight', 'usage_stt', 'created_at'];
                            $game_new = [];
                            $game_hot = [];
                            $game_future = [];
                            if ($item_2->category->is_game) {
                                $game_new = App\Models\ProductCategories::with(['product'])
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->take(16)
                                    ->get();
                                $game_hot = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('highlight', '=', 2);
                                    },
                                ])
                                    ->whereHas('product', function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('highlight', '=', 2);
                                    })
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->get();
                                $game_future = App\Models\ProductCategories::with([
                                    'product' => function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('stock', '=', 2);
                                    },
                                ])
                                    ->whereHas('product', function ($query) use ($select, $carbon) {
                                        $query->select($select)->where('stock', '=', 2);
                                    })
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->get();
                            } else {
                                $products = App\Models\ProductCategories::with([
                                    'product' => function ($q) use ($select) {
                                        $q->select($select);
                                    },
                                ])
                                    ->where('category_id', $item_2->category->id)
                                    ->orderBy('products_id', 'desc')
                                    ->take(16)
                                    ->get();
                            }

                        ?>

                        <?php if($item_2->category->is_game): ?>
                            <div class="tab-pane fade <?php echo e($key_2 === 0 ? 'show active' : ''); ?>"
                                id="tab__mh--game-hot-<?php echo e($id_pane); ?>" role="tabpanel">
                                <?php if (isset($component)) { $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8 = $component; } ?>
<?php $component = App\View\Components\Client\Products\Slides::resolve(['products' => $game_hot] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.products.slides'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Products\Slides::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8)): ?>
<?php $component = $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8; ?>
<?php unset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8); ?>
<?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="tab__mh--game-new-<?php echo e($id_pane); ?>" role="tabpanel">
                                <?php if (isset($component)) { $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8 = $component; } ?>
<?php $component = App\View\Components\Client\Products\Slides::resolve(['products' => $game_new] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.products.slides'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Products\Slides::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8)): ?>
<?php $component = $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8; ?>
<?php unset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8); ?>
<?php endif; ?>

                            </div>
                            <div class="tab-pane fade" id="tab__mh--game-future-<?php echo e($id_pane); ?>" role="tabpanel">
                                <?php if (isset($component)) { $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8 = $component; } ?>
<?php $component = App\View\Components\Client\Products\Slides::resolve(['products' => $game_future] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.products.slides'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Products\Slides::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8)): ?>
<?php $component = $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8; ?>
<?php unset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8); ?>
<?php endif; ?>

                            </div>
                        <?php else: ?>
                            <div class="tab-pane fade <?php echo e($key_2 === 0 ? 'show active' : ''); ?>"
                                id="tab__mh--<?php echo e($id_pane); ?>" role="tabpanel"
                                aria-labelledby="<?php echo e($id_pane_nav); ?>">
                                <?php if (isset($component)) { $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8 = $component; } ?>
<?php $component = App\View\Components\Client\Products\Slides::resolve(['products' => $products] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client.products.slides'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client\Products\Slides::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8)): ?>
<?php $component = $__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8; ?>
<?php unset($__componentOriginal739c78ece0728041169823da1e319841ea6bfbf8); ?>
<?php endif; ?>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/client/home/section.blade.php ENDPATH**/ ?>