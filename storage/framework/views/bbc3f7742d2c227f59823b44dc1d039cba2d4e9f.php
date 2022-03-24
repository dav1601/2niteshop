<a href="#" id="nav-button">
    <span>
        MENU
        <img src="<?php echo $assetPathPrefix; ?>images/navbar.png" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    <?php if($metadata['logo'] != false): ?>
        <img src="<?php echo e($metadata['logo']); ?>" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
    <?php endif; ?>

    <?php if(isset($metadata['example_languages'])): ?>
        <div class="lang-selector">
            <?php $__currentLoopData = $metadata['example_languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (is_numeric($name)) $name = $lang; ?>
                <button type="button" class="lang-button" data-language-name="<?php echo e($lang); ?>"><?php echo e($name); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
        <?php
            $previousH1 = null;
            $inSubHeading = false;
            $headingsCount = 0;
        ?>
        <?php $__currentLoopData = $headingsBeforeEndpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($heading['level'] === 1): ?>
                <?php if($previousH1): ?>
                    </ul>
                <?php endif; ?>
                <?php if($inSubHeading): ?>
                    <?php ($inSubHeading = false); ?>
                    </ul>
                <?php endif; ?>
                <ul id="tocify-header-<?php echo e($headingsCount); ?>" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="<?php echo $heading['slug']; ?>">
                        <a href="#<?php echo $heading['slug']; ?>"><?php echo $heading['text']; ?></a>
                    </li>
                <?php ($previousH1 = $heading); ?>
                <?php ($headingsCount += 1); ?>
            <?php elseif($heading['level'] === 2 && $previousH1): ?>
                <?php if(!$inSubHeading): ?>
                    <ul id="tocify-subheader-<?php echo $previousH1['slug']; ?>" class="tocify-subheader">
                    <?php ($inSubHeading = true); ?>
                <?php endif; ?>
                    <li class="tocify-item level-2"
                        data-unique="<?php echo $previousH1['slug']; ?>-<?php echo $heading['slug']; ?>">
                        <a href="#<?php echo $heading['slug']; ?>"><?php echo e($heading['text']); ?></a>
                    </li>
            <?php endif; ?>

            <?php if($loop->last): ?>
                    <?php if($inSubHeading): ?>
                    </ul>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $groupedEndpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul id="tocify-header-<?php echo e($loop->index + $headingsCount); ?>" class="tocify-header">
                <li class="tocify-item level-1" data-unique="<?php echo Str::slug($group['name']); ?>">
                    <a href="#<?php echo Str::slug($group['name']); ?>"><?php echo $group['name']; ?></a>
                </li>
                <?php if(count($group['endpoints']) > 0): ?>
                    <ul id="tocify-subheader-<?php echo Str::slug($group['name']); ?>" class="tocify-subheader">
                <?php endif; ?>
                <?php $__currentLoopData = $group['endpoints']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="tocify-item level-2" data-unique="<?php echo Str::slug($group['name']); ?>-<?php echo $endpoint->endpointId(); ?>">
                        <a href="#<?php echo Str::slug($group['name']); ?>-<?php echo $endpoint->endpointId(); ?>"><?php echo e($endpoint->metadata->title ?: ($endpoint->httpMethods[0]." ".$endpoint->uri)); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($group['endpoints']) > 0): ?>
                    </ul>
                <?php endif; ?>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php ($previousH1 = null); ?>
        <?php ($inSubHeading = false); ?>
        <?php ($headingsCount += count($groupedEndpoints)); ?>

        <?php $__currentLoopData = $headingsAfterEndpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($heading['level'] === 1): ?>
                <?php if($previousH1): ?>
                    </ul>
                <?php endif; ?>
                <?php if($inSubHeading): ?>
                    <?php ($inSubHeading = false); ?>
                    </ul>
                <?php endif; ?>
                <ul id="tocify-header-<?php echo e($headingsCount); ?>" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="<?php echo $heading['slug']; ?>">
                        <a href="#<?php echo $heading['slug']; ?>"><?php echo $heading['text']; ?></a>
                    </li>
                <?php ($previousH1 = $heading); ?>
                <?php ($headingsCount += 1); ?>
            <?php elseif($heading['level'] === 2 && $previousH1): ?>
                <?php if(!$inSubHeading): ?>
                    <ul id="tocify-subheader-<?php echo $previousH1['slug']; ?>" class="tocify-subheader">
                    <?php ($inSubHeading = true); ?>
                <?php endif; ?>
                    <li class="tocify-item level-2"
                        data-unique="<?php echo $previousH1['slug']; ?>-<?php echo $heading['slug']; ?>">
                        <a href="#<?php echo $heading['slug']; ?>"><?php echo e($heading['text']); ?></a>
                    </li>
            <?php endif; ?>

            <?php if($loop->last): ?>
                    <?php if($inSubHeading): ?>
                    </ul>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if(isset($metadata['links'])): ?>
        <ul class="toc-footer" id="toc-footer">
            <?php $__currentLoopData = $metadata['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo $link; ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <ul class="toc-footer" id="last-updated">
        <li>Last updated: <?php echo e($metadata['last_updated']); ?></li>
    </ul>
</div>
<?php /**PATH E:\xampp\htdocs\nava\vendor\knuckleswtf\scribe\resources\views\themes\default\sidebar.blade.php ENDPATH**/ ?>