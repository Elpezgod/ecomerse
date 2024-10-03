@extends('adminlte::page')

@section('title', 'Gestión de Horarios')

@section('content_header')
    <h2 class="text-center"><b>Gestión de Horarios</b></h2>
@stop

@section('content')
    <div class="container">
        <!-- Gestión de Horarios -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Lista de Horarios -->
                        <h4>Horarios Actuales</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trabajador</th>
                                    <th>Día</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                    @php
                                        $trabajador = $trabajadores->where('id', $horario->trabajador_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $horario->id }}</td>
                                        <td>{{ $trabajador ? $trabajador->name : 'Desconocido' }}</td>
                                        <td>{{ $horario->dia }}</td>
                                        <td>{{ $horario->hora_inicio }}</td>
                                        <td>{{ $horario->hora_fin }}</td>
                                        <td>
                                            <!-- Enlace para editar -->
                                            <a href="/horarios/edit/{{ $horario->id }}" class="btn btn-warning btn-sm">Editar</a>

                                            <!-- Formulario para eliminar -->
                                            <form action="/horarios/eliminar/{{ $horario->id }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Formulario para agregar un nuevo horario -->
                        <h4>Agregar Nuevo Horario</h4>
                        <form action="/horarios/agregar" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Trabajador:</label>
                                <select name="trabajador_id" class="form-control" required>
                                    <option value="">Seleccione un trabajador</option>
                                    @foreach($trabajadores as $trabajador)
                                        <option value="{{ $trabajador->id }}">{{ $trabajador->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Día:</label>
                                <input type="text" name="dia" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio:</label>
                                <input type="time" name="hora_inicio" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Hora Fin:</label>
                                <input type="time" name="hora_fin" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar</button>
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
