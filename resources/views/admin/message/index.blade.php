@extends('layouts.personal.app')
@section('content-name')
    Messaggi
@endsection
@section('content')
    <div class="messages">
        <ul class="list-unstyled">
            @foreach ($messages as $message)
                <li class="message-info card px-4 py-3 my-3 d-flex flex-row align-items-center">
                    <div>
                        <div class="fw-bold message-name">{{ $message->name }} {{ $message->lastname }}</div>
                        <div class="fw-bold">{{ $message->email }}</div>
                        <div>{{ $message->message }}</div>
                    </div>
                    <div class="button ms-auto">
                        <a href="" class="answer">
                            <i class="fa-solid fa-paper-plane"></i>
                        </a>
                        <a href="" class="d-block delete" onclick="event.preventDefault(); document.getElementById('delete-message-{{$message->id}}').submit();" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    <form id="delete-message-{{$message->id}}" action="{{ route('admin.message.destroy', $message )}}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    @if (session('message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" id="message">
        <div class="toast show align-items-center my-bg-success border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex py-2">
                <div class="toast-body fw-bold">
                    {{ session('message') }}
                </div>
                <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
@endsection
