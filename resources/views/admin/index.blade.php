@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img class="img-fluid rounded" src="{{ $user->doctor->photo }}" alt="{{ $user->name}}">
            </div>
            <div class="col-8 d-flex align-items-center flex-column">
                <div class="fs-4 fw-bold">{{ $user->name }} {{ $user->lastname }} </div>
                <hr class="w-50">
                <div class="fs-4">{{ $user->doctor->description }} </div>
                <hr class="w-50">
                <div class="fs-4">{{ $user->doctor->services }} </div>
                <hr class="w-50">
                <div class="fs-4">{{ $user->doctor->address }} </div>
                <hr class="w-50">
                <div class="fs-4">{{ $user->doctor->visible ? 'Visibile' : 'Non Visibile' }}</div>
            </div>
            
        </div>
    </div>
@endsection
