<!DOCTYPE html>
<html>

<head>

    <title>Admin Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a href="#" class="navbar-brand">
            Blog CMS Admin
        </a>

    </div>

</nav>

<div class="container mt-5">

    @yield('content')

</div>

@stack('scripts')

</body>

</html>