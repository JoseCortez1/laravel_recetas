@extends('layouts.app')
@section('buttons')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection
@section('content')

    <h2>Crear Receta</h2>
    <div class="row justify-content-center mt-8">
        <div class="col-md-8">
            <form action="{{route('receta.store')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input 
                        type="text"
                        name="titulo" 
                        id="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror " 
                        placeholder="Titul receta"
                        value={{old('titulo')}}
                    >

                    @error('titulo')
                        <div class="invalid-feedback d-block " role="alert">
                            <strong>{{$message}}</strong>
                        </div>                    
                     @enderror
                </div>
                
                <input type="submit" value="Agregar Formulario" class="btn btn-primary">
              
            </form>
        </div>
    </div>

@endsection
