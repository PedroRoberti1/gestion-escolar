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
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                        <p>dwqdwqd</p>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 