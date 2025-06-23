@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido! </b>{{ Auth::user()->name }}</h1>
    </>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/colegio.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Gestiones registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_gestiones }} Gestiones</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/calendario.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Periodos registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_periodos }} Periodos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/niveles.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Niveles registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_niveles }} Niveles</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/cliente.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Grados registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_grados }} grados</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/velocidad.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Paralelos registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_paralelos }}
                        paralelos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/reloj-de-bolsillo.gif') }}" width="70px">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Turnos registrados</b></span>
                    <span class="info-box-number" style="color: brown; font-size:15pt">{{ $total_turnos }} turnos</span>
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
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
