@extends('adminlte::page')

@section('content_header')
    <h1><b>Editar el estudiante seleccionado</b></h1>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos del padre de familia en el formulario</h3>
                    <div class="card-tools">
                        <button type="modal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalPadre">
                            <i class="fas fa-search"></i>Buscar padre de familia
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalPadre" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padres de familia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table id="example"
                                                class="table table-bordered table-striped table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Nro</th>
                                                        <th class="text-center">Apellidos y nombres</th>
                                                        <th class="text-center">Carnet de identidad</th>
                                                        <th class="text-center">Fecha de nacimiento</th>
                                                        <th class="text-center">Teléfono</th>
                                                        <th class="text-center">Parentesco</th>
                                                        <th class="text-center">Ocupacion</th>
                                                        <th class="text-center">Dirección</th>
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
                                                            <td style="text-aling: center">
                                                                <button class="btn btn-info btn-seleccionar"
                                                                    data-id="{{ $ppff->id }}"
                                                                    data-nombres="{{ $ppff->nombres }}"
                                                                    data-apellidos="{{ $ppff->apellidos }}"
                                                                    data-ci="{{ $ppff->ci }}"
                                                                    data-fecha_nacimiento="{{ $ppff->fecha_nacimiento }}"
                                                                    data-telefono="{{ $ppff->telefono }}"
                                                                    data-parentesco="{{ $ppff->parentesco }}"
                                                                    data-ocupacion="{{ $ppff->ocupacion }}"
                                                                    data-direccion="{{ $ppff->direccion }}">Seleccionar</button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalCreatePpff">Crear nuevo ppff
                                        </button>
                                        <div class="modal fade" id="modalCreatePpff" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:blue;color:#fff">
                                                        <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo
                                                            PPFF</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/admin/estudiantes/ppff/create') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Nombres</label>
                                                                        <input type="text" class="form-control"
                                                                            name="nombres" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Apellidos</label>
                                                                        <input type="text" class="form-control"
                                                                            name="apellidos" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Carnet de identidad</label>
                                                                        <input type="text" class="form-control"
                                                                            name="ci" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Fecha de nacimiento</label>
                                                                        <input type="date" class="form-control"
                                                                            name="fecha_nacimiento" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Telefono</label>
                                                                        <input type="text" class="form-control"
                                                                            name="telefono" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Parentesco</label>
                                                                        <input type="text" class="form-control"
                                                                            name="parentesco">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Ocupacion</label>
                                                                        <input type="text" class="form-control"
                                                                            name="ocupacion">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Direccion</label>
                                                                        <input type="text" class="form-control"
                                                                            name="direccion">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Registrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="datos_ppff">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <p id="nombres">{{$estudiante->ppff->nombres}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p id="apellidos">{{$estudiante->ppff->apellidos}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Carnet de identidad</label>
                                <p id="ci">{{$estudiante->ppff->ci}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <p id="fecha_nacimiento">{{$estudiante->ppff->fecha_nacimiento}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <p id="telefono">{{$estudiante->ppff->telefono}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Parentesco</label>
                                <p id="parentesco">{{$estudiante->ppff->parentesco}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ocupacion</label>
                                <p id="ocupacion">{{$estudiante->ppff->ocupacion}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <p id="direccion">{{$estudiante->ppff->direccion}}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <hr>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos del estudiante en el formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/estudiantes/'.$estudiante->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                            <input type="text" name="ppff_id" id="ppff_id" value="{{$estudiante->ppff->id}}"hidden>
                       
                        <div class="row">
                            <div class="col-md-4 position-relative" style="padding-bottom: 110px;">
                                <!-- altura fija para reservar espacio -->
                                <div class="form-group">
                                    <label for="foto">Fotografía</label>
                                    <input type="file" class="form-control" name="foto"
                                        onchange="mostrarImagen(event)" accept="image/*" >

                                    <!-- Vista previa flotante sin afectar el flujo -->
                                    <img id="preview" src="{{url($estudiante->foto)}}" alt="Vista previa"
                                        style="
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100px;
                height: 100px;
                object-fit: cover;
                padding: 2px;
                
                pointer-events: none; /* para que no interfiera con clicks */
                ">
                                    @error('foto')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <script>
                                const mostrarImagen = e =>
                                    document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                            </script>



                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Nombre del rol</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-check"></i>
                                            </span>
                                        </div>
                                        <select name="rol" id="rol" class="form-control" readonly>
                                            <option value="">Seleccione un rol...</option>
                                            @foreach ($roles as $rol)
                                                @if ($rol->name == 'ESTUDIANTE')
                                                    <option value="{{ $rol->name }}"
                                                        {{ $rol->name == 'ESTUDIANTE' ? 'selected' : '' }}>
                                                        {{ $rol->name }}</option>
                                                @else
                                                @endif
                                            @endforeach
                                            <option value="">NO EXISTE EL ROL ESTUDIANTE</option>
                                        </select>
                                    </div>

                                    @error('rol')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Apellidos</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-friends"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{ old('apellidos', $estudiante->apellidos) }}"" placeholder="Ingrese apellidos..." required>
                                    </div>

                                    @error('apellidos')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Nombre</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-friends"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres"
                                            value="{{ old('Nombre', $estudiante->nombres) }}"" placeholder="Ingrese Nombres..." required>
                                    </div>

                                    @error('Nombre')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Cedula de identidad</label><b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci"
                                            value="{{ old('ci', $estudiante->ci) }}"" placeholder="Ingrese CI..." required>
                                    </div>

                                    @error('ci')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="offset-md-4 col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}""
                                                placeholder="Ingrese Fecha de nacimiento..." required>
                                        </div>

                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Direccion</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" id="direccion"
                                                value="{{ old('direccion', $estudiante->direccion) }}""
                                                placeholder="Ingrese direccion de su domicilio" required>
                                        </div>

                                        @error('direccion')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Genero</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <select name="genero" id="genero" class="form-control">
                                                <option value="masculino" {{$estudiante->genero== "masculino" ? 'selected':''}}>Masculino</option>
                                                <option value="femenino" {{$estudiante->genero== "femenino" ? 'selected':''}}>Femenino</option>
                                            </select>
                                        </div>

                                        @error('direccion')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
                                                value="{{ old('telefono', $estudiante->telefono) }}"" placeholder="Ingrese un telefono"
                                                required>
                                        </div>

                                        @error('telefono')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Gmail</label><b>(*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="{{ old('email', $estudiante->usuario->email) }}"" placeholder="Ingrese un gmail" required>
                                        </div>

                                        @error('email')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{url('/admin/estudiantes/')}}" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>Actualizar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
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

            $('.btn-seleccionar').click(function() {
                var nombres = $(this).data('nombres');
                var apellidos = $(this).data('apellidos');
                var ci = $(this).data('ci');
                var fecha_nacimiento = $(this).data('fecha_nacimiento');
                var telefono = $(this).data('telefono');
                var parentesco = $(this).data('parentesco');
                var ocupacion = $(this).data('ocupacion');
                var direccion = $(this).data('direccion');
                var id = $(this).data('id');

                $('#nombres').html(nombres);
                $('#apellidos').html(apellidos);
                $('#ci').html(ci);
                $('#fecha_nacimiento').html(fecha_nacimiento);
                $('#telefono').html(telefono);
                $('#parentesco').html(parentesco);
                $('#ocupacion').html(ocupacion);
                $('#direccion').html(direccion);
                $('#ppff_id').val(id);

                $('#datos_ppff').css('display', 'block');
                $('#modalPadre').modal('hide')

            });
            $("#example").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Ppffs",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(Filtrado de _MAX_ registros Personal)",
                    "lengthMenu": "Mostrar _MENU_ registros",
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

            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
