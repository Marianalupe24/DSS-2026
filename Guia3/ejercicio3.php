<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio de estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >
<div class="container mt-5">
    
<div class="card shadow">
    <div class="card-header bg-warning text-black text-center">
        <h4>Promedio de Estudiantes</h4>
    </div>

    <div class="card-body">
<?php
    $notas = array(
        "Alejandro" => array(
            "Parcial" => 9.1,
            "Investigacion" => 8.5,
            "Tarea" => 4.8
        ),
        "Katherine" => array(
            "Parcial" => 7.5,
            "Investigacion" => 9.0,
            "Tarea" => 8.0
        ),
        "Carolina" => array(
            "Parcial" => 6.8,
            "Investigacion" => 7.9,
            "Tarea" => 9.5
        )
    );

    echo "<table class='table table-bordered table-striped text-center'>";
    echo "<thead class='table-dark'>
            <tr>
                <th>Nombre</th>
                <th>Actividad</th>
                <th>Nota</th>
                <th>Promedio</th>
            </tr>
        </thead>";
    echo "<tbody>";

    foreach ($notas as $nombre => $detalle) {

        $promedio = ($detalle["Tarea"] * 0.50) +($detalle["Investigacion"] * 0.30) +($detalle["Parcial"] * 0.20);

        echo "<tr>";
        echo "<td rowspan='3' class='align-middle fw-bold'>$nombre</td>";
        echo "<td>Parcial</td>";
        echo "<td>{$detalle["Parcial"]}</td>";
        echo "<td rowspan='3' class='align-middle text-success fw-bold'>" . number_format($promedio,2) . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Investigación</td>";
        echo "<td>{$detalle["Investigacion"]}</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Tarea</td>";
        echo "<td>{$detalle["Tarea"]}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

?>

    </div>
</div>
</div>

</body>
</html>
