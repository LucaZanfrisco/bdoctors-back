@extends('layouts.personal.app')

@section('content-name')
    Sponsorizzazione
@endsection

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 gx-3">
            @foreach($sponsors as $sponsor)
                <div class="col">
                    <div class="card text-center p-3 bg-{{$sponsor->id}}">
                        <h2 class="fw-bold border-bottom border-2">{{ $sponsor->name }}</h2>
                        <div class="py-3 fs-4">{{ $sponsor->price }} €</div>
                        <div class="py-3 fs-4">{{ $sponsor->duration }} Ore</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
