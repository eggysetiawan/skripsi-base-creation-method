<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.head')
    <!-- CoreUI CSS -->

    <livewire:styles>

        <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="c-app">
    @include('layouts.sidebar')
    <div class="c-wrapper">
        @include('layouts.navbar')


        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">

                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="c-footer">
            <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
            <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/pro/">CoreUI Pro</a></div>
            <div class="mfs-auto">Github &nbsp;<a href="https://github.com/eggysetiawan">Rahmat Setiawan</a></div>
        </footer>
    </div>

    @include('layouts.script')
    <livewire:scripts>
</body>

</html>
