@extends('adminlte::page')


@section('content_header')
    <h1><b>Asignaciones/Registro de una nueva asignacion del docente</b></h1>
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
                    <form action="{{ url('/admin/asigaciones/create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Buscar docente:</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="docentes" id="buscar_docente" class="form-control select2">
                                                    <option value="">Selecciona un docente...</option>
                                                    @foreach ($docentes as $docente)
                                                        <option value="{{ $docente->id }}">
                                                            {{ $docente->apellidos . ' ' . $docente->nombres . ' - ' . $docente->ci }}
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


                            <div class="row" id="datos_docente" style="display: none">
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
                                                    <label for="">Profesion</label>
                                                    <p id="profesion">a</p>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formacion academica</h3>
                    </div>
                    <div class="card-body">
                        <div id="tabla_formacion"> </div>
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
                    <form action="{{ url('/admin/asignaciones/create') }}" method="POST">
                        @csrf
                        <input type="text" name="personal_id" id="docente_id" required hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Turno</label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-clock"></i></span>
                                        </div>
                                        <select name="turno_id" id="turno_id" class="form-control" required>
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
                                        <select name="gestion_id" id="" class="form-control" required>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Niveles </label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="nivel_id" id="nivel_id" class="form-control" required>
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
                                        <select name="grado_id" id="grados" class="form-control" required>
                                            <option value="">Primero seleccione un nivel...</option>

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
                                        <select name="paralelo_id" id="paralelos" class="form-control" required>
                                            <option value="">Primero seleccione un paralelo...</option>

                                        </select>
                                    </div>
                                    @error('paralelo_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Materia a impartir </label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-book"></i></span>
                                        </div>
                                        <select name="materia_id" id="materias" class="form-control" required>
                                            <option value="">Primero seleccione una materia...</option>
                                            @foreach ($materias as $materia)
                                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('materia_id')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha </label> <b>(*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_asignacion" required>
                                    </div>
                                    @error('fecha_asignacion')
                                        <small style="color: coral">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/asignaciones') }}" class="btn btn-default"> <i
                                            class="fas fa-arrow-left">
                                        </i> cancelar</a>
                                    <button type="submit" class="btn btn-primary"> <i
                                            class="fas fa-save"></i>Guardar</button>
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


        // Agrega un evento al campo con ID 'buscar_docente' que se activa cuando se cambia su valor
        $('#buscar_docente').on('change', function() {
            // Obtiene el valor seleccionado
            var id = $(this).val();

            // Si hay un valor seleccionado (es decir, no está vacío o null)
            if (id) {
                // Realiza una solicitud AJAX al servidor
                $.ajax({
                    url: "{{ url('/admin/asignaciones/buscar_docente/') }}/" + id,
                    type: 'GET',
                    success: function(docente) {
                        // Llena los campos con los datos del estudiante
                        $('#apellidos').html(docente.apellidos);
                        $('#nombres').html(docente.nombres);
                        $('#ci').html(docente.ci);
                        $('#fecha_nacimiento').html(docente.fecha_nacimiento);
                        $('#telefono').html(docente.telefono);
                        $('#direccion').html(docente.direccion);
                        $('#materias').html(docente.materia)
                        $('#email').html(docente.usuario.email);
                        $('#genero').html(docente.profesion);
                        $('#docente_id').val(docente.id);

                        $('#datos_docente').css('display', 'block');

                        // Muestra la imagen del estudiante
                        $('#foto').attr('src', docente.foto_url).show();

                        var baseUrl = "{{ url('/') }}";
                        // Verifica si tiene al menos una matriculación
                        if (docente.formaciones && docente.formaciones.length > 0) {
                            var tabla = '<table class="table table-bordered"';
                            tabla +=
                                '<thead><tr><th>Titulo</th><th>Institucion</th><th>Nivel</th><th>Fecha de graduacion</th><th>Archivo</th></tr></thead>';
                            tabla += '<tbody>';
                            docente.formaciones.forEach(function(formacion) {
                                tabla += '<tr>';
                                tabla += '<td>' + formacion.titulo + '</td>';
                                tabla += '<td>' + formacion.institucion + '</td>';
                                tabla += '<td>' + formacion.nivel + '</td>';
                                tabla += '<td>' + formacion.fecha_graduacion + '</td>';
                                tabla += '<td><a href="' + baseUrl + '/' + formacion.archivo +
                                    '" target="_blank">Ver archivo</a></td>';

                                tabla += '</tr>';
                            });
                            $('#tabla_formacion').html(tabla).show();
                        } else {
                            $('#tabla_formacion').html(
                                '<p> No hay historial academica registrada del docente.</p>');
                        }

                    },
                    error: function() {
                        alert('No se puede obtener información del docente');
                    }
                });
            }

        });
    </script>
@stop
