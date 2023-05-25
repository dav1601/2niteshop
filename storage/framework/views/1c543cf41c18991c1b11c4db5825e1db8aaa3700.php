<?php $__env->startSection('import_css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"
        integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js"
        integrity="sha512-X22wrzog4NcL9NM97PKUVhWH4K6MSp9f6iIYHtXkKVwEXZ8GqkWOkLWdBeStyPuuKRkNzkkGVr5v++qMoYM5Fg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e($file->ver('admin/app/plugin/chart/canvasjs.min.js')); ?>"></script>
    <script src="<?php echo e($file->ver('admin/app/js/chart.js')); ?>"></script>
    <script>
        var todos = <?php echo e(Js::from($tasks->data)); ?>;
    </script>
    <script src="<?php echo e($file->ver('admin/app/js/dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="content__dashboard">
        <div class="row mx-0">
            <div class="stat col-12 row no-gutters">
                <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Users','icon' => 'fa-users','content' => crf_2($stats_users) . ' Users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Đơn Hàng','icon' => 'fa-receipt','content' => crf_2($stats_order) . ' Đơn'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Số Lượng Sản Phẩm','icon' => 'fa-boxes','content' => crf_2($stats_product) . ' sản phẩm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Số Lượng Bài Viết','icon' => 'fa-boxes','content' => crf_2($stats_blog) . ' bài'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Statistics')): ?>
                    <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Doanh Thu Hôm Nay','icon' => 'fa-dollar-sign','content' => crf($stats_revenueToday)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Doanh Thu Tháng Này','icon' => 'fa-dollar-sign','content' => crf($stats_revenueMonth)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal494285335507efb18edbdb424368be99577927d6 = $component; } ?>
<?php $component = App\View\Components\Admin\Dashboard\Card\Statics::resolve(['header' => 'Lợi Nhuận Hôm Nay','icon' => 'fa-dollar-sign','content' => crf($stats_proFToday)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.dashboard.card.statics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Dashboard\Card\Statics::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal494285335507efb18edbdb424368be99577927d6)): ?>
<?php $component = $__componentOriginal494285335507efb18edbdb424368be99577927d6; ?>
<?php unset($__componentOriginal494285335507efb18edbdb424368be99577927d6); ?>
<?php endif; ?>
                <?php endif; ?>

            </div>
            
            <div id="chart" class="col-12 my-4">
                <div class="w-100">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            

            <div class="col-12 mt-4">
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
                     <?php $__env->slot('heading', null, ['class' => 'text-center']); ?> 
                        <h2>Sản phẩm mới</h2>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Tên</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Nhà sản xuất</th>
                                    <th scope="col">Danh Mục</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($product->name); ?></td>
                                        <td>
                                            <img src="<?php echo e($file->ver_img($product->main_img)); ?>" width="150px"
                                                height="150px" class="va-radius-fb" alt="">
                                        </td>
                                        <td><?php echo e(crf($product->price)); ?></td>
                                        <td>
                                            <?php echo e($product->producer->name); ?>

                                        </td>
                                        <td style="width:300px;">
                                            <?php echo badges(collect($product->categories)->toArray(), 'name'); ?>

                                        </td>
                                        <td>
                                            <?php echo e($product->author); ?>

                                        </td>
                                        <td>
                                            <?php echo e($carbon->create($product->created_at)->diffForHumans($carbon->now())); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('footer', null, ['class' => 'text-center']); ?> 
                        <a href="#" class="btn btn-primary">Xem tất cả sản phẩm</a>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
            </div>

            
            <div class="col-6 mt-4">

                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'dsh-users']); ?>
                     <?php $__env->slot('heading', null, ['class' => 'text-center']); ?> 
                        <h2>Thành Viên Mới</h2>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 
                        <div class="row card__users mx-0">
                            <?php $__currentLoopData = $users->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card__users--item col-3 mb-3 text-center">
                                    <img src="<?php echo e($daviUser->getAvatarUser($user->id)); ?>" width="112" height="112"
                                        class="va-rounded" alt="">
                                    <a><?php echo e($user->name); ?></a>
                                    <span>
                                        <?php if($carbon->create($user->created_at)->isToday()): ?>
                                            Hôm Nay
                                        <?php elseif($carbon->create($user->created_at)->isYesterday()): ?>
                                            Hôm Qua
                                        <?php else: ?>
                                            <?php echo e($carbon->create($user->created_at)->day); ?>

                                            <?php echo e($carbon->create($user->created_at)->format('M')); ?>

                                        <?php endif; ?>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('footer', null, ['class' => 'text-center']); ?> 
                        <a href="#" class="btn btn-primary">Xem tất cả thành viên</a>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
            </div>
            
            <div class="col-6 mt-4">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Danh sách công việc</h2>

                        </div>
                        <div class="card-body" id="my_tasks">

                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add__task"><i
                                        class="fas fa-plus pr-2"></i>Thêm Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 mt-4">
                <?php if (isset($component)) { $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2 = $component; } ?>
<?php $component = App\View\Components\Admin\Layout\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.layout.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\Layout\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'dsh-blogs']); ?>
                     <?php $__env->slot('heading', null, ['class' => 'text-center']); ?> 
                        <h2>Bài viết mới</h2>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Tiêu Đề</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($blog->title); ?></td>
                                        <td><?php echo e($blog->author); ?></td>
                                        <td><?php echo e($carbon->create($blog->created_at)->diffForHumans($carbon->now())); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('footer', null, ['class' => 'text-center']); ?> 
                        <a href="#" class="btn btn-primary">Xem tất cả bài viết</a>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2)): ?>
<?php $component = $__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2; ?>
<?php unset($__componentOriginala9d28b94f5c7a99ddb7dde582e11a907cec58dc2); ?>
<?php endif; ?>
            </div>
            

            

            
            <div class="col-6 mt-4">
                <div class="w-100">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2>Lịch Làm Việc</h2>
                        </div>
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add__task" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="add__taskLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add__taskLabel">Thêm Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="task-content" class="mb-3">Nội Dung Công Việc</label>
                        <input type="text" value="" class="form-control" name="" id="task-content"
                            placeholder="Làm page builder">
                    </div>
                    <div class="form-group mb-4">
                        <label for="task-datetime" class="mb-3">Date Time Complete Task</label>
                        <input type="text" value="" class="form-control" name="" id="task-datetime"
                            placeholder="2023/05/14 11:11">
                    </div>

                    <div class="form-group">
                        <button id="add-task" class="btn btn-primary w-100 text-center">Thêm Task</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>