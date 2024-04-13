<!-- master.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: #F5F5F5;
        }

        .checked {
            color: orange;
        }
    </style>
</head>

<body>
    <header>
        @include('User.layouts.partials.header')
    </header>

    <main class="main-content mx-32 flex justify-between items-center">
        @yield('content')
    </main>
    
    <footer>
        @include('User.layouts.partials.footer')
    </footer>
    @yield('js')
</body>

</html>
