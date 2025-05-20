@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de gestiones educativas</b></h1>
    <hr>
    <a href="{{ url('/admin/gestiones/create') }}" class="btn btn-primary">Crear nueva gestion</a>

@stop

@section('content')
    <!-- Fila principal del grid de Bootstrap -->
    <div class="row">

        @foreach ($gestiones as $gestion)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info box zoomP d-flex align-items-center">
                    <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="" class="me-3">
                    <div class="info-box-content">
                        <span class="info-box-text"> <b>Gestiones Educativa</b></span>
                        <br>
                        <span class="info-box-number" style="color: blue;font-size:20pt">{{ $gestion->nombre }}</span>
                        <br>
                        <div class="row">
                            <a href="{{ url('/admin/gestiones/' . $gestion->id . '/edit') }}" class="btn btn-success btn-sm"><i
                                    class="fas fa-pencil-alt"></i>Editar</a>

                            <form action="{{url('/admin/gestiones/'. $gestion->id)}}" method="post" id="miFormulario{{$gestion->id}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick= "preguntar{{$gestion->id}}(event)">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>

                            <script>
                                function preguntar{{$gestion->id}}(event) {
                                    event.preventDefault();

                                    Swal.fire({
                                        title: '¿Desea eliminar este registro?',
                                        text: '',
                                        icon: 'question',
                                        showDenyButton: true,
                                        confirmButtonText: 'Eliminar',
                                        confirmButtonColor: '#a5161d',
                                        denyButtonColor: '#270a0a',
                                        denyButtonText: 'Cancelar',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // JavaScript puro para enviar el formulario
                                            document.getElementById('miFormulario{{$gestion->id}}').submit();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
