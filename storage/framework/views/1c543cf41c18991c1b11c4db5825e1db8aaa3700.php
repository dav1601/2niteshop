<?php $__env->startSection('import_css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js"
    integrity="sha512-X22wrzog4NcL9NM97PKUVhWH4K6MSp9f6iIYHtXkKVwEXZ8GqkWOkLWdBeStyPuuKRkNzkkGVr5v++qMoYM5Fg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e($file->ver('admin/app/js/dashboard.js')); ?>">
</script>
<script src="<?php echo e($file->ver('admin/app/plugin/chart/canvasjs.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/app/js/chart.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/chart.js') ?>">
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('name'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<input type="hidden" name="" id="url__ajax--task" value="<?php echo e(route('todos')); ?>">
<input type="hidden" name="" id="url__ajax--calender" value="<?php echo e(route('fullcalender_ajax')); ?>">
<input type="hidden" name="" id="url__calender" value="<?php echo e(route('fullcalender')); ?>">
<input type="hidden" name="" id="url__chart" value="<?php echo e(route('load__chart')); ?>">
<div id="content__dashboard">
    <div class="row mx-0">
        <div class="stat col-12 p-0 row mx-0">
            <div class="col-3 stat__item --users">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Users
                            </span>
                            <i class="fas fa-users card__top--icon"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf_2($stats_users)); ?> Users</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --orders">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Số Đơn Hàng
                            </span>
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf_2($stats_order)); ?> Đơn</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --month">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Doanh Thu Hôm Nay
                            </span>
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf($stats_revenueToday)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --year">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Doanh Thu Tháng Này
                            </span>
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf($stats_revenueMonth)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --profitToday pl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3 ">
                            <span class="card__top--text">
                                Lợi Nhuận Hôm Nay
                            </span>
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf($stats_proFToday)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --profitMonth ">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Lợi Nhuận Tháng Này
                            </span>
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf($stats_proFMonth)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --visits ">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3 pl-0">
                            <span class="card__top--text">
                                Số Lượt Truy Cập
                            </span>
                            <i class="fas fa-walking"></i>
                        </div>
                        <div class="card__bot">
                            <span>10,000 Lượt Truy Cập</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --products">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Số Lượng Sản Phẩm
                            </span>
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf_2($stats_product)); ?> Sản Phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --blogs pl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Số Bài Viết
                            </span>
                            <i class="fas fa-blog"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf_2($stats_blog)); ?> Bài Viết</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 stat__item --comments">
                <div class="card">
                    <div class="card-body">
                        <div class="card__top d-flex justify-content-between align-items-center mb-3">
                            <span class="card__top--text">
                                Số Bình Luận
                            </span>
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="card__bot">
                            <span><?php echo e(crf_2($stats_comment)); ?> Bình Luận</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="chart" class="my-4 col-12 p-0">
            <div class="w-100">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
        
        <div class="col-6 mt-4 p-0">
            <div class="w-100">
                <div class="card --main">
                    <div class="card-header text-center">
                        <h2>Thành Viên Mới</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mx-0 card__users">
                            <?php $__currentLoopData = App\Models\User::where('role_id' , '>' , 3)->where('id' , '!=' ,
                            Auth::id())->orderBy('id' , 'DESC') ->limit(8) -> get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card__users--item text-center col-3 mb-3">
                                <img src="<?php echo e($daviUser->getAvatarUser($user->id)); ?>" width="112" height="112"
                                    class="va-rounded" alt="">
                                <a><?php echo e($user->name); ?></a>
                                <span>
                                    <?php if($carbon->create($user->created_at) -> isToday()): ?>
                                    Hôm Nay
                                    <?php elseif($carbon->create($user->created_at) -> isYesterday()): ?>
                                    Hôm Qua
                                    <?php else: ?>
                                    <?php echo e($carbon->create($user->created_at) -> day); ?> <?php echo e($carbon->create($user->created_at) ->format('M')); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="see-all">Xem tất cả thành viên</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 mt-4 ">
            <div class="w-100">
                <div class="card --main">
                    <div class="card-header text-center">
                        <h2>Bài Viết Mới Đăng</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tiêu Đề</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($blog->id); ?></th>
                                    <td><?php echo e($blog->title); ?></td>
                                    <td><?php echo e($blog->author); ?></td>
                                    <td><?php echo e($carbon->create($blog->created_at)->diffForHumans($carbon->now())); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="see-all">Xem tất cả bài viết</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mt-4 ">
            <div class="w-100">
                <div class="card --main">
                    <div class="card-header text-center">
                        <h2>Sản Phẩm Mới Đăng</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
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
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($product->id); ?></th>
                                    <td><?php echo e($product->name); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($product->main_img)); ?>" width="150px" height="150px"
                                            class="va-radius-fb" alt="">
                                    </td>
                                    <td><?php echo e(crf($product->price)); ?></td>
                                    <td>
                                        <?php echo e(App\Models\Producer::where('id' ,'=' , $product->producer_id)->first()->name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($product->cat_name); ?>

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
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="see-all">Xem tất cả sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Danh sách công việc (Tự Động Cập Nhật 1 phút / 1 lần)</h2>
                        <div class="task-pages">
                            <?php echo navi_ajax_page($number_page , $page , 'pagination-sm' , 'justify-content-end' , 'mt-2'); ?>

                        </div>
                    </div>
                    <div class="card-body task">
                        <?php if($tasks -> count() > 0): ?>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="task__item task-<?php echo e($task -> id); ?> <?php if($task -> done == 1): ?> task__item--done <?php endif; ?> <?php if($task -> done == 0 && $task->time_end <= $now ): ?> task__item--done <?php endif; ?> ">
                            <div class="va-checkbox">
                                <input type="checkbox" name="" id="tk-<?php echo e($task -> id); ?>" class="task__item--check"
                                    data-id="<?php echo e($task -> id); ?>" <?php if($task -> done == 1): ?> checked <?php endif; ?>>
                                <label for="tk-<?php echo e($task -> id); ?>"><?php echo e($task -> name); ?> <?php if($task
                                    -> done == 1): ?>
                                    <span class="badge badge-success">Hoàn Thành</span>
                                    <?php else: ?>
                                    <?php if($task->time_end > $now): ?>
                                    <span class="badge badge-warning">Còn <?php echo e(timeDiff($now , $task->time_end )); ?></span>
                                    <?php else: ?>
                                    <span class="badge badge-danger">Chưa Hoàn Thành</span>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php else: ?>
                        <span>Chưa Có Công Việc Nào!</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="" class="see-all btn__add--task" data-toggle="modal" data-target="#add__task"><i
                                    class="fas fa-plus pr-2"></i>Thêm Task</a>
                            <a href="" class="ml-4 see-all btn_reload--task"><i class="fas fa-sync-alt pr-2"></i>Làm
                                Mới</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 mt-4 pr-0">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add__taskLabel">Thêm Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="" class="mb-3">Nội Dung Công Việc</label>
                    <input type="text" class="form-control" name="" id="task__add--name" placeholder="">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="mb-3">Thời Gian</label>
                    <input type="text" class="form-control" name="" id="task__add--time" placeholder="">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="mb-3">Định Dạng</label>
                    <label for=""></label>
                    <select class="custom-select" name="" id="task__add--unit">
                        <option value="min">Phút</option>
                        <option value="h">Giờ</option>
                        <option value="month">Tháng</option>
                    </select>
                </div>
                <div class="form-group">
                    <button id="task__add--btn" class="btn w-100 text-center">Thêm Task</button>
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