<html>
<head>
    <title>Vista Profesor</title>
</head>
<body>
    <h1>Listado de Profesores</h1>
    <table>
        <tr>
            <td>Profesor</td>
            <td>Profesion</td>
            <td>Grado Academico</td>
            <td>Celular</td>
        </tr>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->full_name }}</td>
                <td>{{ $teacher->profession }}</td>
                <td>{{ $teacher->grade_academy }}</td>
                <td>{{ $teacher->cell_phone }}</td>
            </tr>
        @endforeach

    </table>
</body>
</html>

