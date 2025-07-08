@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Créer une nouvelle tâche</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
