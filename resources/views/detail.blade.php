@extends('layouts.master')
@section('title', 'Detail')
@section('container')
    <div class="row">
        <div class="col mb-3">
            @if (isset($previous))
                <button class="btn w-100 btn-danger" type="button"
                    onclick="window.location='{{ url('/detail/' . $previous->id) }}'">#{{ sprintf('%03s', $previous->id) }}
                    {{ $previous->name }}</button>
            @elseif (isset($latest))
                <button class="btn w-100 btn-danger" type="button"
                    onclick="window.location='{{ url('/detail/' . $latest->id) }}'">#{{ sprintf('%03s', $latest->id) }}
                    {{ $latest->name }}</button>
            @endif
        </div>
        <div class="col mb-3">
            @if (isset($next))
                <button class="btn w-100 btn-danger" type="button"
                    onclick="window.location='{{ url('/detail/' . $next->id) }}'">#{{ sprintf('%03s', $next->id) }}
                    {{ $next->name }}</button>
            @else
                <button class="btn w-100 btn-danger" type="button"
                    onclick="window.location='{{ url('/detail/' . $first->id) }}'">#{{ sprintf('%03s', $first->id) }}
                    {{ $first->name }}</button>
            @endif
        </div>
    </div>
    <div class="card shadow mb-3">
        @foreach ($result as $item)
            <div class="row justify-content-center">

                <div class="col my-auto">
                    <img class="mx-auto d-block" src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}" />
                </div>
                <div class="col mb-5">
                    <ul class="list-group">
                        <li class="list-group-item border-0">#{{ sprintf('%03s', $item->id) }}</li>
                        <li class="list-group-item border-0">
                            <h1>{{ $item->name }}</h1>
                        </li>
                        <li class="list-group-item border-0">
                            <h4>Abilities</h4>
                        </li>
                        <li class="list-group-item border-0">
                            @foreach (json_decode($item->abilities) as $abilities)
                                <div class="badge bg-dark text-white">{{ $abilities }}</div>
                            @endforeach
                        </li>
                        <li class="list-group-item border-0">
                            <h4>Profile</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Height</th>
                                        <td>{{ number_format($item->height * 3.28084, 2) }} ft. ({{ $item->height }}
                                            m)
                                        </td>
                                        <th scope="row">Weight</th>
                                        <td>{{ number_format($item->weight * 2.20462, 2) }} lbs. ({{ $item->weight }}
                                            kg)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Species</th>
                                        <td>{{ $item->species }}</td>
                                        <th scope="row">Types</th>
                                        <td>
                                            @foreach (json_decode($item->types) as $type)
                                                <div class="badge bg-dark text-white">{{ $type }}</div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item border-0">
                            <h4>Stats</h4>
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    @php
                                        $valuemax = 300;
                                    @endphp
                                    <tr>
                                        <th scope="row" style="width: 20%">HP</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: {{ number_format(($item->hp / $valuemax) * 100) }}%"
                                                    aria-valuenow="{{ number_format(($item->hp / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->hp }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:orange; width: {{ number_format(($item->attack / $valuemax) * 100) }}%;"
                                                    aria-valuenow="{{ number_format(($item->attack / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:yellow; width: {{ number_format(($item->defense / $valuemax) * 100) }}%;"
                                                    aria-valuenow="{{ number_format(($item->defense / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Sp. Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:blue; width: {{ number_format(($item->sp_defense / $valuemax) * 100) }}%;"
                                                    aria-valuenow="{{ number_format(($item->sp_defense / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->sp_defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Sp. Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:green; width: {{ number_format(($item->sp_attack / $valuemax) * 100) }}%;"
                                                    aria-valuenow="{{ number_format(($item->sp_attack / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->sp_attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Speed</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:Fuchsia; width: {{ number_format(($item->speed / $valuemax) * 100) }}%;"
                                                    aria-valuenow="{{ number_format(($item->speed / $valuemax) * 100) }}"
                                                    aria-valuemin="0" aria-valuemax="{{ $valuemax }}">
                                                    {{ $item->speed }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- evolution --}}
            <p class="text-center">Evolution</p>
            <div class="row m-2 row-cols-xl-4 justify-content-center">
                @forelse (json_decode($item->evolutions) as $evoid)
                    @foreach ($evos->where('id', $evoid) as $postid)
                        <div class="col mb-5">
                            <div class="card h-100 shadow p-4">
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    #{{ sprintf('%03s', $postid->id) }}</div>
                                <a href="{{ url('detail/' . $postid->id) }}">
                                    <img class="card-img-top" src="{{ asset('img/' . $postid->image) }}"
                                        alt="{{ $postid->name }}" width="450" height="300" />
                                </a>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">{{ $postid->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="col mb-5">
                        <div class="card h-100 shadow">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <p class="fw-bolder">No Evolution for this Pokemon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
    </div>
    @endforeach
@endsection
