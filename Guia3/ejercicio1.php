<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia de un número</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-4">Calcular Potencia</h3>

    <form method="post" class="w-50 mx-auto">

        <div class="mb-3">
            <label class="form-label">Ingrese el número base:</label>
            <input type="text" name="base" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Ingrese el número de la potencia:</label>
            <input type="text" name="potencia" class="form-control">
        </div>

        <div class="text-center">
            <input type="submit" name="calcular" class="btn btn-primary">
        </div>

    </form>

    <div class="text-center mt-3">

    <?php 
    if (isset($_POST['calcular'])){
        $base = $_POST["base"];
        $potencia = $_POST["potencia"];

        $resultado = $base;

        if (empty($base)|| empty($potencia)){
            echo "<p class='text-danger'>Debes rellenar todos los campos</p>";
        }elseif(!ctype_digit($potencia)){
            echo "<p class='text-danger'>La potencia no puede ser decimal</p>";

        }else{
            for ($i=1; $i < $potencia; $i++) {
                $resultado *= $base;
            }
            echo "<p class='text-success'>
                    El resultado de $base<sup>$potencia</sup> es: <strong>$resultado</strong>
                  </p>";
        }
    }
    ?>

    </div>

</div>

</body>
</html>