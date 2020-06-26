@extends('layouts.app')
@section('buttons')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <th scole="col">Titulo</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </thead>
            @foreach($recetas->reverse() as $receta)
                <tbody >
                    <td>{{$receta->titulo}}</td>
                    <td>{{$receta->categoria->categoria}}</td>
                    <td class="row">
                        <eliminar-receta class="col-sm" receta-titulo="{{$receta->titulo}}" receta-id={{$receta->id}}></eliminar-receta>
                        
                        <a href="{{route('receta.edit', ['receta'=>$receta->id])}}" class=" col-sm btn btn-dark mr-1">Editar</a>
                        <a href="{{route('receta.show', ['receta'=>$receta->id])}}" class="col-sm btn btn-success mr-1">Ver</a>
                    </td>
                </tbody>
                
            @endforeach
        </table>
    </div>

@endsection
