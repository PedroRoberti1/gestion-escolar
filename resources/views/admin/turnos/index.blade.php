@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de turnos</b></h1>
    <hr>


@stop

@section('content')
    <!-- Fila principal del grid de Bootstrap -->

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Turnos registrados</h3>
                    <div class="card-tools">

                        <div class="card-tools">
                            <a href="{{ url('/admin/turnos/create') }}" method="post" class="btn btn-primary">Crear nuevo
                                turno</a>
                        </div>




                    </div>
                    <!-- /.card -->

                </div>
                <div class="card-body">
                    <!-- Tabla con estilos de Bootstrap y DataTables -->
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <!-- Encabezado de la tabla -->
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Iteramos sobre todos los niveles pasados desde el controlador -->
                            @foreach ($turnos as $turno)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $turno->nombre }}</td>

                                    <td class="text">
                                        <div class="row d-flex justify-content-center">
                                            <a href="{{ url('/admin/turnos/' . $turno->id . '/edit') }}"
                                                class="btn btn-success btn-sm"> <i class="fas fa-pencil-alt"></i>Editar</a>

                                            <form action="{{ url('/admin/turnos/' . $turno->id) }}" method="POST"
                                                id="miFormulario{{ $turno->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $turno->id }}(event)">
                                                    <i class="fas fa-trash"></i>Eliminar
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{ $turno->id }}(event) {
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
                                                            document.getElementById('miFormulario{{ $turno->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
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



@stop
