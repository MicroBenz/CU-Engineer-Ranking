<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    @yield('body')

    <!-- Bootstrap core JavaScript-->
    <!-- Placed all scripts at the end of the document so the pages load faster-->
    <script src="{{ asset('js/jquery-1.11.3.min.js')  }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')  }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
    @yield('script')
</body>
</html>