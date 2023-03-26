@if (session('success'))
    <script>
        let message = {{ session('success') }};
        toastr.success(message);
    </script>
@elseif (session('error'))
    <script>
        let message = {{ session('error') }};
        toastr.error(message);
    </script>
@endif
