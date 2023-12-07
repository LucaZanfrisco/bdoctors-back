@extends('layouts.personal.app')
@section('content-name')
    Dashboard Generale
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-start gap-5">
        <div class="first-col">
            <div class="messages">
                <div class=" fs-5 fw-bold d-flex align-items-center justify-content-between px-2">
                    <div>Messaggi</div>
                    <div>{{ count($messages) }}</div>
                </div>
                <ul class="list-unstyled">
                    @for ($i = 0; $i < 3; $i++)
                        <li class="message-info row row-cols-2 align-items-center">
                            <div class="fw-bold message-name col-2">{{ Str::limit($messages[$i]->name, 1, '') }}</div>
                            <div class="col-10 message-text">
                                <div class="message-email">{{ $messages[$i]->email }}</div>
                                <div>{{ Str::limit($messages[$i]->message, 75, '...') }}</div>
                            </div>

                        </li>
                    @endfor
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
        <div class="second-col">
            <div class="row row-cols-2 justify-content-between align-items-center text-center fs-5">
                <div>
                    <div class="stars">La tua valutazione media: <span>{{ $avarageStars }}</span></div>
                </div>
                <div>
                    <a href="{{ route('admin.doctor.show', $user->doctor->id)}}" class="profile">Profilo</a>
                </div>
            </div>
            <div class="stat">

            </div>
        </div>

    </div>
@endsection
