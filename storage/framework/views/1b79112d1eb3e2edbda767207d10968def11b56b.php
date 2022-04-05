<?php
    use Knuckles\Scribe\Tools\WritingUtils as u;
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
?>
```javascript
const url = new URL(
    "<?php echo e(rtrim($baseUrl, '/')); ?>/<?php echo e(ltrim($endpoint->boundUri, '/')); ?>"
);
<?php if(count($endpoint->cleanQueryParameters)): ?>

const params = <?php echo u::printQueryParamsAsKeyValue($endpoint->cleanQueryParameters, "\"", ":", 4, "{}"); ?>;
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));
<?php endif; ?>

<?php if(!empty($endpoint->headers)): ?>
const headers = {
<?php $__currentLoopData = $endpoint->headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    "<?php echo e($header); ?>": "<?php echo e($value); ?>",
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(empty($endpoint->headers['Accept'])): ?>
    "Accept": "application/json",
<?php endif; ?>
};
<?php endif; ?>

<?php if($endpoint->hasFiles()): ?>
const body = new FormData();
<?php $__currentLoopData = $endpoint->cleanBodyParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $actualValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
body.append('<?php echo $key; ?>', '<?php echo $actualValue; ?>');
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $endpoint->fileParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
body.append('<?php echo $key; ?>', document.querySelector('input[name="<?php echo $key; ?>"]').files[0]);
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif(count($endpoint->cleanBodyParameters)): ?>
<?php if($endpoint->headers['Content-Type'] == 'application/x-www-form-urlencoded'): ?>
let body = "<?php echo http_build_query($endpoint->cleanBodyParameters, '', '&'); ?>";
<?php else: ?>
let body = <?php echo json_encode($endpoint->cleanBodyParameters, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?>;
<?php endif; ?>
<?php endif; ?>

fetch(url, {
    method: "<?php echo e($endpoint->httpMethods[0]); ?>",
<?php if(count($endpoint->headers)): ?>
    headers,
<?php endif; ?>
<?php if($endpoint->hasFiles()): ?>
    body,
<?php elseif(count($endpoint->cleanBodyParameters)): ?>
<?php if($endpoint->headers['Content-Type'] == 'application/x-www-form-urlencoded'): ?>
    body: body,
<?php else: ?>
    body: JSON.stringify(body),
<?php endif; ?>
<?php endif; ?>
}).then(response => response.json());
```
<?php /**PATH E:\xampp\htdocs\nava\resources\views/vendor/scribe/partials/example-requests/javascript.md.blade.php ENDPATH**/ ?>