<?php
  use Knuckles\Scribe\Tools\WritingUtils as u;
  /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
?>
```python
import requests
import json

url = '<?php echo e(rtrim($baseUrl, '/')); ?>/<?php echo e($endpoint->boundUri); ?>'
<?php if($endpoint->hasFiles()): ?>
files = {
<?php $__currentLoopData = $endpoint->fileParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parameter => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = u::getParameterNamesAndValuesForFormData($parameter, $value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  '<?php echo $key; ?>': open('<?php echo $file->path(); ?>', 'rb')<?php if(!($loop->parent->last)): ?>,
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

}
<?php endif; ?>
<?php if(count($endpoint->cleanBodyParameters)): ?>
payload = <?php echo json_encode($endpoint->cleanBodyParameters, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?>

<?php endif; ?>
<?php if(count($endpoint->cleanQueryParameters)): ?>
params = <?php echo u::printQueryParamsAsKeyValue($endpoint->cleanQueryParameters, "'", ":", 2, "{}"); ?>

<?php endif; ?>
<?php if(!empty($endpoint->headers)): ?>
headers = {
<?php $__currentLoopData = $endpoint->headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  '<?php echo e($header); ?>': '<?php echo e($value); ?>'<?php if(!($loop->last)): ?>,
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

}

<?php endif; ?>
<?php
$optionalArguments = [];
if (count($endpoint->headers)) $optionalArguments[] = "headers=headers";
if (count($endpoint->fileParameters)) $optionalArguments[] = "files=files";
if (count($endpoint->cleanBodyParameters)) $optionalArguments[] = (count($endpoint->fileParameters) || $endpoint->headers['Content-Type'] == 'application/x-www-form-urlencoded' ? "data=payload" : "json=payload");
if (count($endpoint->cleanQueryParameters)) $optionalArguments[] = "params=params";
$optionalArguments = implode(', ',$optionalArguments);
?>
response = requests.request('<?php echo e($endpoint->httpMethods[0]); ?>', url, <?php echo e($optionalArguments); ?>)
response.json()
```
<?php /**PATH E:\xampp\htdocs\nava\vendor\knuckleswtf\scribe\resources\views\partials\example-requests\python.md.blade.php ENDPATH**/ ?>