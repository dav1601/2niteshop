@if (env('APP_ENV') != 'local')
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
@endif
