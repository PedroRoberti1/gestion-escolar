@extends('adminlte::page')

@section('content_header')
    <h1><b>Mostrar datos el estudiante seleccionado</b></h1>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos del padre de familia del estudiante seleccionado</h3>

                </div>
                <div class="card-body" id="datos_ppff" style="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <p id="nombres">{{ $estudiante->ppff->nombres }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p id="apellidos">{{ $estudiante->ppff->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Carnet de identidad</label>
                                <p id="ci">{{ $estudiante->ppff->ci }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha nacimiento</label>
                                <p id="fecha_nacimiento">{{ $estudiante->ppff->fecha_nacimiento }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <p id="telefono">{{ $estudiante->ppff->telefono }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Parentesco</label>
                                <p id="parentesco">{{ $estudiante->ppff->parentesco }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ocupacion</label>
                                <p id="ocupacion">{{ $estudiante->ppff->ocupacion }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <p id="direccion">{{ $estudiante->ppff->direccion }}</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <hr>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-4 position-relative" style="padding-bottom: 110px;">
                            <!-- altura fija para reservar espacio -->
                            <div class="form-group">
                                <label for="foto">Fotografía</label>

                                <!-- Vista previa flotante sin afectar el flujo -->
                                <img id="preview" src="{{ url($estudiante->foto) }}" alt="Vista previa"
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
                                    <select name="rol" id="rol" class="form-control" disabled>
                                        <option value="">
                                            {{ $estudiante->usuario->roles->pluck('name')->implode(',') }}"</option>

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
                                    <select name="apellidos" id="" class="form-control" disabled>
                                        <option value="">{{ $estudiante->apellidos }}</option>
                                    </select>
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
                                    <select name="nombres" id="" class="form-control" disabled>
                                        <option value="">{{ $estudiante->nombres }}</option>
                                    </select>
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
                                    <select name="ci" id="" class="form-control" disabled>
                                        <option value="">{{ $estudiante->ci }}</option>
                                    </select>
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
                                        <select name="fecha_nacimiento" id="" class="form-control" disabled>
                                            <option value="">
                                                {{ $estudiante->fecha_nacimiento }}
                                            </option>
                                        </select>
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
                                        <select name="direccion" id="" class="form-control" disabled>
                                            <option value="">
                                                {{ $estudiante->direccion }}
                                            </option>
                                        </select>
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
                                        <select name="genero" id="" class="form-control" disabled>
                                            <option value="">
                                                {{ $estudiante->genero }}
                                            </option>
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
                                        <select name="telefono" id="" class="form-control" disabled>
                                            <option value="">
                                                {{ $estudiante->telefono }}
                                            </option>
                                        </select>
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
                                        <select name="email" id="" class="form-control" disabled>
                                            <option value="">
                                                {{ $estudiante->usuario->email }}
                                            </option>

                                        </select>
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
                            <a href="{{url('admin/estudiantes/')}}" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
