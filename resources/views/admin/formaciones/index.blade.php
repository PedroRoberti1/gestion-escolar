@extends('adminlte::page')

@section('content_header')
    <h1><b>Formacion del personal {{ $personal->tipo }}</b></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ url('/admin/personal/' . $personal->tipo) }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="foto">Fotografia</label>



                                <center>
                                    <img id="preview" src="{{ url($personal->foto) }}" alt="imagen de perfil"
                                        class="img-fluid img-thumbnail" style= "max-width: 200px; margin-top: 10px">

                                </center>

                                @error('foto')
                                    <small style="color: red"> {{ $message }}</small>
                                @enderror
                            </div>
                            <script>
                                const mostrarImagen = e =>
                                    document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                            </script>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>

                                            <select name="rol" id="" class="form-control" disabled>
                                                <option value="">
                                                    {{ $personal->usuario->roles->pluck('name')->implode(', ') }}</option>
                                                {{-- Iteramos sobre todos los roles disponibles --}}

                                            </select>
                                        </div>
                                        @error('rol')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="nombres" id="nombres"
                                                value="{{ old('nombres', $personal->nombres) }}""
                                                placeholder="Ingrese nombres..." disabled>
                                        </div>

                                        @error('nombres')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellidos</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-friends"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                value="{{ old('apellidos', $personal->apellidos) }}""
                                                placeholder="Ingrese apellidos..." disabled>
                                        </div>

                                        @error('apellidos')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Cedula de identidad</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-id-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="ci" id="ci"
                                                value="{{ old('ci', $personal->ci) }}"" placeholder="Ingrese CI..."
                                                disabled>
                                        </div>

                                        @error('ci')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-friends"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                id="fecha_nacimiento"
                                                value="{{ old('fecha_nacimiento', $personal->fecha_nacimiento) }}""
                                                placeholder="Ingrese Fecha de nacimiento..." disabled>
                                        </div>

                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Direccion</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-friends"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" id="direccion"
                                                value="{{ old('direccion', $personal->direccion) }}""
                                                placeholder="Ingrese direccion de su domicilio" disabled>
                                        </div>

                                        @error('direccion')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Telefono</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="telefono" id="telefono"
                                                value="{{ old('telefono', $personal->telefono) }}""
                                                placeholder="Ingrese un telefono" disabled>
                                        </div>

                                        @error('telefono')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Profesion</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-briefcase"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="profesion" id="profesion"
                                                value="{{ old('profesion', $personal->profesion) }}""
                                                placeholder="Ingrese una profesion" disabled>
                                        </div>

                                        @error('profesion')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gmail</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="{{ old('email', $personal->usuario->email) }}""
                                                placeholder="Ingrese un gmail" disabled>
                                        </div>

                                        @error('email')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <br>
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formaciones registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/personal/'.$personal->id.'/formaciones/create') }}" method="post"
                            class="btn btn-primary">Crear una nueva formacion para el personal seleccionado</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Nro</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Institucion</th>
                                <th class="text-center">Nivel</th>
                                <th class="text-center">Fecha de graduacion</th>
                                <th class="text-center">Foto titulo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Iteramos sobre todos los niveles pasados desde el controlador -->
                            @foreach ($formaciones as $formacion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $formacion->titulo }}</td>
                                    <td>{{ $formacion->institucion }}</td>
                                    <td>{{ $formacion->nivel }}</td>
                                    <td>{{ $formacion->fecha_graduacion }}</td>
                                    <td style="text-align: center">
                                        <a href="{{url($formacion->archivo)}}" target="_blank">Ver archivo</a>
                                    </td>
                                    <td class="text">
                                        <div class="row d-flex justify-content-center">

                                            <a href="{{ url('/admin/personal/formaciones/' . $formacion->id) }}"
                                                class="btn btn-success btn-sm"> <i
                                                    class="fas fa-pencil-alt"></i>Editar</a>

                                            <form action="{{ url('/admin/personal/formaciones/' . $formacion->id) }}" method="POST"
                                                id="miFormulario{{ $formacion->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $formacion->id }}(event)">
                                                    <i class="fas fa-trash"></i>Eliminar
                                                </button>
                                            </form>
                                            <script>
                                                function preguntar{{ $formacion->id }}(event) {
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
                                                            document.getElementById('miFormulario{{ $formacion->id }}').submit();
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
                <!-- /.card -->
            </div>
        </div>
    @stop

    @section('css')
        <style>
            #example1_wrapper .dt-buttons {
                background-color: transparent;
                box-shadow: none;
                border: none;
                display: flex;
                justify-content: center;
                /*Botones centrados*/
                gap: 10px;
                /*Espaciado entre botones */
                margin-bottom: 15px;
                /*Separar botones de la tabla */
            }

            /*Estilo personalizado para Los botones */

            #example1_wrapper .btn {
                color: #fff;
                /* Color del text */
                border-radius: 4px;
                /*Bordes redondeados */
                padding: 5px 15px;
                /*Espaciado interno */
                font-size: 14px;
                /* Tamaño de fuente */
            }

            /* Colores por tipo de boton */

            .btn-danger {
                background-color: red;
                border: none;
            }

            .btn-success {
                background-color: green;
                border: none;
            }

            .btn-info {
                background-color: aqua;
                border: none;
            }

            .btn-warning {
                background-color: yellow;
                color: black;
                border: none;
            }

            .btn-default {
                background-color: cadetblue;
                color: black;
                border: none;
            }
        </style>
    @stop

    @section('js')
        <script>
            $(function() {
                $("#example").DataTable({
                    "pageLength": 5,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Formaciones",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Formaciones",
                        "infoFiltered": "(Filtrado de _MAX_ total Formaciones)",
                        "lengthMenu": "Mostrar _MENU_ Formaciones",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    buttons: [{
                            text: '<i class="fas fa-copy"></i> COPIAR',
                            extend: 'copy',
                            className: 'btn btn-default'
                        },
                        {
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            extend: 'pdf',
                            className: 'btn btn-danger'
                        },
                        {
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            extend: 'csv',
                            className: 'btn btn-info'
                        },
                        {
                            text: '<i class="fas fa-file-excel"></i> EXCEL',
                            extend: 'excel',
                            className: 'btn btn-success'
                        },
                        {
                            text: '<i class="fas fa-print"></i> IMPRIMIR',
                            extend: 'print',
                            className: 'btn btn-warning'
                        },
                    ]
                }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>
    @stop
