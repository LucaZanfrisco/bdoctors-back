@extends('layouts.personal.app')
@section('content-name')
    Messaggi
@endsection
@section('content')
    <div class="messages">
        <ul class="list-unstyled">
            @foreach ($messages as $message)
                <li class="message-info card px-4 py-3 my-3 d-flex flex-row justify-content-between align-items-center">
                    <div>
                        <div class="fw-bold message-name">{{ $message->name }} {{ $message->lastname }}</div>
                        <div class="fw-bold">{{ $message->email }}</div>
                        <div>{{ $message->message }}</div>
                    </div>
                    <div class="button">
                        <a href="" class="answer">
                            <i class="fa-solid fa-paper-plane"></i>
                        </a>
                        <a href="" class="d-block delete">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    
                </li>
            @endforeach
        </ul>
    </div>
@endsection
