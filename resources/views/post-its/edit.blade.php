@extends('layouts.app')

@section('title', 'Editar Post-It')

@section('content')
    <h1>Editar Post-It</h1>

    <form action="{{ route('post-its.update', $postIt->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="{{ $postIt->title }}" required><br>

        <label for="content">Contenido:</label>
        <textarea id="content" name="content">{{ $postIt->content }}</textarea><br>

        <button type="submit">Actualizar Post-It</button>
    </form>
@endsection
