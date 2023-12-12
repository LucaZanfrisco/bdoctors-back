@extends('layouts.personal.app')

@section('content-name')
    Profilo
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <img class="img-fluid w-100 rounded-4" src="{{ $doctor->photo }}" alt="{{ Auth::user()->name}}">
        </div>
        <div class="col-9">
            <div class="profile-container">
                <div class="fw-bold fs-5 mb-3">Descrizione</div>
                {{ $doctor->description}}
            </div>
            <div class="profile-container mt-3">
                <div class="fw-bold fs-5 mb-3">Servizi</div>
                <div>{{ $doctor->services}}</div>
            </div>
            <div class="profile-container mt-3">
                <div class="fw-bold fs-5 mb-3">Indirizzo</div>
                <div>{{ $doctor->address }}</div>
            </div>
            <div class="profile-container mt-3">
                <div class="fs-5 fw-bold mb-3">Tipologie</div>
                <ul class="list-unstyled d-flex justify-content-center aling-items-center gap-3">
                
                    @foreach ($doctor->typologies as $typology)
                        <li class="border rounded-2 p-3">{{ $typology->name }} </li>
                    @endforeach
                </ul>
            </div>
            <div class="profile-container mt-3 d-flex flex-column align-items-center">
                <div class="fw-bold fs-5 mb-3">Visibilità</div>
                <div class="{{ $doctor->visible ? 'visibile' : 'non-visibile'}}">
                    
                </div>
            </div>
            <a href="{{ route('admin.doctor.edit', $doctor)}}" class="edit-btn">Modifica</a>
        </div>
        
    </div>
@endsection