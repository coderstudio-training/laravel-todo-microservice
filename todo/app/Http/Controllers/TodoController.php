<?php
// app/Http/Controllers/TodoController.php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|max:255',
        ]);

        $todo = Todo::create($validatedData);
        return response()->json($todo, 201);
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'task' => 'required|max:255',
            'completed' => 'required|boolean',
        ]);

        $todo->update($validatedData);
        return response()->json($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
