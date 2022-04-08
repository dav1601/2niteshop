<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Avatar</th>
            <th scope="col">Provider</th>
            <th scope="col">Provider ID</th>
            <th scope="col">Role</th>
            <th scope="col">Ngày Gia Nhập</th>
            <th scope="col">Edit</th>
            <th scope="col">Profile</th>
            <th scope="col">Ban</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user-> id); ?></td>
            <td><?php echo e($user -> name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->phone); ?></td>
            <td>
                <img src="<?php echo e($daviUser->getAvatarUser($user->id)); ?>" width="80" alt="" style="border-radius: 5px;">
            </td>
            <td>
                <?php if($user->provider != NULL): ?>
                <?php echo e($user->provider); ?>

                <?php else: ?>
                Trống
                <?php endif; ?>
            </td>
            <td>
                <?php if($user->provider_id != NULL): ?>
                <?php echo e($user->provider_id); ?>

                <?php else: ?>
                Trống
                <?php endif; ?>

            </td>
            <td>
                <?php echo e(App\Models\Role::where('id' , '=' , $user->role_id) -> first()->name); ?>

            </td>
            <td>
                <?php echo e($carbon -> create($user->created_at) ->diffForHumans($carbon->now())); ?>

            </td>
            <td>
                <a href="<?php echo e(route('edit_user', ['id'=>$user->id])); ?>">
                    <i class="fa-solid fa-user-pen"></i>
                </a>
            </td>
            <td class="d-flex justify-content-center align-items-center">
                <?php if($user->role_id <= 3 ): ?> <a href="<?php echo e(route('admin_profile', ['id'=>$user->id])); ?>" class="d-block">
                    <i class="fa-solid fa-id-card-clip"></i>
                    </a>
                    <?php else: ?>
                    User
                    <?php endif; ?>
            </td>
            <td>
                <?php if($user->ban == 1): ?>
                <a href="<?php echo e(route('handle_delete_user' ,['id'=> $user->id , 'action' => " unban"])); ?>"
                    class="unban__user" data-id="<?php echo e($user->id); ?>">
                    <i class="fa-solid fa-user-slash"></i>
                </a>
                <?php else: ?>
                <a href="<?php echo e(route('handle_delete_user' ,['id'=> $user->id , 'action' => " ban"])); ?>" class="ban__user"
                    data-id="<?php echo e($user->id); ?>">
                    <i class="fa-solid fa-ban"></i>
                </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="card-footer p-0" id="orders_show--page">
    <?php if($number > 1): ?>
    <?php echo navi_ajax_page($number , $page , "","justify-content-center" , "mt-2"); ?>

    <?php endif; ?>
</div>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\components\admin\users\table\showusers.blade.php ENDPATH**/ ?>