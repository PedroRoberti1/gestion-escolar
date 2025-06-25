@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Listado de materias</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Materias registradas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            Registrar una nueva materia
                        </button>


                        <div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: blue; color:white;">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de una nueva materia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span> <!-- ícono de cerrar -->
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.materias.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nombre de la materia</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"> <i
                                                                        class="fas fa-list-alt"></i></span>
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

                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Materia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($materias as $materia)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $materia->nombre }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex mb-1">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#ModalEdit{{ $materia->id }}">
                                                    <i class="fas fa-pencil-alt"></i>Editar
                                                </button>
                                                <form action="{{ url('admin/materias/' . $materia->id) }}" method="POST"
                                                    id="preguntarBorrar{{ $materia->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $materia->id }}(event)">
                                                        <i class="fas fa-pencil-alt"></i>Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                            <script>
                                                function preguntar{{ $materia->id }}(event) {
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
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {

                                                            document.getElementById('preguntarBorrar{{ $materia->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                            <div class="modal fade" id="ModalEdit{{ $materia->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background: rgb(115, 255, 0); color:rgb(255, 0, 0);">
                                                            <h5 class="modal-title" id="exampleModalLabel">Editar una materia
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                <!-- ícono de cerrar -->
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/materias/' . $materia->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre de la
                                                                                Materia actual:
                                                                                {{ $materia->nombre }}</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"> <i
                                                                                            class="fas fa-list-alt"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="nombre_update"
                                                                                    value="{{ old('nombre_update', $materia->nombre) }}"
                                                                                    placeholder="Escriba aqui..." required
                                                                                    id="">
                                                                            </div>
                                                                            @if (session('modal_id')==$materia->id && $errors->has('nombre_update'))

                                                                                <small style="color:red">{{$errors->first('nombre_update')}}</small>
                                                                                
                                                                            @endif
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
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @if (session('modal_id'))
                    $('#ModalEdit{{ session('modal_id')}}').modal('show');
                @else
                    $('#ModalCreate').modal('show');
                @endif
            });
        </script>
    @endif

@stop
