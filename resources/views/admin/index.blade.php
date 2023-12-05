@extends('layouts.personal.app')
@section('content-name')
    Dashboard Generale
@endsection
@section('content')
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
                <div class="text-center">
                    <a href="{{ route('admin.message.index') }}" class="text-decoration-none fw-bold">Vedi Tutti -></a>
                </div>

            </div>
            <div class="sponsor">
                @foreach ($sponsor->sponsorships as $sponsor)
                    <div class="duration">
                        La sponsorizzazione termina il giorno <span>{{ $sponsor->pivot->end_date }}</span>
                    </div>
                @endforeach
                <div class="text-center">
                    <a href="">Estendi -></a>
                </div>

            </div>

        </div>

    </div>
@endsection
