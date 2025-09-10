<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos3.css">
    <title>Números Primos Generados</title>
</head>
<body>
    <div class="container">
        <h1>Números Primos Generados</h1>
        
        <?php
    
        function esPrimo($num) {
            if ($num <= 1) return false;
            if ($num <= 3) return true;
            
           
            if ($num % 2 == 0 || $num % 3 == 0) return false;
            
            $i = 5;
            while ($i * $i <= $num) {
                if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
                $i += 6;
            }
            
            return true;
        }
        
     
        function generarPrimos($cantidad) {
            $primos = [];
            $num = 2;
            
            while (count($primos) < $cantidad) {
                if (esPrimo($num)) {
                    $primos[] = $num;
                }
                $num++;
            }
            
            return $primos;
        }
        
        $cantidad = $_GET['cantidad'];
        if (isset($cantidad)) {
            
            
            if ($cantidad > 0) {
                $numerosPrimos = generarPrimos($cantidad);
                
                echo "<p>Los primeros $cantidad números primos son:</p>";
                echo "<ol>";
                foreach ($numerosPrimos as $primo) {
                    echo "<li>$primo</li>";
                }
                echo "</ol>";
            } else {
                echo "<p class='error'>Por favor, ingrese un número positivo.</p>";
            }
        } else {
            echo "<p class='error'>No se especificó la cantidad de números primos a generar.</p>";
        }
        ?>
        
        <a href="index.html" class="volver">Volver al formulario</a>
    </div>
</body>
</html>