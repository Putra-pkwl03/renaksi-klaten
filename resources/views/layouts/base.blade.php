<!DOCTYPE html>
<html @yield('html_attribute')>

<head>
    @include('layouts.partials/title-meta', ['title' => $title])

    @include('layouts.partials/head-css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body @yield('body_attribute')>

    @yield('content')

    @include('layouts.partials/footer-scripts')

</body>

</html>
