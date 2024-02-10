@extends('layouts.app')

@section('title', 'Detalles del Post-It')

@section('content')
    <h1>Detalles del Post-It</h1>

    <p><strong>Título:</strong> {{ $postIt->title }}</p>
    <p><strong>Contenido:</strong> {{ $postIt->content }}</p>
    <p><strong>Fecha de Creación:</strong> {{ $postIt->created_at }}</p>
    <p><strong>Última Actualización:</strong> {{ $postIt->updated_at }}</p>

    <a href="{{ route('post-its.edit', $postIt->id) }}">Editar</a>

    <form action="{{ route('post-its.destroy', $postIt->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
