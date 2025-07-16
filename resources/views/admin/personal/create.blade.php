@extends('adminlte::page')

@section('content_header')
    <h1><b>Crear un nuevo {{ $tipo }}</b></h1>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese datos en el formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.personal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <input type="text" name="tipo" id="tipo" value="{{ $tipo }}" hidden>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="foto">Fotografia</label>

                                    <input type="file" class="form-control" name="foto" placeholder="Escriba aqui.."
                                        onchange="mostrarImagen(event)" accept="image/*" required>
                                    <img id="preview" src="" alt="Vista previa"
                                        style="max-width: 100%; max-height: 200px; display:block;">

                                    <br>

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

                                                <select name="rol" id="" class="form-control">
                                                    <option value="">Selecciones un rol...</option>
                                                    @foreach ($roles as $rol)
                                                        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                                    @endforeach
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
                                                    value="{{ old('nombres') }}"" placeholder="Ingrese nombres..." required>
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
                                                    value="{{ old('apellidos') }}"" placeholder="Ingrese apellidos..."
                                                    required>
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
                                                    value="{{ old('ci') }}"" placeholder="Ingrese CI..." required>
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
                                                    id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}""
                                                    placeholder="Ingrese Fecha de nacimiento..." required>
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
                                                <input type="text" class="form-control" name="direccion"
                                                    id="direccion" value="{{ old('direccion') }}""
                                                    placeholder="Ingrese direccion de su domicilio" required>
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
                                                <input type="text" class="form-control" name="telefono"
                                                    id="telefono" value="{{ old('telefono') }}""
                                                    placeholder="Ingrese un telefono" required>
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
                                                <input type="text" class="form-control" name="profesion"
                                                    id="profesion" value="{{ old('profesion') }}""
                                                    placeholder="Ingrese una profesion" required>
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
                                                    value="{{ old('profesion') }}"" placeholder="Ingrese un gmail"
                                                    required>
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
                                        <a href="{{ url('/admin/personal/'.$tipo) }}" class="btn btn-default">
                                            <i class="fas fa-arrow-left"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary"> <i
                                                class="fas fa-save"></i>Guardar</button>
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')



@stop
