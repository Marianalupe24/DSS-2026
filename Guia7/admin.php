<link rel="stylesheet" href="css/estiloAdmin.css" />

<?php

$path = "./datos/guestbook.txt";

echo "<h2 class='titulo'>Registros de visitantes</h2>";


if(file_exists($path)){

    $fh = fopen($path,"r");
    $lineas = file($path);
    echo "<table class='tabla'>";
    echo "<tr>
            <th>#</th>
            <th>IP</th>
            <th>Script</th>
            <th>Fecha y hora</th>
          </tr>";

    $contador = 1;

    foreach($lineas as $linea){

        $linea = trim($linea);

        if($linea != ""){

            $datos = explode(" : ", $linea);

            echo "<tr>";
            echo "<td>".$contador."</td>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "</tr>";

            $contador++;
        }
    }

    echo "</table>";

}else{
    echo "<p class='mensaje'>No existen registros.</p>";
}

?>