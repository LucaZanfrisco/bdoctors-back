@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img class="img-fluid rounded" src="{{ $user->doctor->photo }}" alt="{{ $user->name }}">
            </div>
            <div class="col-8 d-flex align-items-center flex-column">
                <div class="fs-4 fw-bold my-3">{{ $user->name }} {{ $user->lastname }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor->description }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor->services }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor->address }} </div>
                <hr class="w-50">
                <div class="fs-5 my-3">{{ $user->doctor->visible ? 'Visibile' : 'Non Visibile' }}</div>              
            </div>
        </div>
        <div class="mt-5">
            <iframe class="w-100" style="height: 600px" src="{{ $user->doctor->cv }}#embedded=True" frameborder="1"></iframe>
        </div>
    </div>
@endsection
