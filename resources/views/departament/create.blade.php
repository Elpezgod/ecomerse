@extends('adminlte::page')

@section('title', 'Crear departamento')

@section('content_header')
    <h2 class="text-center"><b>AGREGAR DEPARTAMENTO</b></h2>
@stop

@section('content')
    <div class="card" >
        <div class="card-body">
            <form method="POST" action="{{route('departament.store')}}">
                @csrf
                {{-- sirve para evitar actos mal intencionados --}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Nombre del departamento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                        @error('name')
                        <span class="text-danger">
                            <span>*{{$message}}</span>
                        </span>
                    @enderror
                    </div>
                    
                </div>

                <div class="text-center">
                    <input type="submit" value="Crear departamento" class="btn btn-primary">
                    <a href="{{ route('departament.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>                
            </form>
        </div>
    </div>
    
@stop