<?php
    use Knuckles\Scribe\Tools\WritingUtils as u;
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
?>
```php
$client = new \GuzzleHttp\Client();
<?php if($endpoint->hasHeadersOrQueryOrBodyParams()): ?>
$response = $client-><?php echo e(strtolower($endpoint->httpMethods[0])); ?>(
    '<?php echo e(rtrim($baseUrl, '/') . '/' . ltrim($endpoint->boundUri, '/')); ?>',
    [
<?php if(!empty($endpoint->headers)): ?>
        'headers' => <?php echo u::printPhpValue($endpoint->headers, 8); ?>,
<?php endif; ?>
<?php if(!empty($endpoint->cleanQueryParameters)): ?>
        'query' => <?php echo u::printQueryParamsAsKeyValue($endpoint->cleanQueryParameters, "'", "=>", 12, "[]", 8); ?>,
<?php endif; ?>
<?php if($endpoint->hasFiles()): ?>
        'multipart' => [
<?php $__currentLoopData = $endpoint->cleanBodyParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $actualValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            [
                'name' => '<?php echo $key; ?>',
                'contents' => '<?php echo $actualValue; ?>'
            ],
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $endpoint->fileParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            [
                'name' => '<?php echo $key; ?>',
                'contents' => fopen('<?php echo $file->path(); ?>', 'r')
            ],
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ],
<?php elseif(!empty($endpoint->cleanBodyParameters)): ?>
<?php if($endpoint->headers['Content-Type'] == 'application/x-www-form-urlencoded'): ?>
        'form_params' => <?php echo u::printPhpValue($endpoint->cleanBodyParameters, 8); ?>,
<?php else: ?>
        'json' => <?php echo u::printPhpValue($endpoint->cleanBodyParameters, 8); ?>,
<?php endif; ?>
<?php endif; ?>
    ]
);
<?php else: ?>
$response = $client-><?php echo e(strtolower($endpoint->httpMethods[0])); ?>('<?php echo e(rtrim($baseUrl, '/') . '/' . ltrim($endpoint->boundUri, '/')); ?>');
<?php endif; ?>
$body = $response->getBody();
print_r(json_decode((string) $body));
```
<?php /**PATH E:\xampp\htdocs\nava\resources\views\vendor\scribe\partials\example-requests\php.md.blade.php ENDPATH**/ ?>