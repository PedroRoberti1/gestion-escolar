@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de PARALELOS</b></h1>
    <hr>


@stop

@section('content')
    <!-- Fila principal del grid de Bootstrap -->

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Paralelos registrados</h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            Crear un nuevo Paralelo
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: blue; color:white;">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo paralelo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> <!-- ícono de cerrar -->
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.paralelos.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Grado al que pertenece</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i
                                                                        class="fas fa-list-alt"></i></span>
                                                            </div>
                                                            <select name="grado" class="form-control" id="grado_id_create"
                                                                required>
                                                                <option value="">Seleccione un nuevo grado</option>
                                                                @foreach ($grados as $grado)
                                                                    <option value="{{ $grado->id }}">
                                                                        {{ $grado->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('nombre_create')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nombre del Paralelo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i
                                                                        class="fas fa-clone"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="nombre_create"
                                                                value="{{ old('nombre_create') }}"
                                                                placeholder="Escriba aqui..." required id="">
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
                                                <button type="submit" class="btn btn-primary">Guardar
                                                    cambios</button>
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
                                <th>Grados</th>
                                <th>Paralelos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($grados as $grado)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $grado->nombre }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            @foreach ($grado->paralelos as $paralelo)
                                                <div class="d-flex gap-1 mb-1">
                                                    <button class="btn btn-info btn-sm">{{ $paralelo->nombre }}</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            @foreach ($grado->paralelos as $paralelo)
                                                <div class="d-flex mb-1">
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal" data-target="#ModalEdit{{ $paralelo->id }}">
                                                        <i class="fas fa-pencil-alt"></i>Editar
                                                    </button>
                                                    <form action="{{ url('/admin/paralelos/' . $paralelo->id) }}"
                                                        method="POST" id="formularioPedro{{ $paralelo->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="preguntar{{ $paralelo->id }}(event)"> <i
                                                                class="fas fa-trash-alt"></i>Eliminar</button>
                                                    </form>
                                                </div>
                                                <script>
                                                    function preguntar{{ $paralelo->id }}(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: '¿Desea eliminar este registro',
                                                            text: '',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result)=>{
                                                            if(result.isConfirmed){
                                                                document.getElementById('formularioPedro{{ $paralelo->id}}').submit();
                                                            }
                                                        });

                                                    }
                                                </script>

                                                <div class="modal fade" id="ModalEdit{{ $paralelo->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background: rgb(255, 0, 0); color:white;">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar
                                                                    Paralelo
                                                                    seleccionado</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    <!-- ícono de cerrar -->
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ url('/admin/paralelos/' . $paralelo->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del
                                                                                    paralelo</label><b>
                                                                                    (*)
                                                                                </b>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"> <i
                                                                                                class="fas fa-clone"></i></span>
                                                                                    </div>
                                                                                    <!--BUSCAMOS EL NOMBRE VIEJO PARA QUE LO MUESTRE EN EL FORMULARIO!-->
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="paralelo_update"
                                                                                        value="{{ old('nombre', $paralelo->nombre) }}"
                                                                                        placeholder="Escriba aqui..."
                                                                                        required id="">
                                                                                </div>
                                                                                <label for="">Grado al que pertenece</label><b>
                                                                                    <div class="input-group mb-3">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">
                                                                                                <i
                                                                                                    class="fas fa-university"></i></span>
                                                                                        </div>
                                                                                        <select name="grado_update"
                                                                                            class="form-control"
                                                                                            id="grado_update" required>
                                                                                            <option value="">
                                                                                                Seleccione
                                                                                                una grado, grado actual: {{ old('nombre', $grado->nombre) }} </option>
                                                                                            @foreach ($grados as $grado)
                                                                                                <option
                                                                                                    value="{{ $grado->id }}">
                                                                                                    {{ $grado->nombre }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>

                                                                                        @error('nombre')
                                                                                            <small
                                                                                                style="color: red">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Guardar
                                                                            cambios</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


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
