@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />
@endsection
@section('buttons')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection


@section('content')
    <h1 class="text-center">Editar Mi Perfil</h1>
    <div class="row justify-content-center mt-8">
        <div class="col-md-8">
            <form 
                action=" {{route('perfil.update', ['perfil'=> $perfil->id]) }}"
                method="POST" 
                enctype="multipart/form-data"
                >
                @csrf

                @method('put')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input 
                        type="text"
                        name="nombre" 
                        id="nombre" 
                        class="form-control @error('nombre') is-invalid @enderror " 
                        value="{{$perfil->usuario->name   }}"
                    >

                    @error('nombre')
                        <div class="invalid-feedback d-block " role="alert">
                            <strong>{{$message}}</strong>
                        </div>                    
                     @enderror
                </div>

                <div class="form-group">
                    <label for="url">URL</label>
                    <input 
                        type="text"
                        name="url" 
                        id="url" 
                        class="form-control @error('url') is-invalid @enderror " 
                        value="{{$perfil->usuario->url   }}"
                    >

                    @error('url')
                        <div class="invalid-feedback d-block " role="alert">
                            <strong>{{$message}}</strong>
                        </div>                    
                     @enderror
                </div>

                <div class="form-group bg-white p-2 rounded">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia"  id="biografia" value={{$perfil->usuario->biografia}}>
                    <trix-editor class="form-control @error('biografia') is-invalid @enderror " input='biografia'></trix-editor>
                    @error('biografia')
                    <div class="invalid-feedback d-block " role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                        
                    @enderror
                </div>
                @if($perfil->imagen)
                    <div class="imagen-new">
                        <p>Foto Actual:</p>
                        <img src="/storage/{{$perfil->imagen}}" style="width: 300px; margin-bottom: 10px" alt="">
                    </div>
                    
                @endif
                <div class="form-group">
    
                    <label for="imagen">Tu Foto:</label>
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