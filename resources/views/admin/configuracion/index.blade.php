@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del sistema</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bienvenido a la seccion de configuracion del sistema.</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.configuracion.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Logo de la institucion</label><b> (*)</b>
                                    <input type="file" onchange="mostrarImagen(event)" accept="image/*"
                                        class="form-control" value="{{ old('logo', $configuracion->nombre ?? '') }}"
                                        name="logo" placeholder="Escriba aqui.." required>
                                    <br>
                                    <center>
                                        <img id="preview" src="{{url($configuracion->logo)}}" style="max-width: 200px; margin-top: 10px;">
                                    </center>
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>

                                @error('logo')
                                    <small style="color: red"> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Descripcion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('descripcion', $configuracion->descripcion ?? '') }}"
                                                    name="descripcion" placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('descripcion')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Direccion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('direccion', $configuracion->direccion ?? '') }}"
                                                    name="direccion" placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Telefono</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('telefono', $configuracion->telefono ?? '') }}"
                                                    name="telefono" placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Divisa</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <select name="divisa" id="divisa" class="form-control" required>
                                                    <option value="">Seleccione una opcion</option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}"
                                                            {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                            {{ $divisa['name'] . '(' . $divisa['symbol'] . ')' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('divisa')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Correo Electronico</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="correo_electronico" class="form-control"
                                                    value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}"
                                                    name="correo_electronico" placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('correo_electronico')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Sitio Web</label><b> ()</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-globe"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('web', $configuracion->web ?? '') }}" name="web"
                                                    placeholder="Escriba aqui...">
                                            </div>
                                            @error('web')
                                                <small style="color: red"> {{ $message }}</small>
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
                                    <a href="{{ url('/admin') }}" class="btn btn-default">
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
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
