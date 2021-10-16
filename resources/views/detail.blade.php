@extends('layouts.master')
@section('title', 'Detail')
@section('container')
    <div class="row">
        <div class="col mb-3">
            <button class="btn w-100 btn-warning" type="button" id="dropdownMenuButton" aria-haspopup="true"
                aria-expanded="false">Suprise Me</button>
        </div>
        <div class="col mb-3">
            <button class="btn w-100 btn-warning" type="button" id="dropdownMenuButton" aria-haspopup="true"
                aria-expanded="false">Suprise Me</button>
        </div>
    </div>
    <div class="card shadow">
        @foreach ($id as $item)
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
                                        <td>({{ $item->height }} m)</td>
                                        <th scope="row">Weight</th>
                                        <td>({{ $item->weight }} kg)</td>
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
                                    <tr>
                                        <th scope="row" style="width: 20%">HP</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    aria-valuenow="{{ $item->hp }}" aria-valuemin="0"
                                                    aria-valuemax="500">{{ $item->hp }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:orange;" aria-valuenow="{{ $item->attack }}"
                                                    aria-valuemin="0" aria-valuemax="500">
                                                    {{ $item->attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:yellow;" aria-valuenow="{{ $item->defense }}"
                                                    aria-valuemin="0" aria-valuemax="500">
                                                    {{ $item->defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Sp. Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:blue;"
                                                    aria-valuenow="{{ $item->sp_defense }}" aria-valuemin="0"
                                                    aria-valuemax="500">
                                                    {{ $item->sp_defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Sp. Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="background-color:green;"
                                                    aria-valuenow="{{ $item->sp_attack }}" aria-valuemin="0"
                                                    aria-valuemax="500">
                                                    {{ $item->sp_attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 20%">Speed</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="290"
                                                    aria-valuemin="0" aria-valuemax="500">
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
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach (json_decode($item->evolutions) as $evoid)
                    @foreach ($evos->where('id', $evoid) as $postid)
                        <div class="col mb-5">
                            <div class="card h-100 shadow">
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
                @endforeach
            </div>
    </div>
    @endforeach
    <p class="text-center"></p>
    <script type="text/javascript">
        $('.progress-bar').each(function() {
            var min = $(this).attr('aria-valuemin');
            var max = $(this).attr('aria-valuemax');
            var now = $(this).attr('aria-valuenow');
            var siz = (now - min) * 100 / (max - min);
            $(this).css('width', siz + '%');
        });
    </script>
@endsection
