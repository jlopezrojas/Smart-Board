@extends('layouts.app')

@section('title', 'Crear Nueva Tarea')

@section('content')
<div class="row">
    <div class="col s12">
        <h3>Crear Nueva Tarea</h3>
    </div>
</div>

<div class="row">
    <form action="{{ route('tasks.store') }}" method="POST" class="col s12">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <input id="nombre" type="text" name="nombre" class="validate">
                <label for="nombre">Nombre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="descripcion" class="materialize-textarea" name="descripcion"></textarea>
                <label for="descripcion">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="asignatario" type="text" name="asignatario" class="validate">
                <label for="asignatario">Asignatario</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="costo" type="number" name="costo" class="validate">
                <label for="costo">Costo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="fecha_inicio" type="date" name="fecha_inicio" class="datepicker">
                <label for="fecha_inicio">Fecha de Inicio</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="fecha_termino" type="date" name="fecha_termino" class="datepicker">
                <label for="fecha_termino">Fecha de Término</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label>Selecciona una o más etiquetas</label>
            </div>
        </div>
        <div class="row" id="etiquetas-container">
            <!-- Aquí se mostrarán todas las etiquetas disponibles como chips -->
            @foreach($etiquetas as $etiqueta)
                <div class="chip etiqueta" style="background-color: {{ $etiqueta->color }} " data-id="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</div>
            @endforeach
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label>Etiquetas Seleccionadas</label>
            </div>
        </div>
        <div class="row" id="chips-container-selected">
            <!-- Aquí se mostrarán las etiquetas seleccionadas como chips -->
        </div>
        <input type="hidden" id="etiquetas-hidden-input" name="etiquetas" value="">
        <div class="row">
            <button type="submit" class="btn waves-effect waves-light">Guardar</button>
        </div>
    </form>
</div>
<style>
    .hidden {
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        // Evento para agregar etiquetas al contenedor de etiquetas seleccionadas
        $(document).on('click', '#etiquetas-container .etiqueta', function() {
            var etiquetaId = $(this).data('id');
            var etiquetaNombre = $(this).text().trim();
            var etiquetaStyle = $(this).attr('style');
            var selectedChip = $('<div>').addClass('chip').text(etiquetaNombre).attr('data-id', etiquetaId);
            selectedChip.attr('style', etiquetaStyle); // Conservar solo el atributo style de la etiqueta
            var closeIcon = $('<i>').addClass('close material-icons').text('close');
            
            selectedChip.append(closeIcon);
            $('#chips-container-selected').append(selectedChip);
            $(this).addClass('hidden'); // Ocultar la etiqueta seleccionada
            $(this).attr('data-selected', 'true'); // Marcar la etiqueta como seleccionada
            actualizarCampoEtiquetas();
        });

        // Evento para restaurar etiquetas al contenedor de etiquetas disponibles
        $(document).on('click', '.close', function() {
            var etiquetaId = $(this).closest('.chip').data('id');
            $('#etiquetas-container').find('.etiqueta[data-id="' + etiquetaId + '"]').removeClass('hidden');
            $(this).closest('.chip').remove();
            actualizarCampoEtiquetas();
        });

        // Función para actualizar el campo oculto de etiquetas en el formulario
        function actualizarCampoEtiquetas() {
            var etiquetasSeleccionadas = $('#chips-container-selected .chip').map(function() {
                return $(this).data('id');
            }).get().join(',');
            $('#etiquetas-hidden-input').val(etiquetasSeleccionadas);
        }
    });
</script>





@endsection
