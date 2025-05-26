@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de niveles</b></h1>
    <hr>


@stop

@section('content')
    <!-- Fila principal del grid de Bootstrap -->

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Niveles registrados</h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            Crear un nuevo nivel
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: blue; color:white;">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo nivel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> <!-- ícono de cerrar -->
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/niveles/create') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nombre del nivel</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i
                                                                        class="fas fa-layer-group"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="nombre_create"
                                                                value="{{ old('nombre_create') }}" placeholder="Escriba aqui..."
                                                                required id="">
                                                        </div>
                                                        @error('nombre_create')
                                                            <small style="color: red">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
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
                            @foreach ($niveles as $nivel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nivel->nombre }}</td>
                                    <td class="text">
                                        <!--CREAMOS UN MODANL PARA EDITAR-->
                                        <!-- Agregamos botenes de accion como borrar/editar-->
                                        <div class="row d-flex justify-content-center">
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#ModalEdit{{ $nivel->id }}">
                                                <i class="fas fa-pencil-alt"></i> Editar
                                            </button>

                                            <!-- BOTON PARA ELIMINAR NIVEL !-->
                                            <form action="{{ url('/admin/niveles/' . $nivel->id) }}" method="POST"
                                                id="miFormulario{{ $nivel->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $nivel->id }}(event)">
                                                    <i class="fas fa-trash"></i>Eliminar
                                                </button>
                                            </form>
                                        </div>

                                        <!-- creamos un script para preguntarle al usuario si esta seguro que desea eliminar el nivel seleccionado!-->
                                        <script>
                                            function preguntar{{ $nivel->id }}(event) {
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
                                                        // JavaScript para enviar el formulario
                                                        document.getElementById('miFormulario{{ $nivel->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>

                                        <div class="modal fade" id="ModalEdit{{ $nivel->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: blue; color:white;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Nivel
                                                            seleccionado</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span> <!-- ícono de cerrar -->
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/admin/niveles/' . $nivel->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Nombre del nivel</label><b>
                                                                            (*)
                                                                        </b>
                                                                        <div class="input-group mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"> <i
                                                                                        class="fas fa-layer-group"></i></span>
                                                                            </div>
                                                                            <!--BUSCAMOS EL NOMBRE VIEJO PARA QUE LO MUESTRE EN EL FORMULARIO!-->
                                                                            <input type="text" class="form-control"
                                                                                name="nombre"
                                                                                value="{{ old('nombre', $nivel->nombre) }}"
                                                                                placeholder="Escriba aqui..." required
                                                                                id="">
                                                                        </div>
                                                                        @error('nombre')
                                                                            <small
                                                                                style="color: red">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-success">Guardar
                                                                    cambios</button>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
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
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @if (session('modal_id'))
                    $('#ModalUpdate{{ session('modal_id') }}').modal('show');
                @else
                    $('#ModalCreate').modal('show');
                @endif
            });
        </script>
    @endif

@stop
