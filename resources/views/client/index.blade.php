@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h2 class="text-center"><b>CLIENTES</b></h2>
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
                    <a href="{{route('client.create')}}" class="btn btn-primary"><b>Agregar Cliente</b></a>
                </div>
                <div class="col-lg-6 col-mb-6 col-sm-12">
                    <form action="{{route('usuarios.index')}}" method="GET">
                        <div class="mb-3 row">
                            <div class="col-sm-9">
                                <input type="text" name="filterValue" placeholder="Buscar por nombre de usuario" class="form-control rounder border-primary text-secondary">
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
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th class="text-center" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuarios)
                    <tr>
                        <td>{{$usuarios->name}}</td>
                        <td>{{$usuarios->email}}</td>

                        <td width="2px">
                            <a href="{{route('client.show', $usuarios)}}" class="btn btn-primary btn-sm mb-2">Mostar</a>
                        </td>
                        <td width="5px">
                            <a href="{{route('client.edit', $usuarios)}}" class="btn btn-primary btn-sm mb-2">Editar</a>
                        </td>
                        <td width="5px">
                            <form action="{{route('usuarios.destroy', $usuarios)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
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

