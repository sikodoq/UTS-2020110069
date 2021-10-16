<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') | Pokédex</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('startbootstrap/assets/favicon.ico') }}" />
    <link rel="stylesheet" href="/css/app.css">

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('startbootstrap/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container text-center">
            <a href="{{ url('/home') }}">
                <img src="{{ asset('img/logo/pokedex-logo.png') }}" alt="..." />
            </a>
        </div>
    </header>
    <!-- Section-->
    <section>
        <div class="container px-4 px-lg-5 mt-5">
            @yield('container')
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Andi Wijaya 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('startbootstrap/js/scripts.js') }}"></script>
    <script src="/js/app.js"></script>

</body>

</html>
