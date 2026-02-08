<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-4">Tabla de Multiplicar</h3>
    <form method="post" class="w-50 mx-auto">
        <div class="mb-3">
            <label class="form-label">Ingrese un número:</label>
            <input type="text" name="numero" class="form-control">
        </div>
        <div class="text-center">
            <input type="submit" name="calcular" class="btn btn-primary">
        </div>
    </form>
    <div class="text-center mt-4">

    <?php 
    if(isset($_POST['calcular'])){
        $num = $_POST["numero"];

        if(empty($num)){
            echo "<p class='text-danger'>No puede dejar datos en blanco</p>";
        }
        elseif(!is_numeric($num)|| !ctype_digit($num)|| $num<0||$num>10){
            echo "<p class='text-danger'>Debe ser un número entero positivo del 1-10</p>";
        }
        else{
            echo "<h5 class='text-success'>La tabla de multiplicar del $num es:</h5>";
            for ($i=1; $i <= 10 ; $i++) { 
                $resultado = $num*$i;
                echo "<p>$num x $i = $resultado</p>";
            } 
        }
    }
   ?>
    </div>
</div>
</body>
</html>