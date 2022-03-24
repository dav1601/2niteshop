<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Img</th>
            <th scope="col">Title</th>
            <th scope="col">Danh Mục 1</th>
            <th scope="col">Danh Mục 2</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Ngày Đăng</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($blog->id); ?></td>
          <td>
              <img src="<?php echo e($file->ver_img($blog->img)); ?>" width="100" alt="">
          </td>
          <td style="max-width: 300px;">
              <?php echo e($blog->title); ?>

          </td>
          <td style="max-width: 200px;">
              <?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name); ?>

          </td>
          <td style="max-width: 200px;">
              <?php if($blog -> cat_sub_id != NULL): ?>
              <?php echo e(App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name); ?>

                  <?php else: ?>
                  Không có
              <?php endif; ?>
          </td>
          <td>
                  <select class="custom-select update__active" name=""  data-id="<?php echo e($blog->id); ?>">
                      <option value="<?php echo e($blog->active); ?>"><?php echo e(config('navi.active_blog.'.$blog->active)); ?></option>
                      <?php $__currentLoopData = config('navi.active_blog'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $active): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($key != $blog->active): ?>
                          <option value="<?php echo e($key); ?>"><?php echo e($active); ?></option>
                           <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
          </td>
          <td>
              <?php echo e($daviUser->getUser($blog->users_id)->name); ?>

          </td>
          <td>
              <?php echo e($carbon -> parse($blog->created_at) -> diffForHumans()); ?>

          </td>
          <td>
            <a href="<?php echo e(route('edit_blog', ['id'=>$blog->id])); ?>">
                <i class="fas fa-eye"></i>
            </a>
          </td>
          <td>
            <a class="delete__blog" data-id="<?php echo e($blog->id); ?>">
                <i class="fas fa-trash"></i>
            </a>
          </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<div class="card-footer p-0" id="orders_show--page">
    <?php echo navi_ajax_page($number , $page , "pagination-sm","justify-content-center" , "mt-2"); ?>

</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\table\blog.blade.php ENDPATH**/ ?>