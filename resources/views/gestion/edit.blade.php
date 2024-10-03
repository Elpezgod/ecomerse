@extends('adminlte::page')

@section('title', 'Editar Horario')

@section('content_header')
    <h2 class="text-center"><b>Editar Horario</b></h2>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Formulario para editar el horario -->
                        <form action="/horarios/editar/{{ $horario->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Trabajador:</label>
                                <select name="trabajador_id" class="form-control" required>
                                    @foreach($trabajadores as $trabajador)
                                        <option value="{{ $trabajador->id }}" {{ $trabajador->id == $horario->trabajador_id ? 'selected' : '' }}>
                                            {{ $trabajador->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Día:</label>
                                <input type="text" name="dia" class="form-control" value="{{ $horario->dia }}" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio:</label>
                                <input type="time" name="hora_inicio" class="form-control" value="{{ $horario->hora_inicio }}" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Fin:</label>
                                <input type="time" name="hora_fin" class="form-control" value="{{ $horario->hora_fin }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
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
