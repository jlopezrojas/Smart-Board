@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
  <div id="swiper-panel" class="swiper-container">
    <div class="swiper-wrapper">
{{--       @foreach($panels as $panel)
        <div class="swiper-slide">
          <h2>{{ $panel->title }}</h2>
          <p>{{ $panel->content }}</p>
        </div>
      @endforeach --}}
      <div class="swiper-slide">
        {{-- @include('post-its.index-slide') --}}
        <h2>TEST 1</h2>
        <p>TEST DESCRIPCION 1</p>
      </div>
      <div class="swiper-slide">
        {{-- @include('tasks.index-slide') --}}
        <h2>TEST 2</h2>
        <p>TEST DESCRIPCION 2</p>
      </div>
      <div class="swiper-slide">
        {{-- @include('tasks.index-slide') --}}
        <h2>TEST 3</h2>
        <p>TEST DESCRIPCION 3</p>
      </div>
      <div class="swiper-slide">
        {{-- @include('tasks.index-slide') --}}
        <h2>TEST 4</h2>
        <p>TEST DESCRIPCION 4</p>
      </div>
      <div class="swiper-slide">
        {{-- @include('tasks.index-slide') --}}
        <h2>TEST 5</h2>
        <p>TEST DESCRIPCION 5</p>
      </div>
      <div class="swiper-slide">
        {{-- @include('tasks.index-slide') --}}
        <h2>TEST 6</h2>
        <p>TEST DESCRIPCION 6</p>
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var swiper = new Swiper('#swiper-panel', {
      direction: 'horizontal',
      loop: true, // Activar el bucle infinito
      slidesPerView: 1, // Mostrar solo un panel a la vez
      centeredSlides: true, // Centrar el panel activo
      slidesOffsetBefore: 30, // Desplazar el slide activo inicialmente fuera de la vista
      pagination: {
        el: '.swiper-pagination',
      },
    });
  });
</script>
<style type="text/css">
.swiper-slide:not(.swiper-slide-active) {
/*  display: none;*/
}
</style>
@endsection