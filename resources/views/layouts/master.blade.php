<!DOCTYPE html>
<html data-n-head-ssr lang="en" dir="ltr"
    data-n-head="%7B%22lang%22:%7B%22ssr%22:%22en%22%7D,%22dir%22:%7B%22ssr%22:%22ltr%22%7D%7D">
    <head>
        @yield('header')
    </head>
    <body>
        @yield('content')
        @yield('footer')
    </body>
    <div id="toaster"></div>
</html>
