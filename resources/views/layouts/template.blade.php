<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')  Add on</title>
        @include('layouts.header')
    </head>
    <body class="sb-nav-fixed">
        {{-- navbar --}}
        @include('layouts.navbar')
        {{-- sidebar --}}
        @include('layouts.sidebar')
        {{-- content --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">@yield('page-title')</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">@yield('page-title2')</li>
                    </ol>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
        {{-- footer --}}
        @include('layouts.footer')
    </body>
</html>
