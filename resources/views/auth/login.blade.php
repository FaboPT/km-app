<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('auth.includes.head_section')
</head>
<body class="hold-transition login-page">
@include('auth.includes.login_box_section')
@include('auth.includes.plugins_section')
</body>
</html>

