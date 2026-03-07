<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar solicitud de visitas</title>
    <link rel="stylesheet" href="css/estiloGuest.css" />


</head>
<body>
    <?php
    spl_autoload_register(function($classname){
        include($classname.".class.php");
    });
    
    if(isset($_POST['submit'])){
      
        $entry = new guestData();
        date_default_timezone_set("America/El_Salvador");
        $entry->setIpGuest($_SERVER['REMOTE_ADDR']); 
        $entry->setNameScript($_SERVER['REQUEST_URI']); 
        $entry->setDateTimeGuest(date("Y-m-d H:i:s"));
        $entry->setFile("guestbook.txt");
        $entry->showGuest();
        $entry->saveGuest();
        }
        else{
       ?>
       <section id="container">
       <h2>Datos del visitante</h2>
       <form method="POST">

<table class="table">
<thead class="thead-dark">
<tr>
<th>Dirección IP</th>
<th>Nombre del script</th>
<th>Fecha y hora</th>
</tr>
</thead>

<tbody>
<tr>
<td><?php echo $_SERVER['REMOTE_ADDR']; ?></td>
<td><?php echo $_SERVER['PHP_SELF']; ?></td>
<td><?php date_default_timezone_set("America/El_Salvador");
 echo date("d-m-Y H:i:s"); ?></td>
</tr>
</tbody>
</table>

<br>
<button type="submit" name="submit">Guardar visita</button><br><br>
<button><a  href="./admin.php">Administrar información</a></button>
</form>
</section>

<?php
}
?>    
</body>
</html>