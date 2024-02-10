<div class="row">
    <div class="col s12">
        <h3>
            <a href="{{ route('tasks.create') }}" class="btn-floating btn-large waves-effect waves-light hoverable" style="background-color: #26a69a;">
                <i class="material-icons white-text">add</i>
            </a>
            Lista de Tareas
        </h3>
    </div>
</div>

<div class="row">
    @foreach ($tasks as $task)
    <div class="col s12 m6 l4">
        <a href="{{ route('tasks.show', $task->id) }}" class="card-link">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">{{ $task->nombre }}</span>
                    <p>{{ $task->descripcion }}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>