@extends('adminlte::page')

@section('content_header')
    <h1><b>Datos del padre de familia</b></h1>
    <hr>


@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <h3 class="card-title mb-0">Datos registrados</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Volver</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">


                            <div class="form-group">
                                <label for="">Nombres</label><b> (*)</b>
                                <p>{{ $ppffs->nombres }}</p>
                            </div>


                        </div>


                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Apellidos</label><b> (*)</b>
                                        <p>{{ $ppffs->apellidos }}</p>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Carnet de identidad</label><b> (*)</b>
                                        <p>{{ $ppffs->ci }}</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label><b> (*)</b>
                                        <p>{{ $ppffs->fecha_nacimiento }}</p>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Telefono</label><b> (*)</b>
                                        <p>{{ $ppffs->telefono }}</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Parentesco</label><b> (*)</b>
                                        <p>{{ $ppffs->parentesco }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Ocupacion</label><b> (*)</b>
                                        <p>{{ $ppffs->ocupacion }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Direccion</label><b> (*)</b>
                                        <p>{{ $ppffs->direccion }}</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>



                <hr>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Estudiantes del padre de familia</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">Nro</th>
                                    <th class="text-center">Nombre estudiante</th>
                                    <th class="text-center">Carnet de identidad</th>
                                    <th class="text-center">Fecha de nacimiento</th>
                                    <th class="text-center">Teléfono</th>                                 

                                    <th class="text-center">Genero</th>
                                    <th class="text-center">Gmail</th>
                                    <th class="text-center">Foto</th>


                                </tr>
                            </thead>
                            <tbody>
                                <!-- Iteramos sobre todos los niveles pasados desde el controlador -->
                                @foreach ($ppffs->estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $estudiante->apellidos }} {{ $estudiante->nombres }}</td>
                                        <td>{{ $estudiante->ci }}</td>
                                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                                        <td>{{ $estudiante->telefono }}</td>
                                        <td>{{ $estudiante->genero }}</td>
                                        <td>{{$estudiante->email}}</td>
                                        <td><img src="{{url($estudiante->foto)}}" width="100px" alt="foto"></td>

                    </div>

                    </tr>
                    @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')



@stop
