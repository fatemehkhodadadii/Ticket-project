<!doctype html>
<html lang="en">
@include('panel.layouts.head')
<body>
@includeWhen(empty($header),'panel.layouts.header')
@yield('content')
@includeWhen(empty($footer),'panel.layouts.footer')
@includeWhen(empty($script),'panel.layouts.script')
@yield('script')
</body>
</html>
