<!DOCTYPE html>
<html>
<head>
    <title>STIX - A friendly note-maker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container-fluid">
    @yield('content')
</div>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>