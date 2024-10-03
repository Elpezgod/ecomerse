@extends('adminlte::page')

@section('title', 'Editar trabajador')

@section('content_header')
    <h2 class="text-center"><b>EDITAR TRABAJADOR</b></h2>
@stop

@section('content')
    <div class="card" >
        <div class="card-body">
            <form method="POST" action="{{route('usuarios.update', $usuarios)}}">
                @csrf
                @method('PUT')
                {{-- sirve para evitar actos mal intencionados --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $usuarios->name)}}" required>
                        @error('name')
                        <span class="text-danger">
                            <span>*{{$message}}</span>
                        </span>
                    @enderror
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="departament">Departamentos:</label>
                    <div class="col-sm-10">
                        <select name="departament []" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach ($departaments as $departament)
                                <option value="{{$departament}}">{{$departament->name}}</option>
                            @endforeach
                        </select>
                        @error('departaments')
                        <span class="text-danger">
                            <span>*{{$message}}</span>
                        </span>
                        @enderror
                    </div>
                </div> --}}
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email">Correo:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $usuarios->email)}}" required>
                        @error('email')
                        <span class="text-danger">
                            <span>*{{$message}}</span>
                        </span>
                    @enderror
                    </div>
                    
                </div>



                <div class="text-center">
                    <input type="submit" value="Modificar trabajador" class="btn btn-primary">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>                
            </form>
        </div>
    </div>
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            theme: "classic"
        });
        });</script>
@stop