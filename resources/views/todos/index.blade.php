@extends('layout')

@section('content')
<div class="container">
    <div class="header">
        <h1>Liste des tâches</h1>
        <div class="search-bar">
            <form method="GET" action="{{ route('todos.index') }}" class="d-flex w-100">
                <input type="text" name="search" id="searchInput" placeholder="Rechercher une tâche..." value="{{ request('search') }}">
                <a href="{{ route('todos.create') }}" class="btn-add">+ Nouvelle tâche</a>
            </form>
        </div>
    </div>

    <div class="table-container mt-3">
        <table id="taskTable">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Créée le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr class="{{ $todo->completed ? 'task-completed' : '' }}">
                        <td>
                            <span class="{{ $todo->completed ? 'task-title' : '' }}">{{ $todo->title }}</span>
                        </td>
                        <td>
                            <span class="status-badge {{ $todo->completed ? 'status-termine' : 'status-en-cours' }}">
                                {{ $todo->status }}
                            </span>
                        </td>
                        <td>{{ $todo->start_date }}</td>
                        <td>{{ $todo->end_date ?? '-' }}</td>
                        <td>{{ $todo->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="actions">
                                <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-terminer">
                                        {{ $todo->completed ? 'Rouvrir' : 'Terminer' }}
                                    </button>
                                </form>

                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-modifier">Modifier</a>

                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Supprimer cette tâche ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-supprimer">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
