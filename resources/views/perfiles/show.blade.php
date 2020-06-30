@extends('layouts.app')

@section('content')


<div class="container bg-white">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-7">
            <h2 class="text-center mb-2 text-primary">
                {{$perfil->usuario->name}}
            </h2>
            <a href="{{$perfil->usuario->url}}">Visita Mi Sitio</a>
            <div class="biografia">
                <h2 class="mt-3 text-primary">Biografia:</h2>
                {!!$perfil->biografia!!}
            </div>
        </div>
    </div>
</div>
@endsection