<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('inc.head')

<body>

    <main role="main">
        @yield('content')
    </main>
</body>
@stack('scripts')

</html>
