@extends('adminlte::page')


@section('content_header')
    <h1><b>Datos de la matriculacion del estudiante</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/gestiones/create') }}" method="POST">
                        @csrf




                        <div class="row" id="datos_estudiante">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">fotografia</label>
                                        <center>
                                            <img src="{{ url($matriculaciones->estudiante->foto) }}" width="70%"
                                                id="foto" alt="">
                                        </center>
                                    </div>
                                </div>

                                <div class="col-md-9">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Apellidos</label>
                                                <p id="apellidos">{{ $matriculaciones->estudiante->apellidos }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <p id="nombres">{{ $matriculaciones->estudiante->nombres }}</p>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Carnet de identidad</label>
                                                <p id="ci">{{ $matriculaciones->estudiante->ci }}</p>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Fecha de nacimiento</label>
                                                <p id="fecha_nacimiento">
                                                    {{ $matriculaciones->estudiante->fecha_nacimiento }}</p>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Telefono</label>
                                                <p id="telefono">{{ $matriculaciones->estudiante->telefono }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Direccion</label>
                                                <p id="direccion">{{ $matriculaciones->estudiante->direccion }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Correo electronico</label>
                                                <p id="email">{{ $matriculaciones->estudiante->usuario->email }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <p id="genero">{{ $matriculaciones->estudiante->genero }}</p>
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
                        <h3 class="card-title">Historial academico</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>

                                <tr>
                                    <th>Turno</th>
                                    <th>Gestión</th>
                                    <th>Nivel</th>
                                    <th>Grado</th>
                                    <th>Paralelo</th>
                                </tr>
                            <tbody>
                                @foreach ($matriculaciones->estudiante->matriculaciones as $datos)
                                    <tr>
                                        <td>{{ $datos->turno->nombre }}</td>
                                        <td>{{ $datos->gestion->nombre }}</td>
                                        <td>{{ $datos->nivel->nombre }}</td>
                                        <td>{{ $datos->grado->nombre }}</td>
                                        <td>{{ $datos->paralelo->nombre }}</td>
                                    </tr>
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
                    <form action="{{ url('/admin/matriculaciones/create') }}" method="POST">
                        @csrf
                        <input type="text" name="estudiante_id" id="estudiante_id" hidden required>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Turno</label> <b>(*)</b>
                                    <p>{{ $matriculaciones->turno->nombre }}</p>
                                    @error('turno_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gestiones </label> <b>(*)</b>
                                    <p>{{ $matriculaciones->gestion->nombre }}</p>

                                    @error('gestion_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Niveles </label> <b>(*)</b>
                                    <p>{{ $matriculaciones->nivel->nombre }}</p>
                                    @error('nivel_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Grados </label> <b>(*)</b>
                                    <p>{{ $matriculaciones->grado->nombre }}</p>
                                    @error('grado_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Paralelos </label> <b>(*)</b>
                                    <p>{{ $matriculaciones->paralelo->nombre }}</p>
                                    @error('paralelo_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha </label> <b>(*)</b>
                                    <p>{{ $matriculaciones->fecha_matriculacion }}</p>
                                    @error('paralelo_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/matriculaciones') }}" class="btn btn-default"> <i
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
