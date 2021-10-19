@extends('layouts.master')
@section('title', 'Home')
@section('container')
    <form class="form" method="GET" action="/home/search">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_query" value="{{ old('search_query') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-danger" value="search_query">Search Pokémon</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col mb-3">
            <button class="btn w-100 btn-warning" type="button"
                onclick="window.location='{{ url('/home/randomize') }}'">Suprise Me</button>
        </div>
        <div class="col mb-3">
            <div class="dropdown">
                <button class="btn w-100 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Order By
                </button>
                <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/home/o-id-asc') }}">Lowest Number</a>
                    <a class="dropdown-item" href="{{ url('/home/o-id-desc') }}">Highest Number</a>
                    <a class="dropdown-item" href="{{ url('/home/o-a-z') }}">A-Z</a>
                    <a class="dropdown-item" href="{{ url('/home/o-z-a') }}">Z-A</a>
                </div>
            </div>
        </div>
    </div>
    @if (count($pokemons) > 0)
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($pokemons as $item)
                <div class="col mb-5">
                    <div class="card h-100 shadow p-3">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                            # {{ sprintf('%03s', $item->id) }}</div>
                        <!-- Product image-->
                        <a href="{{ url('detail/' . $item->id) }}">
                            <img class="card-img-top" src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}"
                                width="450" height="300" />
                        </a>
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
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col d-flex justify-content-center">
            <div class="card h-100 w-25 shadow mb-3">
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        No Pokemon Found.
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
