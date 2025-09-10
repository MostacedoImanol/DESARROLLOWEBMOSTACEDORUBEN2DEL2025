<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABORATORIO2</title>
</head>

</html>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>SUMADOR_DIGITOS</title>
</head>

<body>



    <?php
    
    if (!isset($_GET['n']= null)) {
        echo '<h1 class="error">tiene que haber un valor</h1>';
    } else {
        $n = $_GET['n'];
        
        if ($n < 0) {
            echo '<h1 class="error">el numero tiene que ser mayor a cero</h1>';
            echo '<h2 class="error2">Intentelo de nuevo !...';
        } else {
      
            $suma = 0;
            $digitos = str_split($n);

            foreach($digitos as $digito){

                $suma += $digito;
            }
            echo '<div class="Suma"><h1>La suma de los dígitos de '. $n.' es: '. $suma.'</h1></div>';
        }
    }
    ?>

</body>

</html>