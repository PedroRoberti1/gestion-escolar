@extends('adminlte::page')


@section('content_header')
    <h1><b>Creacion de una nueva formacion del personal</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">LLene los datos del formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/personal/'.$id.'/formaciones/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="personal_id" value="{{$id}}" hidden>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="foto">Fotografia</label>

                                            <input type="file" class="form-control" name="archivo"
                                                placeholder="Escriba aqui.." onchange="mostrarImagen(event)"
                                                accept="image/*" required>
                                            <img id="preview" src="" alt="Vista previa"
                                                style="max-width: 100%; max-height: 200px; display:block;">

                                            <br>

                                            @error('archivo')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                        <script>
                                            const mostrarImagen = e =>
                                                document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Titulo</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-certificate"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('titulo', $configuracion->titulo ?? '') }}" name="titulo"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('titulo')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Institucion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('institucion', $configuracion->nombre ?? '') }}" name="institucion"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('institucion')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nivel">Nivel</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-layer-group"></i>
                                                    </span>
                                                </div>
                                                <select class="form-control" name="nivel" id="nivel" required>
                                                    <option value="" disabled selected>Seleccione el nivel...</option>
                                                    <option value="Tecnico"
                                                        {{ old('nivel') == 'Tecnico' ? 'selected' : '' }}>
                                                        Tecnico</option>
                                                    <option value="Licenciatura"
                                                        {{ old('nivel') == 'Licenciatura' ? 'selected' : '' }}>Licenciatura
                                                    </option>
                                                    <option value="Maestria"
                                                        {{ old('nivel') == 'Maestria' ? 'selected' : '' }}>
                                                        Maestria</option>
                                                    <option value="Doctorado"
                                                        {{ old('nivel') == 'Doctorado' ? 'selected' : '' }}>
                                                        Doctorado</option>
                                                </select>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha de graduacion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" id="fecha_graduacion"
                                                    value="{{ old('nombre', $configuracion->nombre ?? '') }}"
                                                    name="fecha_graduacion">
                                            </div>
                                            @error('nombre')
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
                                    <a href="{{ URL::previous() }}" class="btn btn-default">
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
