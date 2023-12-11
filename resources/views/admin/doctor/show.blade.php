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
            <a href="{{ route('admin.doctor.edit', $doctor)}}" class="edit-btn">Modifica</a>
        </div>
    </div>
@endsection