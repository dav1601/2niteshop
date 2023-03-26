<div style="min-width:600px">
    <input type="hidden" name="" id="edit-package-type" value="<?php echo e($type); ?>">
    <input type="hidden" name="" id="edit-package-id" value="<?php echo e($package['id']); ?>">
    <?php switch($type):
        case ('image'): ?>
            <div class="form-group">
                <label for="pack-edit-image-href">Href</label>
                <input type="text" class="form-control" name="" id="pack-edit-href" placeholder="">
            </div>
            <div class="form-group">
                <div class="custom-file pack-edit-image cursor-pointer">
                    <input type="text" class="custom-file-input" value="" id="package-edit-image">
                    <label class="custom-file-label" for="package-edit-image">Choose file</label>
                </div>

            </div>
            <div class="form-group preview-package-edit-image">
                test
            </div>
        <?php break; ?>

        <?php case ('video'): ?>
            <div class="form-group">
                <label for="pack-edit-video-source">Source</label>
                <input type="text" class="form-control" name="" value="<?php echo e($package['payload']['content']); ?>"
                    id="pack-edit-video-source" placeholder="">
            </div>
        <?php break; ?>

        <?php case ('text-editor'): ?>
            <div class="form-group">
                <label for="pack-edit-tiny">Editor</label>
                <textarea name="content" id="pack-edit-tiny" class="form-control my-editor"> <?php echo $package['payload']['content']; ?> </textarea>
            </div>
        <?php break; ?>

        <?php default: ?>
    <?php endswitch; ?>
    <div class="form-group">
        <label for="edit-section-class">Classes</label>
        <input type="text" data-role="tagsinput" class="form-control" value="<?php echo e($package['payload']['class']); ?>"
            id="edit-package-class">
        <small id="classesHelp" class="form-text text-muted">Nhập class và nhấn <strong>TAB</strong> hoặc
            <strong>Enter</strong></small>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/admin/pagebuilder/edit/package.blade.php ENDPATH**/ ?>