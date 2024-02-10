<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $etiquetas = Etiqueta::all();
        return view('tasks.create', compact('etiquetas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            // Añade validaciones para otros campos aquí
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada exitosamente.');
    }

    public function show(Task $task)
    {
        $tags = Etiqueta::all();
        return view('tasks.show', compact('task','tags'));
    }

    public function edit(Task $task)
    {
        $etiquetas = Etiqueta::all();
        return view('tasks.edit', compact('task','etiquetas'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'nombre' => 'required',
            // Añade validaciones para otros campos aquí
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada exitosamente.');
    }
}
