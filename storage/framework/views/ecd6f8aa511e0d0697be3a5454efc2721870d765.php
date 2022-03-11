<?php $__env->startSection('import_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="nite__contact" class="nite__contact">
    <div id="breadCrumb">
        <div class="container">
            <ol class="b__crumb mb-0">
                <li class="b__crumb--item">
                    <i class="fas fa-home"></i>
                </li>
                <li class="b__crumb--item">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </li>
                <li class="b__crumb--item">
                    <h1>Liên hệ</h1>
                </li>
            </ol>
        </div>
    </div>
    <div class="map">
        <?php echo getVal('map')->value; ?>

    </div>
    <div id="nite__contact--content" class="container">
        <div class="info__contribute row mx-0">
            <div class="col-12 col-md-5 mb-3 mb-md-0 pl-md-0 info">
                <div class="module-wrapper">
                    <div class="module__item d-flex align-items-center">
                        <span class="module__item--icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <div class="module__item--content">
                            <div class="title">Địa chỉ</div>
                            <div class="text">
                                <?php echo getVal('address')->value; ?>

                            </div>
                        </div>
                    </div>
                    
                    <div class="module__item d-flex align-items-center">
                        <span class="module__item--icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </span>
                        <div class="module__item--content">
                            <div class="title">Liên hệ</div>
                            <div class="text">
                                <p>Hotline: <?php echo getVal('hotline')->value; ?></p>
                                <p>Tổng đài: <?php echo getVal('switchboard')->value; ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module__item d-flex align-items-center">
                        <span class="module__item--icon">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        <div class="module__item--content">
                            <div class="title">THỜI GIAN LÀM VIỆC</div>
                            <div class="text">
                                <?php echo getVal('working_time')->value; ?>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-7 pr-md-0 contribute">
                <h1 class="mb-4" style="font-size: 22px;font-weight: 700;">ĐÓNG GÓP Ý KIẾN CHO CHÚNG TÔI!</h1>
                 <div class="form-row form-group align-items-center">
                     <div class="col-3">
                         <label for="name">Họ tên<strong class="text-danger">*</strong></label>
                     </div>
                     <div class="col-9">
                         <input type="text" name="name" placeholder="Họ Tên" id="name" class="form-control">
                     </div>
                 </div>
                 <div class="form-row form-group align-items-center">
                    <div class="col-3">
                        <label for="name">Email<strong class="text-danger">*</strong></label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="email" placeholder="Email của bạn" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-row form-group align-items-center">
                    <div class="col-3">
                        <label for="content">Lời nhắn<strong class="text-danger">*</strong></label>
                    </div>
                    <div class="col-9">
                        <textarea name="content" id="content"  rows="3" class="form-control" placeholder="Lời nhắn"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="ĐÓNG GÓP" class="davi_btn w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217861923/domains/vachill.com/public_html/resources/views/contact.blade.php ENDPATH**/ ?>