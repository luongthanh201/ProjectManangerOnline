<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LARAVEL</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
    <div class="app">
        @include('projectmananger.layout.menu-left')
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            lucide.createIcons();
        });
    </script>

</body>

</html>