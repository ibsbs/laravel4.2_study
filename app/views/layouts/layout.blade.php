<!DOCTYPE html>
<html lang="en">
  <head>
    @yield('title')
    @yield('meta')
    @yield('css')
    @yield('js_head')
  </head>
  <body @yield('body')>
    @yield('content')
    @yield('js_body')
  <body>
</html>