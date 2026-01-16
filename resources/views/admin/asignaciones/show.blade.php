@extends('adminlte::page')


@section('content_header')
    <h1><b>Asignaciones/Datos de la asignacion de materia del docente</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del docente</h3>
                </div>
                <div class="card-body">




                    <div class="row" id="datos_estudiante">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">fotografia</label>
                                    <center>
                                        <img src="{{ url($asignaciones->personal->foto) }}" width="70%" id="foto"
                                            alt="">
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <p id="apellidos">{{ $asignaciones->personal->apellidos }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p id="nombres">{{ $asignaciones->personal->nombres }}</p>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de identidad</label>
                                            <p id="ci">{{ $asignaciones->personal->ci }}</p>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <p id="fecha_nacimiento">
                                                {{ $asignaciones->personal->fecha_nacimiento }}</p>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <p id="telefono">{{ $asignaciones->personal->telefono }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <p id="direccion">{{ $asignaciones->personal->direccion }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo electronico</label>
                                            <p id="email">{{ $asignaciones->personal->usuario->email }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label>
                                            <p id="profesion">{{ $asignaciones->personal->profesion }}</p>
                                        </div>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formacion academica</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>

                                <tr>
                                    <th class="text-center">Nro</th>

                                    <th>Titulo</th>
                                    <th>Institucion</th>
                                    <th>Nivel</th>
                                    <th>Fecha de graduacion </th>
                                    <th>Archivo</th>





                                </tr>
                            <tbody>
                                @foreach ($asignaciones->personal->formaciones as $datos)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $datos->titulo }}</td>
                                        <td>{{ $datos->institucion }}</td>
                                        <td>{{ $datos->nivel }}</td>
                                        <td>{{ $datos->fecha_graduacion }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ url($datos->archivo) }}" target="_blank">Ver archivo</a>
                                        </td>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">LLene los datos del formulario</h3>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Turnos</label> <b>(*)</b>
                                <p>{{ $asignaciones->turno->nombre }}</p>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gestiones </label> <b>(*)</b>
                                <p>{{ $asignaciones->gestion->nombre }}</p>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Niveles </label> <b>(*)</b>
                                <p>{{ $asignaciones->nivel->nombre }}</p>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Grados </label> <b>(*)</b>
                                <p>{{ $asignaciones->grado->nombre }}</p>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paralelos </label> <b>(*)</b>
                                <p>{{ $asignaciones->paralelo->nombre }}</p>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fecha </label> <b>(*)</b>
                                <p>{{ $asignaciones->fecha_asignacion }}</p>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Materia </label> <b>(*)</b>
                                <p>{{ $asignaciones->materia->nombre }}</p>

                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/asignaciones') }}" class="btn btn-default"> <i
                                        class="fas fa-arrow-left">
                                    </i> Volver</a>

                            </div>
                        </div>
                    </div>

                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>



@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        // Inicializa todos los elementos con clase 'select2' usando el plugin Select2 (para mejorar los select HTML)
        $('.select2').select2({});

        $('#nivel_id').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_grado/') }}/" + id,
                    type: "GET",
                    success: function(grados) {
                        var options = '<option value=""> Seleccione un grado...</option>';
                        $.each(grados, function(key, value) {
                            options += '<option value= "' + key + '">' + value + '</option>';
                        });
                        $('#grados').html(options);
                    },

                    error: function() {
                        alert('No se puede obtener informacion del nivel');
                    }
                });
            } else {
                alert('Seleccione un nivel...')
            }

        });


        $('#grados').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_paralelo/') }}/" + id,
                    type: "GET",
                    success: function(paralelos) {
                        var options = '<option value=""> Seleccione un paralelo...</option>';
                        $.each(paralelos, function(key, value) {
                            options += '<option value= "' + key + '">' + value + '</option>';
                        });
                        $('#paralelos').html(options);
                    },

                    error: function() {
                        alert('No se puede obtener informacion del grado');
                    }
                });
            } else {
                alert('Seleccione un grado...')
            }
        });


        // Agrega un evento al campo con ID 'buscar_estudiante' que se activa cuando se cambia su valor
        $('#buscar_estudiante').on('change', function() {
            // Obtiene el valor seleccionado
            var id = $(this).val();

            // Si hay un valor seleccionado (es decir, no está vacío o null)
            if (id) {
                // Realiza una solicitud AJAX al servidor
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_estudiante/') }}/" + id,
                    type: 'GET',
                    success: function(estudiante) {
                        // Llena los campos con los datos del estudiante
                        $('#apellidos').html(estudiante.apellidos);
                        $('#nombres').html(estudiante.nombres);
                        $('#ci').html(estudiante.ci);
                        $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                        $('#telefono').html(estudiante.telefono);
                        $('#direccion').html(estudiante.direccion);
                        $('#email').html(estudiante.usuario.email);
                        $('#genero').html(estudiante.genero);
                        $('#estudiante_id').val(estudiante.id);
                        $('#datos_estudiante').css('display', 'block');

                        // Muestra la imagen del estudiante
                        $('#foto').attr('src', estudiante.foto_url).show();

                        // Verifica si tiene al menos una matriculación
                        if (estudiante.matriculaciones && estudiante.matriculaciones.length > 0) {
                            var tabla = '<table class="table table-bordered">';
                            tabla +=
                                '<thead><tr><th>Turno</th><th>Gestión</th><th>Nivel</th><th>Grado</th><th>Paralelo</th></tr></thead>';
                            tabla += '<tbody>';
                            estudiante.matriculaciones.forEach(function(matriculacion) {
                                tabla += '<tr>';
                                tabla += '<td>' + matriculacion.turno.nombre + '</td>';
                                tabla += '<td>' + matriculacion.gestion.nombre + '</td>';
                                tabla += '<td>' + matriculacion.nivel.nombre + '</td>';
                                tabla += '<td>' + matriculacion.grado.nombre + '</td>';
                                tabla += '<td>' + matriculacion.paralelo.nombre + '</td>';
                                tabla += '</tr>';
                            });

                            // Inserta la tabla en el contenedor correspondiente
                            $('#tabla_historial').html(tabla).show();
                        } else {
                            // Si no hay historial, muestra un mensaje
                            $('#tabla_historial').html(
                                    '<p>No hay historial académico registrado del estudiante.</p>')
                                .show();
                        }
                    },
                    error: function() {
                        alert('No se puede obtener información del estudiante');
                    }
                });
            }

        });
    </script>
@stop
