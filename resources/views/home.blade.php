<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home | Pokédex</title>
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
            <a href="/">
                <img src="{{ asset('img/logo/pokedex-logo.png') }}" alt="..." />
            </a>
        </div>
    </header>
    <!-- Section-->
    <section>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-danger">Search Pokémon</button>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <button class="btn w-100 btn-warning" type="button" id="dropdownMenuButton" aria-haspopup="true"
                        aria-expanded="false">Suprise Me</button>
                </div>
                <div class="col mb-3">
                    <div class="dropdown">
                        <button class="btn w-100 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Order By
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($posts as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                #{{ sprintf('%03s', $item->id) }}</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('img/' . $item->image) }}"
                                alt="{{ $item->name }}" width="450" height="300" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->name }}</h5>
                                    <!-- Product price-->
                                    @foreach (json_decode($item->types) as $type)
                                        <div class="badge bg-dark text-white">{{ $type }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
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
