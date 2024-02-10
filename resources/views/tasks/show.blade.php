@extends('layouts.app')

@section('title', 'Detalles de la Tarea')

@section('content')
    <h1>Detalles de la Tarea</h1>
    <p><strong>Nombre:</strong> {{ $task->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $task->descripcion }}</p>
    <p><strong>Asignatario:</strong> {{ $task->asignatario }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $task->fecha_inicio }}</p>
    <p><strong>Fecha de Término:</strong> {{ $task->fecha_termino }}</p>
    <p><strong>Costo:</strong> {{ $task->costo }}</p>
    <p><strong>Etiquetas:</strong></p>
    <div class="chips">
        @php
            $etiquetas = explode(',', $task->etiquetas);
        @endphp
        @foreach ($etiquetas as $etiqueta)
            <div class="chip" style="background-color: {{$tags[$etiqueta]->color}}">{{ $tags[$etiqueta]->nombre }}</div>
        @endforeach
    </div>
    <p><strong>Fecha de Creación:</strong> {{ $task->created_at }}</p>
    <p><strong>Última Actualización:</strong> {{ $task->updated_at }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
