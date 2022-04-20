<!doctype html>
<html lang='{{ app()->getLocale() }}''>
@include('inc.head')

<body>

    <main role='main' class='container m-auto p-10'>
        @yield('content')
    </main>
</body>
@stack('scripts')

</html>
