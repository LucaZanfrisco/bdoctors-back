@extends('layouts.personal.app')

@section('content')
    <div class="first-line">
        <div class="fw-bold fs-4">
            Dashboard Generale
        </div>
        <div class="profile">
            <a class="text-decoration-none" href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
            <div class="img-container">
                <img src="{{ $user->doctor->photo }}" alt="{{ $user->name }}">
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-between">
        <div class="first-col">
            <div class="messages">
                <div class="fs-5 text-center fw-bold">Messaggi</div>
                <ul class="list-unstyled">
                    @foreach ($messages as $message)
                        <li class="message-info">
                            <div class="fw-bold message-name">{{ $message->name }} {{ $message->lastname }}</div>
                            <div class="fw-bold">{{ $message->email }}</div>
                            <div>{{ Str::limit($message->message, 75, '...') }}</div>
                        </li>
                    @endforeach
                </ul>
                <a href="" class="text-decoration-none d-block text-center fw-bold">Vedi Tutti -></a>
            </div>
            <div class="sponsor">
                @foreach ($sponsor->sponsorships as $sponsor)
                    <div class="duration">
                        La sponsorizzazione termina il giorno <span>{{ $sponsor->pivot->end_date }}</span>
                    </div>
                @endforeach
                <a class="text-center">Estendi -></a>
            </div>
           
        </div>

    </div>
@endsection
