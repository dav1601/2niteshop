<?php echo view('cloudinary::js'); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta property="fb:admins" content="100007446334009" />
<meta property="fb:app_id" content="349901006628885" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="shortcut icon" href="<?php echo e($file->ver_img(getVal('favicon')->value)); ?>" type="image/x-icon">
<title>
    <?php if(isset($title)): ?>
        <?php echo e($title); ?>

    <?php else: ?>
        <?php echo $__env->yieldContent('title', getVal('title')->value); ?>
    <?php endif; ?>
</title>
<link rel="canonical" href="<?php echo e(URL::current()); ?>">
<meta name='description' itemprop='description' content='<?php echo $__env->yieldContent('meta-desc', getVal('desc')->value); ?>' />
<meta name='keywords' content='<?php echo $__env->yieldContent('meta-keyword', getVal('keywords')->value); ?>' />
<meta name="news_keywords" content="<?php echo $__env->yieldContent('news_keywords', getVal('news_keywords')->value); ?>">
<meta property="og:description" content="<?php echo $__env->yieldContent('og-desc', getVal('desc')->value); ?>" />
<meta property="og:title" content="<?php echo $__env->yieldContent('og-title', getVal('title')->value); ?>" />
<meta property="og:image" content="<?php echo $__env->yieldContent('og-image', getVal('banner_cover')->value); ?>" />
<meta property="og:site_name" content="<?php echo $__env->yieldContent('site_name', getVal('title')->value); ?>" />
<meta property="og:type" content="<?php echo $__env->yieldContent('og-type', 'website'); ?>" />
<meta property="og:url" content="<?php echo e(Url::current()); ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter-title', getVal('title')->value); ?>" />
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/layouts/meta.blade.php ENDPATH**/ ?>