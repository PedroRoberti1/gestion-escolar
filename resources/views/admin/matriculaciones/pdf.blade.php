<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula del estudiante</title>
</head>

<body>
    <table border="0">
        <tr>
            <td style="text-align: center;font-size:8pt;widht:200px">
                <img src="{{ $logoBase64 }}" width="70px"> <br>
                <b>{{ $configuracion->nombre }}</b> <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo_electronico }}
            </td>
            <td style="width: 300px;text-align:center"><br><br><br><br><br><b>
                    <h2><u>Matricula del estudiante</u></h2>
                </b></td>
            <td style="width: 200px; text-aling:center">
                <p>Fotografia</p>
                <img src="{{ $fotoBase64 }}" alt="foto estudiante" width="100px">
            </td>
        </tr>
    </table>
    <table border="0" cellpadding="5" style="margin-left: 50px">
        <tr>
            <td style="width: 100px"><b>Gestion: </b></td>
            <td style="width: 170px">{{ $matriculaciones->gestion->nombre }}</td>
            <td style="width: 100px"><b>Nombres</b></td>
            <td style="width: 180px">{{ $matriculaciones->estudiante->nombres }}</td>
        </tr>
        <tr>
            <td style="width: 100px"><b>Turno</b></td>
            <td style="width: 170px">{{ $matriculaciones->turno->nombre }}</td>
            <td style="width: 100px"><b>Apellidos</b></td>
            <td style="width: 180px">{{ $matriculaciones->estudiante->apellidos }}</td>
        </tr>
        <tr>
            <td style="width: 100px"><b>Nivel:</b></td>
            <td style="width: 170px">{{ $matriculaciones->nivel->nombre }}</td>
            <td style="width: 100px"><b>C.I:</b></td>
            <td style="width: 180px">{{ $matriculaciones->estudiante->ci }}</td>
        </tr>
        <tr>
            <td style="width: 100px"><b>Grado:</b></td>
            <td style="width: 170px">{{ $matriculaciones->grado->nombre }}</td>
            <td style="width: 100px"> <b>Genero</b></td>
            <td style="width: 180px">{{ $matriculaciones->estudiante->genero }}</td>
        </tr>
        <tr>
            <td style="width: 100px"><b>Paralelo:</b></td>
            <td style="width: 170px">{{ $matriculaciones->paralelo->nombre }}</td>
            <td style="width: 100px"><b>Telefono</b></td>
            <td style="180px">{{ $matriculaciones->estudiante->telefono }}</td>
        </tr>
    </table>

    <hr>
    <p style="text-align: justify">
        <b>Partes contratantes:</b>
        La institución <b>{{ $configuracion->nombre }}</b>, en adelante denominada <b>"La Institución Educativa"</b>,
        con domicilio en <b>{{ $configuracion->direccion }}</b>, representada por el <b>Lic. Pedro Roberti</b> por una
        parte; y por la otra, <b>{{ $matriculaciones->estudiante->ppff->nombres }}
            {{ $matriculaciones->estudiante->ppff->apellidos }}</b>, en su carácter de padre/madre/tutor legal del
        estudiante <b>{{ $matriculaciones->estudiante->nombres }} {{ $matriculaciones->estudiante->apellidos }}</b>,
        con domicilio en <b>{{ $matriculaciones->estudiante->direccion }}</b>.

        <br><br>
        <b>Terminos y condiciones</b>
        Matricula: Los Padres/Tutores legales matriculan al Estudiante en la Institucuion Educativa para el año escolar
        <b style="color: blue">{{$matriculaciones->grado->nombre}}</b>
        <br><br>
        <b>Compromisos del Estudiante</b><br>
        - Cumplir con la asistencia y puntualidad establecida por la Institución.<br>
        - Respetar las normas de convivencia y disciplina escolar.<br>
        - Cuidar las instalaciones, materiales y recursos de la Institución.<br>

        <br>
        <b>Compromisos de los Padres/Tutores</b><br>
        - Garantizar la asistencia regular y puntual del estudiante.<br>
        - Participar en reuniones y actividades convocadas por la Institución.<br>
        - Cumplir con las obligaciones económicas y administrativas correspondientes.<br>

        <br><br>
        <b>Duración del contrato:</b><br>
        El presente contrato tendrá vigencia desde la fecha de firma hasta la finalización del ciclo lectivo
        correspondiente, pudiendo renovarse de común acuerdo entre las partes para el siguiente año escolar.
        <br>
        <br>
  

        {{'Fecha: '.now()->locale('es')->isoFormat('D [de] MMMM [de] YYYY')}}
        
        <br><br><br>

        <table border="0" style="width: 100%">
            <tr>
                <td style="text-align: center">
                    -----------------------------------<br>
                    <b>La institucion Educativa</b><br>
                    Lic. Pedro Roberti
                </td>
                <td style="text-align: center">
                    -----------------------------------<br>
                    <b>Padres/Tutores</b> <br>
                    {{$matriculaciones->estudiante->ppff->nombres ." ". $matriculaciones->estudiante->ppff->apellidos}}

                </td>
            </tr>
        </table>

    </p>


</body>

</html>
