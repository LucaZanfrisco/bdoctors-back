@extends('layouts.personal.app')

@section('content-name')
    Modifica Profilo
@endsection

@section('content')
<div class="container mt-5">
    <h1>Modificail tuo profilo</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.doctor.update', $user->doctor->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3">
            <div class="my-3">
                <label class="form-label fs-4 fw-bold" for="description">Descrizione</label>
                <textarea class="form-control" name="description" id="description" cols="5" rows="2">{{ $user->doctor->description }}</textarea>
            </div>
    
            <div class="my-3">
                <label class="form-label fs-4 fw-bold" for="services">Servizi</label>
                <textarea class="form-control" name="services" id="services" cols="5" rows="2">{{ $user->doctor->services }}</textarea>
            </div>
    
            <div class="my-3">
                <label class="form-label fs-4 fw-bold" for="cv">Curriculum</label>
                <input type="file" name="cv" id="cv" class="form-control">
            </div>
    
            <div class="my-3">
                <label class="form-label fs-4 fw-bold" for="photo">Fotografia</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
    
            <div class="my-3">
                <label for="address" class="form-label fs-4 fw-bold">Indirizzo</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ $user->doctor->address }}">
            </div>
    
            <div class="my-3">
                <label for="visible" class="form-label fs-4 fw-bold ">Visibile</label>
                <select name="visible" id="visible" class="form-select">
                    <option value="" selected disabled>Seleziona se mostrare il tuo profilo</option>
                    <option value="1"{{ $user->doctor->visible ==1 ? 'selected': ''}}>Visibile</option>
                    <option value="0"{{ $user->doctor->visible == 0 ? 'selected' : ''}}>Non visibile</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Conferma</button>
        </div>
    </form>
</div> 

@endsection