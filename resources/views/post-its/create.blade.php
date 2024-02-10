@extends('layouts.app')

@section('title', 'Crear Nuevo Post-It')

@section('content')
    <h1>Crear Nuevo Post-It</h1>

    <form action="{{ route('post-its.store') }}" method="POST">
        @csrf

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">Contenido:</label>
        <textarea id="content" name="content"></textarea><br>

        <button type="submit">Crear Post-It</button>
    </form>
@endsection
