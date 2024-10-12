@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h2>Modifica progetto</h2>
        </div>
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="title" class="control-label">Nome Progetto</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description" class="control-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Inserisci una descrizione (opzionale)">{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="col-12 mb-3">
                        @if($project->image != null)
                            <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded" alt="{{ $project->title }}">
                        @else
                            <img src="https://via.placeholder.com/600x400" alt="Immagine del progetto">
                        @endif 
                    </div>
                    <div class="col-12 mb-3">
                        <label for="image" class="control-label">Immagine</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="date" class="control-label">Data</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $project->date) }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Salva Progetto</button>
                    </div>
                </div>
            </form>   
        </div>
    </div>
</div>

@endsection
