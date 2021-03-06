<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TODOList - TR3TIN</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }
        .fa-btn {
            margin-right: 6px;
        }
        .table-text div {
            padding-top: 6px;
        }
        .navbar-default {
            background-color: #e1f2ff;
            border-color: #bddbf7;
        }
        .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
            color: #002276;
        }
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: #002276;
        }
        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
            color: #002276;
            background-color: #bddbf7;
        }
        .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
            color: #002276;
            background-color: #bddbf7;
        }
        .navbar-default .navbar-toggle {
            border-color: #bddbf7;
        }
        .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
            background-color: #bddbf7;
        }
    </style>

    <script>
        (function () {
            $('#task-name').focus();
        }());
    </script>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/links">TODOList - TIN</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <ul class="nav navbar-nav navbar-right">
                        <li><a href="/about/apropos"><i class="fa fa-btn fa-heart"></i>A propos</a></li>
                    @if (Auth::guest())
                        <li><a href="/auth/register"><i class="fa fa-btn fa-user-plus"></i>S'enregistrer</a></li>
                        <li><a href="/auth/login"><i class="fa fa-btn fa-sign-in"></i>Se connecter</a></li>
                    @else
                        <li class="navbar-text"><i class="fa fa-btn fa-user"></i>{{ Auth::user()->name }}</li>
                        <li><a href="/auth/logout"><i class="fa fa-btn fa-sign-out"></i>Se déconnecter</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

@yield('content')

</body>
</html>