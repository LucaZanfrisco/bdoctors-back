@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img class="img-fluid rounded" src="{{ $user->doctor?->urlPhoto() }}" alt="{{ $user->name }}">
                <iframe class="mt-2 w-100" style="height: 300px" src="{{ $user->doctor?->cv }}#page=1" frameborder="1"></iframe>
            </div>
            <div class="col-8 d-flex align-items-center flex-column">
                <div class="fs-4 fw-bold my-3">{{ $user->name }} {{ $user->lastname }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor?->description }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor?->services }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor?->address }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor?->visible ? 'Visibile' : 'Non Visibile' }}</div>              
            </div>
        </div>
    </div>

    @if($user->doctor)
    <button><a href="{{ route('admin.doctor.edit', $user->doctor->id) }}">edit</a></button>
    @endif
@endsection
