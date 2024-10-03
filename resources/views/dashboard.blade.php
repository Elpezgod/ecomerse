@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-left">TIENDA MISTHU <img src="{{ asset('img/logo.png')}}" width="60px" height="60px" style="border-radius: 50%;">
                </h1>
            </div>
            <div class="col-6">
                <h1 class="text-right">{{ now()->format('d/m/Y') }}</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="text-center">
        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/perfil.jpg')}}" width="250" height="250" class="rounded-circle">
    </div>
    <br>
    <h5 class="text-center">¡Hola! <b>{{Auth::user()->name}}</b> desde aqui podras administrar y realizar un seguimiento.</h5>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-header text-center">
                    <b>Gestionar horario</b>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img/calendario.png')}}" width="50px" height="50px">
                        <br><br>
                        <a href="{{route('horarios')}}" class="btn btn-info">Ir al panel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-header text-center">
                    <b>Editar perfil</b>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img/gs.png')}}" width="50px" height="50px">
                        <br>
                        <br>
                        <a href="{{ route('perfil') }}" class="btn btn-info">Ir al panel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop