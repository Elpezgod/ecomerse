@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content_header')
    <h2 class="text-center"><b>DEPARTAMENTOS</b></h2>
@stop

@section('content')
    @if (session('success-create'))
        <div class="alert alert-primary text-center">
            {{session('success-create')}}
        </div>
        @elseif(session('success-update'))
        <div class="alert alert-primary text-center">
            {{session('success-update')}}
        </div>
        @elseif(session('success-delete'))
        <div class="alert alert-warning text-center">
            {{session('success-delete')}}
        </div>
    @endif
    <div class="card">
    <div class="card-header container" >
        <div class="row">
            <div class="col-lg-6 col-mb-6 col-sm-12">
                <a href="{{route('departament.create')}}" class="btn btn-primary"><b>Agregar departamento</b></a>
            </div>
            <div class="col-lg-6 col-mb-6 col-sm-12">
                <form action="{{route('departament.index')}}" method="GET">
                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <input type="text" name="filterValue" placeholder="Buscar por nombre de departamento" class="form-control rounder border-primary text-secondary">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-info"><b>Buscar</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Nombre del departamento</th>
                    <th>Estatus</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departaments as $departaments)
                <tr>
                    <td>{{$departaments->name}}</td>
                    <td>{{$departaments->estatus ? 'Activado' : 'Desactivado'}}</td>
                    <td width="5px">
                        <a href="{{route('departament.edit', $departaments)}}" class="btn btn-primary btn-sm mb-2">Editar</a>
                    </td>
                    <td width="5px">
                        <form action="{{route('departament.toggleStatus', $departaments)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="{{$departaments->estatus ? 'Desactivar' : 'Activar'}}" class="btn btn-warning btn-sm">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
{{-- 
        <div class="text-center mt-3">
            {{$departaments->links()}}
        </div>         --}}
    </div>

    </div>
@stop
