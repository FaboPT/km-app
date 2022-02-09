<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.head_section')
</head>
<body>
<div id="app">
    @include('layouts.includes.nav_section')
    @include('layouts.includes.main_section')
</div>
</body>
</html>
