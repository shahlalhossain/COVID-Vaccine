<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Shahlal Hossain">
    <meta name="description" content="COVID-19 Vaccine Registration System by Laravel">
    <meta name="keywords" content="HTML, CSS, Bootstrap, JavaScript, jQuery, Laravel, Livewire, MySQL, COVID-19, Vaccine, Registration">

    <title>{{ 'COVID'  }} | @yield('title')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #e5e7eb;
        }
    </style>

    @yield('style')
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-sm bg-info fixed-top">
    <div class="container">
        <a href="/" class="navbar-brand"> &nbsp;COVID</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="{{ route('vaccine-status') }}" class="nav-link">Check Status</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>
