@extends('adminlte::page')

@section('title', 'Ver cliente')

@section('content_header')
    <h2 class="text-center"><b>DATOS DE CLIENTE</b></h2>
@stop

@section('content')
<style>
    .img-panel:hover {
        transform: scale(1.5); 
        transition: transform 0.3s ease; 
    }
</style>

<div class="card">

    <div class="card-body">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    {{-- <th>Departamentos</th> --}}
                    <th>Correo</th>
                    <th>Foto</th>
                </tr>
            </thead>
                    <tr>
                        <td>{{$usuarios->name}}</td>
                        {{-- <td>
                            @foreach ($departaments as $departament){
                                {$departament->name}
                                @if (!$loop->last){{', '}}@endif
                                    
                                @endif
                            }
                            @endforeach
                        </td> --}}
                        <td>{{$usuarios->email}}</td>
                        <td>
                            <div class="img-boton">
                                @if ($usuarios->photo == NULL)
                                    <img src="{{asset('img/perfil.jpg')}}" class="img-panel" style="width: 60px; height: 60px;">
                                @else
                                    <img src="{{asset('storage/' . $usuarios->photo)}}" class="img-panel" style="width: 60px; height: 60px;">
                                @endif
                            </div>
                        </td>
                    </tr>
        </table>

        <div class="text-center">
            <br>
            <a href="{{route('usuarios.index')}}" class="btn btn-secondary">Volver</a>
        </div>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Foto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    @if ($usuarios->photo == NULL)
        <img src="{{asset('img/perfil.jpg')}}" class="img-panel" style="width: 100%; height: auto;">
    @else
        <img src="{{asset('storage/' . $usuarios->photo)}}" class="img-panel" style="width: 100%; height: auto;">
    @endif
</div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

    </div>

</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/photo/photo.css')}}"
@stop


@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop