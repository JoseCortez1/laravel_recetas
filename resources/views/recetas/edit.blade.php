
@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />
@endsection
@section('buttons')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection
@section('content')
    <h2 class="text-center ">Editar Receta: {{$receta->titulo}}</h2>
    <div class="row justify-content-center mt-8">
        <div class="col-md-8">
            <form action="{{route('receta.update', ['receta' => $receta->id])}}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input 
                        type="text"
                        name="titulo" 
                        id="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror " 
                        placeholder="Titul receta"
                        value="{{$receta->titulo}}"
                    >

                    @error('titulo')
                        <div class="invalid-feedback d-block " role="alert">
                            <strong>{{$message}}</strong>
                        </div>                    
                     @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select 
                    name="categoria" 
                    id="categoria" 
                    class="form-control @error('categoria') is-invalid @enderror "
                    >
                        <option value="">--Selecciona Categoria--</option>
                        @foreach($categorias as $value)
                            
                            <option value="{{$value->id}}" {{ $receta->categoria_id == $value->id ? 'selected' : '' }}>{{$value->categoria}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                    <div class="invalid-feedback d-block " role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                        
                    @enderror
                </div>
                <div class="form-group bg-white p-2 rounded   ">
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion"  id="preparacion" value="{{$receta->preparacion}}">
                    <trix-editor class="form-control @error('preparacion') is-invalid @enderror " input='preparacion'></trix-editor>
                    @error('preparacion')
                    <div class="invalid-feedback d-block " role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                        
                    @enderror
                </div>
                <div class="form-group bg-white p-2 rounded">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes"  id="ingredientes" value={{$receta->ingredientes}}>
                    <trix-editor class="form-control @error('ingredientes') is-invalid @enderror " input='ingredientes'></trix-editor>
                    @error('ingredientes')
                    <div class="invalid-feedback d-block " role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                        
                    @enderror
                </div>
                <div class="imagen-new">
                    <p>Imagen Actual:</p>
                    <img src="/storage/{{$receta->imagen}}" style="width: 300px; margin-bottom: 10px" alt="">
                </div>
                <div class="form-group">
    
                    <label for="imagen">Cambiar Imagen:</label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen" 
                        class="form-control  @error('imagen') is-invalid @enderror">
                </div>
                <input type="submit" value="Agregar Formulario" class="btn btn-primary">
              
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix-core.js" integrity="sha256-Izv+4s2m7lwiTytbg7XUbl+xftR6ZEOb1Im9HOLF20M=" crossorigin="anonymous"></script>
@endsection
