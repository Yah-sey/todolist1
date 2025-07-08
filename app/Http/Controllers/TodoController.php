<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $query = Todo::orderByDesc('created_at');

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $todos = $query->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'En cours',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('todos.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $todo->update($request->only('title', 'description', 'start_date', 'end_date'));

        return redirect()->route('todos.index')->with('success', 'Tâche modifiée avec succès.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Tâche supprimée.');
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->status = $todo->completed ? 'Terminé' : 'En cours';
        $todo->completed_at = $todo->completed ? now() : null;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Statut de la tâche mis à jour.');
    }
}
