<?php if(env('APP_ENV') != 'local'): ?>
    <script>
        var logger = function() {
            var oldConsoleLog = null;
            var pub = {};

            pub.enableLogger = function enableLogger() {
                if (oldConsoleLog == null)
                    return;

                window['console']['log'] = oldConsoleLog;
            };

            pub.disableLogger = function disableLogger() {
                oldConsoleLog = console.log;
                window['console']['log'] = function() {};
            };

            return pub;
        }();
        logger.disableLogger();
    </script>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\2niteshop\home\u217861923\domains\vachill.com\public_html\resources\views/components/app/plugin/debug.blade.php ENDPATH**/ ?>