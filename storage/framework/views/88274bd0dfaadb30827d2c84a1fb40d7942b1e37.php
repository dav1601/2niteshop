
<?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($name === '[]'): ?>
        <?php
            $description = "The request body is an array (<code>{$parameter['type']}</code>`)";
            $description .= !empty($parameter['description']) ? ", representing ".lcfirst($parameter['description'])."." : '.';
        ?>
        <p>
            <?php echo Parsedown::instance()->text($description); ?>

        </p>
        <?php $__currentLoopData = $parameter['__fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subfieldName => $subfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($subfield['__fields'])): ?>
                    <?php $__env->startComponent('scribe::components.body-parameters', ['parameters' => [$subfieldName => $subfield], 'endpointId' => $endpointId,]); ?>
                    <?php echo $__env->renderComponent(); ?>
                <?php else: ?>
                    <p>
                        <?php $__env->startComponent('scribe::components.field-details', [
                          'name' => $subfield['name'],
                          'type' => $subfield['type'] ?? 'string',
                          'required' => $subfield['required'] ?? false,
                          'description' => $subfield['description'] ?? '',
                          'example' => $subfield['example'] ?? '',
                          'endpointId' => $endpointId,
                          'hasChildren' => false,
                          'component' => 'body',
                        ]); ?>
                        <?php echo $__env->renderComponent(); ?>
                    </p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php elseif(!empty($parameter['__fields'])): ?>
        <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <?php $__env->startComponent('scribe::components.field-details', [
                  'name' => $parameter['name'],
                  'type' => $parameter['type'] ?? 'string',
                  'required' => $parameter['required'] ?? false,
                  'description' => $parameter['description'] ?? '',
                  'example' => $parameter['example'] ?? '',
                  'endpointId' => $endpointId,
                  'hasChildren' => true,
                  'component' => 'body',
                ]); ?>
                <?php echo $__env->renderComponent(); ?>
            </summary>
            <?php $__currentLoopData = $parameter['__fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subfieldName => $subfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!empty($subfield['__fields'])): ?>
                    <?php $__env->startComponent('scribe::components.body-parameters', ['parameters' => [$subfieldName => $subfield], 'endpointId' => $endpointId,]); ?>
                    <?php echo $__env->renderComponent(); ?>
                <?php else: ?>
                    <p>
                        <?php $__env->startComponent('scribe::components.field-details', [
                          'name' => $subfield['name'],
                          'type' => $subfield['type'] ?? 'string',
                          'required' => $subfield['required'] ?? false,
                          'description' => $subfield['description'] ?? '',
                          'example' => $subfield['example'] ?? '',
                          'endpointId' => $endpointId,
                          'hasChildren' => false,
                          'component' => 'body',
                        ]); ?>
                        <?php echo $__env->renderComponent(); ?>
                    </p>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </details>
        </p>
    <?php else: ?>
        <p>
            <?php $__env->startComponent('scribe::components.field-details', [
              'name' => $parameter['name'],
              'type' => $parameter['type'] ?? 'string',
              'required' => $parameter['required'] ?? false,
              'description' => $parameter['description'] ?? '',
              'example' => $parameter['example'] ?? '',
              'endpointId' => $endpointId,
              'hasChildren' => false,
              'component' => 'body',
            ]); ?>
            <?php echo $__env->renderComponent(); ?>
        </p>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\xampp\htdocs\nava\resources\views\vendor\scribe\components\body-parameters.blade.php ENDPATH**/ ?>