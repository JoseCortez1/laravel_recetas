@extends('layouts.app')

@section('content')
    <article class="container contenido-receta card">
        <h1 class="text-center m-3">{{$receta->titulo}}</h1>
        <div class="imagen-receta">
            <img src="/storage/{{$receta->imagen}}" alt="" class="w-100">

        </div>

        <div class="receta-meta">
            <p>
                <span class="font-weight-bold text-primary">
                    Escrito en:
                </span>
                {{$receta->categoria->categoria}}
            </p>   
            <p>
                <span class="font-weight-bold text-primary">
                    Autor:
                </span>
                {{$receta->userName->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Fecha:
                </span>
                
                <fecha-receta fecha="{{$receta->created_at}}"></fecha-receta>
            </p>       
            
            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $receta->ingredientes !!}
            </div>
            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>
                {!! $receta->preparacion !!}
            </div>
        </div>
    </article>
@endsection