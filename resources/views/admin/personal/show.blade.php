@extends('adminlte::page')

@section('content_header')
    <h1><b>Datos del personal{{ $personal->tipo }}</b></h1>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del personal seleccionado</h3>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/personal/' . $personal->tipo) }}" class="btn btn-default">
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
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')



    @stop
