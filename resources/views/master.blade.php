<!DOCTYPE html>
<html>
<head>
    <title>STIX - A friendly note-maker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/angular-material.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body ng-app="stix">
<div class="container-fluid">
    @yield('content')
</div>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/tinymce.min.js') }}"></script>
@if(Request::is('passport'))
<script src="{{ asset('js/app.js') }}"></script>
@endif
<script src="{{ asset('js/homebrew.js') }}"></script>

</body>
</html>