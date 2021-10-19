@extends('layouts.master')
@section('title', 'Detail')
@section('container')
    <div class="card shadow mb-5">
        <div class="row justify-content-center">
            <div class="col my-auto text-center">
                <h1>Page Not Found!</h1>
                <p>Sorry! The page you're looking for is not here.</p>
                <button class="btn w-75 btn-primary" type="button" onclick="window.location='{{ url('/') }}'">Go
                    Back</button>
            </div>
            <div class="col p-5">
                <img class="mx-auto d-block" src="{{ asset('img/psyduck.jpg') }}" alt="" />
            </div>

        </div>
    </div>
@endsection
