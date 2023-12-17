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
                        <a href="" class="answer" data-bs-toggle="modal" data-bs-target="#message-{{ $message->id }}">
                            <i class="fa-solid fa-paper-plane"></i>
                        </a>
                        <a href="" class="d-block delete"
                            onclick="event.preventDefault(); document.getElementById('delete-message-{{ $message->id }}').submit();">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                    <form id="delete-message-{{ $message->id }}" action="{{ route('admin.message.destroy', $message) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>

                <div class="modal fade" id="message-{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Email di Risposta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger" id="form-error">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('admin.lead') }}" method="GET">
                                    <div class="fw-bold">
                                        <input class="form-control" type="text" name="nameLastname" id="nameLastname"
                                            value="{{ $message->name }} {{ $message->lastname }}" readonly>
                                    </div>
                                    <div class="mt-3">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $message->email }}" id="email" readonly>
                                    </div>

                                    <div class="mt-3 fw-bold">
                                        <label class="form-label" for="object">Oggetto della mail</label>
                                        <input class="form-control" type="text" name="object"
                                            placeholder="Inserire l'oggetto della mail" value="{{ old('object') }}" required>
                                    </div>
                                    <div class="mt-3 fw-bold">
                                        <label class="form-label" for="responseContent">Contenuto del mail</label>
                                        <textarea class="form-control" name="responseContent" id="responseContent" cols="30" rows="10"
                                            placeholder="Inserire il contenuto del messaggio" required>{{ old('responseContent') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">Invia</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
