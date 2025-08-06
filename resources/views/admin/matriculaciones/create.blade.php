@extends('adminlte::page')


@section('content_header')
    <h1><b>Creacion de una nueva matriculacion del estudiante</b></h1>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Buscar estudiante:</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="estudiantes" id="buscar_estudiante"
                                                    class="form-control select2">
                                                    <option value="">Selecciona un estudiante...</option>
                                                    @foreach ($estudiantes as $estudiante)
                                                        <option value="{{ $estudiante->id }}">
                                                            {{ $estudiante->apellidos . ' ' . $estudiante->nombres . ' - ' . $estudiante->ci }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row" id="datos_estudiante" style="display: none">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">fotografia</label>
                                            <center>
                                                <img src="" width="70%" id="foto" alt="">
                                            </center>
                                        </div>
                                    </div>

                                    <div class="col-md-9">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Apellidos</label>
                                                    <p id="apellidos">n</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombres</label>
                                                    <p id="nombres">n</p>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Carnet de identidad</label>
                                                    <p id="ci">ci</p>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Fecha de nacimiento</label>
                                                    <p id="fecha_nacimiento">a</p>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Telefono</label>
                                                    <p id="telefono">a</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Direccion</label>
                                                    <p id="direccion">a</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Correo electronico</label>
                                                    <p id="email">a</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Genero</label>
                                                    <p id="genero">a</p>
                                                </div>
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
                        <input type="text" name="estudiante_id" id="estudiante_id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Turno</label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-clock"></i></span>
                                        </div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Seleccione un turno...</option>
                                            @foreach ($turnos as $turno)
                                                <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nombre')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gestiones </label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-university"></i></span>
                                        </div>
                                        <select name="gestion_id" id="" class="form-control">
                                            <option value="">Seleccione una gestion...</option>
                                            @foreach ($gestiones as $gestion)
                                                <option value="{{ $gestion->id }}">{{ $gestion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('gestion_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Niveles </label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="nivel_id" id="" class="form-control">
                                            <option value="">Seleccione un nivel...</option>
                                            @foreach ($niveles as $nivel)
                                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nivel_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Grados </label> <b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-list-alt"></i></span>
                                    </div>
                                    <select name="nivel_id" id="" class="form-control">
                                        <option value="">Seleccione un grado...</option>
                                        @foreach ($grados as $grado)
                                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('grado_id')
                                    <small style="color: coral">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paralelos </label> <b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-clone"></i></span>
                                    </div>
                                    <select name="paralelo_id" id="" class="form-control">
                                        <option value="">Seleccione un paralelo...</option>
                                        @foreach ($paralelos as $paralelo)
                                            <option value="{{ $paralelo->id }}">{{ $paralelo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('paralelo_id')
                                    <small style="color: coral">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Historial academico</h3>
            </div>
            <div class="card-body">
                <div id="tabla_historial"> </div>
            </div>

        </div>
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
