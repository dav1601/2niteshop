<?php
    use Knuckles\Scribe\Tools\WritingUtils as u;
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
?>
```bash
curl --request <?php echo e($endpoint->httpMethods[0]); ?> \
    <?php echo e($endpoint->httpMethods[0] == 'GET' ? '--get ' : ''); ?>"<?php echo e(rtrim($baseUrl, '/')); ?>/<?php echo e(ltrim($endpoint->boundUri, '/')); ?><?php if(count($endpoint->cleanQueryParameters)): ?>?<?php echo u::printQueryParamsAsString($endpoint->cleanQueryParameters); ?><?php endif; ?>"<?php if(count($endpoint->headers)): ?> \
<?php $__currentLoopData = $endpoint->headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    --header "<?php echo e($header); ?>: <?php echo e(addslashes($value)); ?>"<?php if(! ($loop->last) || ($loop->last && count($endpoint->bodyParameters))): ?> \
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($endpoint->hasFiles()): ?>
<?php $__currentLoopData = $endpoint->cleanBodyParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $actualValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    --form "<?php echo "$key=".$actualValue; ?>" \
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $endpoint->fileParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    --form "<?php echo "$key=@".$file->path(); ?>" <?php if(!($loop->parent->last)): ?>\
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif(count($endpoint->cleanBodyParameters)): ?>
<?php if($endpoint->headers['Content-Type'] == 'application/x-www-form-urlencoded'): ?>
    --data "<?php echo http_build_query($endpoint->cleanBodyParameters, '', '&'); ?>"
<?php else: ?>
    --data "<?php echo addslashes(json_encode($endpoint->cleanBodyParameters, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)); ?>"
<?php endif; ?>
<?php endif; ?>

```
<?php /**PATH E:\xampp\htdocs\nava\resources\views\vendor\scribe\partials\example-requests\bash.md.blade.php ENDPATH**/ ?>