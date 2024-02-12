<!-- index.blade.php -->

@extends('layouts.app')

@section('title', 'Lista de Post-its')

@section('content')
<div class="row" id="post-it-container">
    @foreach ($postIts as $postIt)
        <div class="post-it col s12 m6 l4" data-id="{{ $postIt->id }}">
            <a href="{{ route('post-its.show', $postIt->id) }}">
                <div class="card resizable">
                    <div class="card-content">
                        <span class="card-title post-it-title">{{ $postIt->title }}</span>
                        <p class="post-it-content">{{ $postIt->content }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
<div id="post-it-modal" class="modal">
    <div class="modal-content">
        <h4>Detalles del Post-it</h4>
        <div id="post-it-details">
            <!-- Aquí se cargarán los detalles del post-it seleccionado -->
        </div>
    </div>
    <div class="modal-footer">
        <button id="delete-post-it-btn" class="btn red">Eliminar</button>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>

{{-- <a href="#" id="create-post-it-btn" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">order</i></a> --}}
{{-- <a href="#" id="create-post-it-btn" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a> --}}

<div class="row">
    <div class="col s12">
        <div style="position: fixed; bottom: 20px; right: 20px;">
            <!-- Botón para reorganizar las tarjetas -->
            <a href="#" id="reorder-post-its-btn" class="btn-floating btn-large"><i class="material-icons">reorder</i></a>
            
            <!-- Botón para crear un nuevo post-it -->
            <a href="{{ route('post-its.create') }}" class="btn-floating btn-large"><i class="material-icons">add</i></a>
        </div>
    </div>
</div>


<div id="create-post-it-form" class="row card-panel" style="display:none;">
    <form class="col s12" id="post-it-form">
        @csrf
        <div class="input-field col s12">
            <input id="title" name="title" type="text" class="validate">
            <label for="title">Título</label>
        </div>
        <div class="input-field col s12">
            <textarea id="content" name="content" class="materialize-textarea"></textarea>
            <label for="content">Contenido</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Crear</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Hacer las tarjetas Post-It arrastrables
        $(".post-it").draggable({
            containment: "#post-it-container",
            stack: ".post-it"
        });

        // Hacer las tarjetas Post-It redimensionables
        $(".resizable").resizable({
            containment: "#post-it-container",
            // Función que se ejecuta cuando la redimensión termina
            stop: function(event, ui) {
                // Obtener el tamaño de la tarjeta
                var width = $(this).width();
                var height = $(this).height();

                // Calcular el tamaño del texto en función del tamaño de la tarjeta
                var fontSize = Math.min(width, height) / 10; // Tamaño mínimo de letra: 10

                // Establecer el tamaño del texto
                $(this).find('.post-it-title').css('font-size', fontSize + 'px');
                $(this).find('.post-it-content').css('font-size', fontSize + 'px');
            }
        });

        // Posicionar el botón "Crear Nuevo Post-it"
        $("#create-post-it-btn").css({
            'position': 'fixed',
            'bottom': '20px',
            'right': '20px',
            'z-index': '1000' // Asegura que esté por encima del contenido
        });

        // Mostrar el formulario para crear un nuevo Post-It
        $("#create-post-it-btn").click(function(e) {
            e.preventDefault();
            $("#create-post-it-form").show();
        });

        // Enviar el formulario para crear un nuevo Post-It
        $("#post-it-form").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.post('{{ route("post-its.store") }}', formData, function(data) {
                var newPostIt = '<div class="post-it col s12 m6 l4" data-id="' + data.id + '"><div class="card resizable"><div class="card-content"><span class="card-title post-it-title">' + data.title + '</span><p class="post-it-content">' + data.content + '</p></div></div></div>';
                $("#post-it-container").append(newPostIt);
                $(".post-it").draggable({
                    containment: "#post-it-container",
                    stack: ".post-it"
                });
                // Hacer las tarjetas Post-It redimensionables
                $(".resizable").resizable({
                    containment: "#post-it-container",
                    handles: 'se', // Permitir redimensionamiento diagonal
                    // Función que se ejecuta cuando la redimensión termina
                    stop: function(event, ui) {
                        // Obtener el tamaño de la tarjeta
                        var width = $(this).width();
                        var height = $(this).height();

                        // Calcular el tamaño del texto en función del tamaño de la tarjeta
                        var fontSize = Math.min(width, height) / 10; // Tamaño mínimo de letra: 10

                        // Establecer el tamaño del texto
                        $(this).find('.post-it-title').css('font-size', fontSize + 'px');
                        $(this).find('.post-it-content').css('font-size', fontSize + 'px');
                    }
                }).each(function() {
                    // Eliminar la etiqueta <span> con la clase 'ui-icon' después de que se haya inicializado la funcionalidad de redimensionamiento
                    $(this).find('.ui-resizable-handle').children('.ui-icon').remove();
                });

                $("#create-post-it-form").hide().trigger("reset");
            });
        });
    });
    $(document).ready(function() {
        // Manejar clic en el enlace para abrir el modal
        $('.open-post-it').click(function(e) {
            e.preventDefault();
            var postItId = $(this).data('post-it-id');

            // Aquí debes hacer una llamada AJAX para obtener los detalles del post-it utilizando su ID
            // Por ahora, supongamos que tienes una función getPostItDetails(id) que obtiene los detalles del post-it
            var postItDetails = getPostItDetails(postItId);

            // Rellenar el modal con los detalles del post-it
            $('#post-it-details').html(postItDetails);

            // Mostrar el modal
            $('#post-it-modal').modal('open');
        });

        // Manejar clic en el botón Eliminar dentro del modal
        $('#delete-post-it-btn').click(function() {
            // Aquí debes escribir el código para eliminar el post-it utilizando su ID
            // Por ahora, supongamos que tienes una función deletePostIt(id) que elimina el post-it
            deletePostIt(postItId);

            // Cerrar el modal
            $('#post-it-modal').modal('close');

            // Actualizar la vista eliminando el post-it eliminado
            // Por ejemplo, puedes recargar la página o eliminar el post-it de la vista sin recargar la página
        });
    });

</script>
@endsection
@section('styles')
    <style>
        .ui-icon {
            display: contents;
        }
    </style>
@endsection
