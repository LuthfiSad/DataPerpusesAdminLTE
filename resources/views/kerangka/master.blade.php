<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('include.style')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">
        @include('include.sidebar')

        <main id="main" class="app-main">
            @include('include.navbar')

            <div class="app-content-header">
                @include('include.header')
            </div>

            <div class="app-content">
                @yield('content')
            </div>

        </main>
        @include('include.footer')
    </div>

    @include('include.script')
</body>

</html>
