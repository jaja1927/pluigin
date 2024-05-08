<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | inforkom cafe</title>

    @include('layouts.header')

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- conten --}}
        <div class="content">
            <div class="conatiner-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @yield('custom_js')
</body>
</html>