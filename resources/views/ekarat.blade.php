<!DOCTYPE html>
<html>
@include('includes.head')
<body>
@include('includes.menu')
@include('includes.header')
@include('includes.page_head')
@yield('content')
@yield('script')
</body>
</html>
@include('includes.end_script')
