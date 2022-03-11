<?php $__env->startSection('import_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('import_js'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>
<script src="<?php echo e(asset('admin/app/js/user.js')); ?>?ver=<?php echo filemtime('public/admin/app/js/user.js') ?>">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('name'); ?>
Chinh sách của shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('ok')): ?>
<script>
    toastr.success("Cập Nhật User Thành Công");
</script>
<?php endif; ?>
<?php if(session('not-ok')): ?>
<script>
    toastr.success("Cập Nhật User Thất Bại");
</script>
<?php endif; ?>
<input type="hidden" name="" id="ajax__avatar" value="<?php echo e(route('ajax__avatar')); ?>">
<input type="hidden" name="" id="ajax__avatar--delete" value="<?php echo e(route('ajax__avatar__delete')); ?>">
<input type="hidden" name="" id="ajax__avatar--loading" value="<?php echo e(url('public/client/images/fire.svg')); ?>">
<input type="hidden" name="" value="<?php echo e(route('change_address')); ?>" id="url__ajax--address">
<?php echo Form::open(['url' => route('save_setting_profile' , ['id' => $id]) , 'method' => "POST" ,'files' => true ]); ?>

<div id="plc" class="row mx-0">
    <div class="col-12 mt-4 p-0">
        <div class="w-100">
            <div class="card">
                <div class="card-header text-center">
                    Public info
                </div>
                <div class="card-body" id="setting_profile">
                    <div class="row mx-0">
                        <div class="col-8 pl-0">
                            <div class="form-group mb-5">
                                <label for="">Tên</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" id=""
                                    placeholder="">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                    <?php echo e($message); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Tiểu sử</label>
                                <textarea class="form-control" name="biography" id=""
                                    placeholder="Giới thiệu điều gì đó về bản thân bạn"
                                    rows="5"><?php echo e($profile->biography); ?></textarea>
                            </div>
                        </div>
                        <div class="col-4 ml-0 mr-0 edit__pro5--right d-flex justify-content-center align-items-center">
                            <div class="plborder d-flex flex-column align-items-center">
                                <?php if(Auth::user()->avatar != NULL): ?>
                                <img src="<?php echo e(asset(Auth::user()->avatar)); ?>" width="128" height="128"
                                    class=" rounded-circle " id="davishop__avatar--edit" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('client/images/user-large.png')); ?>" width="100" height="100"
                                    class=" rounded-circle " id="davishop__avatar--edit" alt="">
                                <?php endif; ?>
                                <input type="file" name="avatar" id="dvsAvatar" class="d-none">
                                <button id="target__file" class="btn">Chọn Ảnh</button>
                                <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e($message); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <span class="note d-block mt-3">Dụng lượng file tối đa 1 MB</span>
                                <span class="note d-block">Định dạng:.JPEG, .PNG, .JPG, .TIFF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mt-4 p-0">
            <div class="w-100">
                <div class="card">
                    <div class="card-header text-center">
                        Private info
                    </div>
                    <div class="card-body" id="setting_profile">
                        <div class="row mx-0">
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="name" disabled
                                        value="<?php echo e($user->email); ?>" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="<?php echo e($user->phone); ?>" id="" placeholder="">
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                            <?php echo e($message); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Địa Chỉ 1</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St" name="address_1"
                                        value="<?php echo e($profile->address_1); ?>" id="" placeholder="">
                                    <?php $__errorArgs = ['address_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        <?php echo e($message); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <label for="">Địa Chỉ 2</label>
                                    <input type="text" class="form-control" placeholder="Chung cư , studio......"
                                        name="address_2" value="<?php echo e($profile->address_2); ?>" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Tỉnh</label>
                                    <?php if($profile->city == NULL): ?>
                                    <select class="custom-select" name="city" id="prov">
                                        <option value="">Chọn Tỉnh</option>
                                        <?php $__currentLoopData = App\Models\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($prov->id); ?>"><?php echo e($prov->_name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="custom-select" name="city" id="prov">
                                        <option value="<?php echo e($profile->city); ?>"><?php echo e(App\Models\Province::where('id', '=' ,
                                            $profile->city)->first()->_name); ?></option>
                                        <?php $__currentLoopData = App\Models\Province::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($prov->id != $profile->city): ?>
                                        <option value="<?php echo e($prov->id); ?>"><?php echo e($prov->_name); ?>

                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php endif; ?>
                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        <?php echo e($message); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Quận/Huyện</label>
                                    <select class="custom-select" name="dist" id="dist">
                                        <?php if($profile->city == NULL): ?>
                                        <option value="">Chưa Chọn Tỉnh</option>
                                        <?php else: ?>
                                        <option value="<?php echo e($profile->d); ?>"><?php echo e(App\Models\District::where('id', '=' ,
                                            $profile->d)->first()->_name); ?></option>
                                        <?php $__currentLoopData = App\Models\District::where('_province_id', '=', $profile->city)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($dist->id != $profile->d): ?>
                                        <option value="<?php echo e($dist->id); ?>"><?php echo e($dist->_name); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['dist'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        <?php echo e($message); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Phường/Xã</label>
                                    <select class="custom-select" name="ward" id="ward">
                                            <?php if($profile->city == NULL): ?>
                                            <option value="">Chưa Quận/Huyện</option>
                                            <?php else: ?>
                                            <option value="<?php echo e($profile->w); ?>"><?php echo e(App\Models\Ward::where('id', '=' ,
                                                $profile->w)->first()->_name); ?></option>
                                            <?php $__currentLoopData = App\Models\Ward::where('_district_id', '=', $profile->d)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ward->id != $profile->w): ?>
                                            <option value="<?php echo e($ward->id); ?>"><?php echo e($ward->_name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                    <?php $__errorArgs = ['ward'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
                                        <?php echo e($message); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="<?php echo e($profile->facebook); ?>" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="<?php echo e($profile->instagram); ?>" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Zalo</label>
                                    <input type="text" class="form-control" name="zalo" value="<?php echo e($profile->zalo); ?>"
                                        id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="twitter"
                                        value="<?php echo e($profile->twitter); ?>" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">Github</label>
                                    <input type="text" class="form-control" name="github" value="<?php echo e($profile->github); ?>"
                                        id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="">LinkedIn</label>
                                    <input type="text" class="form-control" name="linkedIn"
                                        value="<?php echo e($profile->linkedIn); ?>" id="" placeholder="Có thể để trống">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group mb-5">
                                    <input type="submit" value="Lưu Thay Đổi" class="btn btn-primary">
                                </div>
                            </div>
                            
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/admin/users/setting-profile.blade.php ENDPATH**/ ?>