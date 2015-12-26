<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        @if ($__env->yieldContent('title'))
            @yield('title')
            - {{ env('APP_NAME') }}
        @else
            {{ env('APP_NAME') }}
        @endif
    </title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Google Webfonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    {{--<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>--}}
    {{--<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>--}}
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- Morris API for Graph Plot-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    @yield('css-for-master')
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