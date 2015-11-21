<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}
</head>
<body>
{{-- Navigation bar --}}
<nav class="navbar navbar-default">
    <div class="container-fluid">
            @include('admin.partials.navbar')
    </div>
</nav>

@yield('content')

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
</body>
</html>