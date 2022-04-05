<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Yêu Cầu Truy Cập Api Docs')); ?></div>

                <div class="card-body">
                    <?php echo Form::open(['url' => route('handle_identity_confirmation') , 'method' => "POST" ]); ?>

                    <div class="form-group row">
                        <label for="api_token" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Api Token')); ?></label>

                        <div class="col-md-6">
                            <input id="api_token" type="password" class="form-control"
                                value="<?php echo e($token !='' ? $token:''); ?>" name="api_token" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="security_code" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Security Code')); ?></label>

                        <div class="col-md-6">
                            <input id="security_code" type="password" value="<?php echo e($secode !='' ? $secode:''); ?>"
                                class="form-control" name="seocode" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Yêu Cầu Truy Cập Docs Api')); ?>

                            </button>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\nava\resources\views/admin/api/confirmation.blade.php ENDPATH**/ ?>