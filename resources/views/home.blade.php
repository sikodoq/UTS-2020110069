@extends('layouts.master')
@section('title', 'Home')
@section('container')

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
            aria-describedby="basic-addon2">
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
                <div class="card h-100 shadow">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                        #{{ sprintf('%03s', $item->id) }}</div>
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
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
