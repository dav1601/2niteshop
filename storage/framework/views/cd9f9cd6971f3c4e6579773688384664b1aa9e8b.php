<?php
    /** @var  Knuckles\Camel\Output\OutputEndpointData $endpoint */
?>

<h2 id="<?php echo Str::slug($group['name']); ?>-<?php echo $endpoint->endpointId(); ?>"><?php echo e($endpoint->metadata->title ?: ($endpoint->httpMethods[0]." ".$endpoint->uri)); ?></h2>

<p>
<?php $__env->startComponent('scribe::components.badges.auth', ['authenticated' => $endpoint->metadata->authenticated]); ?>
<?php echo $__env->renderComponent(); ?>
</p>

<?php echo Parsedown::instance()->text($endpoint->metadata->description ?: ''); ?>


<span id="example-requests-<?php echo $endpoint->endpointId(); ?>">
<blockquote>Example request:</blockquote>

<?php $__currentLoopData = $metadata['example_languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="<?php echo e($language); ?>-example">
    <?php echo $__env->make("scribe::partials.example-requests.$language", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</span>

<span id="example-responses-<?php echo $endpoint->endpointId(); ?>">
<?php if($endpoint->isGet() || $endpoint->hasResponses()): ?>
    <?php $__currentLoopData = $endpoint->responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <blockquote>
            <p>Example response (<?php echo e($response->description ?: $response->status); ?>):</p>
        </blockquote>
        <?php if(count($response->headers)): ?>
        <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http"><?php $__currentLoopData = $response->headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($header); ?>: <?php echo e(is_array($value) ? implode('; ', $value) : $value); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </code></pre>
        </details> <?php endif; ?>
        <pre>
<?php if(is_string($response->content) && Str::startsWith($response->content, "<<binary>>")): ?>
<code>[Binary data] - <?php echo e(htmlentities(str_replace("<<binary>>", "", $response->content))); ?></code>
<?php elseif($response->status == 204): ?>
<code>[Empty response]</code>
<?php else: ?>
<?php ($parsed = json_decode($response->content)); ?>

<code class="language-json"><?php echo htmlentities($parsed != null ? json_encode($parsed, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $response->content); ?></code>
<?php endif; ?> </pre>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</span>
<span id="execution-results-<?php echo e($endpoint->endpointId()); ?>" hidden>
    <blockquote>Received response<span
                id="execution-response-status-<?php echo e($endpoint->endpointId()); ?>"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-<?php echo e($endpoint->endpointId()); ?>"></code></pre>
</span>
<span id="execution-error-<?php echo e($endpoint->endpointId()); ?>" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-<?php echo e($endpoint->endpointId()); ?>"></code></pre>
</span>
<form id="form-<?php echo e($endpoint->endpointId()); ?>" data-method="<?php echo e($endpoint->httpMethods[0]); ?>"
      data-path="<?php echo e($endpoint->uri); ?>"
      data-authed="<?php echo e($endpoint->metadata->authenticated ? 1 : 0); ?>"
      data-hasfiles="<?php echo e($endpoint->hasFiles() ? 1 : 0); ?>"
      data-isarraybody="<?php echo e($endpoint->isArrayBody() ? 1 : 0); ?>"
      data-headers='<?php echo json_encode($endpoint->headers, 15, 512) ?>'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('<?php echo e($endpoint->endpointId()); ?>', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
        <?php if($metadata['try_it_out']['enabled'] ?? false): ?>
            <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-<?php echo e($endpoint->endpointId()); ?>"
                    onclick="tryItOut('<?php echo e($endpoint->endpointId()); ?>');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-<?php echo e($endpoint->endpointId()); ?>"
                    onclick="cancelTryOut('<?php echo e($endpoint->endpointId()); ?>');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-<?php echo e($endpoint->endpointId()); ?>" hidden>Send Request 💥
            </button>
        <?php endif; ?>
    </h3>
    <?php $__currentLoopData = $endpoint->httpMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>
            <?php $__env->startComponent('scribe::components.badges.http-method', ['method' => $method]); ?><?php echo $__env->renderComponent(); ?>
            <b><code><?php echo e($endpoint->uri); ?></code></b>
        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($endpoint->metadata->authenticated && $metadata['auth']['location'] === 'header'): ?>
        <p>
            <label id="auth-<?php echo e($endpoint->endpointId()); ?>" hidden><?php echo e($metadata['auth']['name']); ?> header:
                <b><code><?php echo e($metadata['auth']['prefix']); ?></code></b><input type="text"
                                                                name="<?php echo e($metadata['auth']['name']); ?>"
                                                                data-prefix="<?php echo e($metadata['auth']['prefix']); ?>"
                                                                data-endpoint="<?php echo e($endpoint->endpointId()); ?>"
                                                                data-component="header"></label>
        </p>
    <?php endif; ?>
    <?php if(count($endpoint->urlParameters)): ?>
        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
        <?php $__currentLoopData = $endpoint->urlParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
                <?php $__env->startComponent('scribe::components.field-details', [
                  'name' => $parameter->name,
                  'type' => $parameter->type ?? 'string',
                  'required' => $parameter->required,
                  'description' => $parameter->description,
                  'example' => $parameter->example ?? '',
                  'endpointId' => $endpoint->endpointId(),
                  'component' => 'url',
                ]); ?>
                <?php echo $__env->renderComponent(); ?>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(count($endpoint->queryParameters)): ?>
        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
        <?php $__currentLoopData = $endpoint->queryParameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
                <?php $__env->startComponent('scribe::components.field-details', [
                  'name' => $parameter->name,
                  'type' => $parameter->type,
                  'required' => $parameter->required,
                  'description' => $parameter->description,
                  'example' => $parameter->example ?? '',
                  'endpointId' => $endpoint->endpointId(),
                  'component' => 'query',
                ]); ?>
                <?php echo $__env->renderComponent(); ?>
            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(count($endpoint->nestedBodyParameters)): ?>
        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <?php $__env->startComponent('scribe::components.body-parameters', ['parameters' => $endpoint->nestedBodyParameters, 'endpointId' => $endpoint->endpointId(),]); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>
</form>

<?php if(count($endpoint->responseFields)): ?>
    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <?php $__currentLoopData = $endpoint->responseFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>
            <?php $__env->startComponent('scribe::components.field-details', [
              'name' => $field->name,
              'type' => $field->type,
              'required' => true,
              'description' => $field->description,
              'isInput' => false,
            ]); ?>
            <?php echo $__env->renderComponent(); ?>
        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\nava\resources\views/vendor/scribe/themes/default/endpoint.blade.php ENDPATH**/ ?>