@extends('layouts.app')
@section('buttons')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection
@section('content')

    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <th class="col">Titulo</th>
                <th class="col">Categoría</th>
                <th class="col">Acciones</th>
            </thead>
            <tbody >
               <td>Pizzas</td>
               <td>Pizzas</td>
               <td>Pizzas</td>
            </tbody>
        </table>
    </div>

@endsection
