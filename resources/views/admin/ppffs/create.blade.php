@extends('adminlte::page')

@section('content_header')
    <h1><b>Crear un nuevo padre de familia</b></h1>
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
                    <form action="{{url('admin/ppffs/create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombres</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('nombres') }}" name="nombres"
                                                    placeholder="Escriba los nombres aqui.." required>
                                            </div>
                                            @error('nombres')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Apellidos</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('apellidos') }}" name="apellidos"
                                                    placeholder="Escriba los apellidos aqui..." required>
                                            </div>
                                            @error('apellidos')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Carnet de identidad</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('ci') }}" name="ci"
                                                    placeholder="Ingrese el numero de ci.." required>
                                            </div>
                                            @error('ci')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control"
                                                    value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Telefono</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('telefono') }}" name="telefono"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Parentesco</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-users"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('parentesco') }}" name="parentesco"
                                                    placeholder="Ingrese el parentesco..." required>
                                            </div>
                                            @error('parentesco')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Ocupacion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('ocupacion') }}" name="ocupacion"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('ocupacion')
                                                <small style="color: red"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Direccion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fas fa-fw fa-map"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('direccion') }}" name="direccion"
                                                    placeholder="Escriba aqui.." required>
                                            </div>
                                            @error('direccion')
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
                                    <a href="{{ url('/admin/ppffs') }}" class="btn btn-default">
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
