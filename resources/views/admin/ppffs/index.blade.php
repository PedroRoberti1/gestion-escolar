@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de padres de familia</b></h1>
    <hr>


@stop

@section('content')
    <!-- Fila principal del grid de Bootstrap -->

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Padres registrados</h3>
                    <div class="card-tools">

                        <div class="card-tools">
                            <a href="{{ url('/admin/ppffs/create') }}" method="post" class="btn btn-primary">Crear
                                nuevo</a>
                        </div>




                    </div>
                    <!-- /.card -->

                </div>
                <div class="card-body">
                    <!-- Tabla con estilos de Bootstrap y DataTables -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Nro</th>
                                    <th class="text-center">Padre de familia</th>
                                    <th class="text-center">Carnet de identidad</th>
                                    <th class="text-center">Fecha de nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Parentesco</th>
                                    <th class="text-center">Ocupacion</th>
                                    <th class="text-center">Direccion</th>

                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Iteramos sobre todos los niveles pasados desde el controlador -->
                                @foreach ($ppffs as $ppff)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ppff->apellidos }} {{ $ppff->nombres }}</td>
                                        <td>{{ $ppff->ci }}</td>
                                        <td>{{ $ppff->fecha_nacimiento }}</td>
                                        <td>{{ $ppff->telefono }}</td>
                                        <td>{{ $ppff->parentesco }}</td>
                                        <td>{{ $ppff->ocupacion }}</td>
                                        <td>{{ $ppff->direccion }}</td>
                                        <td class="text">
                                            <div class="row d-flex justify-content-center">

                                                <a href="{{ url('/admin/ppffs/' . $ppff->id) }}"
                                                    class="btn btn-grey btn-sm"> <i
                                                        class="fas fa-eye"></i>Ver</a>

                                                <a href="{{ url('/admin/ppffs/' . $ppff->id . '/edit') }}"
                                                    class="btn btn-success btn-sm"> <i
                                                        class="fas fa-pencil-alt"></i>Editar</a>

                                                <form action="{{ url('/admin/ppffs/' . $ppff->id) }}" method="POST"
                                                    id="miFormulario{{ $ppff->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $ppff->id }}(event)">
                                                        <i class="fas fa-trash"></i>Eliminar
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $ppff->id }}(event) {
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
                                                                document.getElementById('miFormulario{{ $ppff->id }}').submit();
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Padres de familia",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                    "infoFiltered": "(Filtrado de _MAX_ total Padres de familia)",
                    "lengthMenu": "Mostrar _MENU_ Padres de familia",
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
