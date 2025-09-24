<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>SUMADOR_DIGITOS</title>
</head>
<body>
</head>
<body>
    <div class="container">
        <?php
        if (!isset($_GET['n']) || $_GET['n'] === '') {
            echo '<div class="error">Debe ingresar un valor numérico.</div>';
        } else {
            $n = $_GET['n'];
            if (!is_numeric($n) || $n < 0) {
                echo '<div class="error">El número debe ser mayor o igual a cero.</div>';
                echo '<div class="error2">¡Inténtelo de nuevo!</div>';
            } else {
                $suma = 0;
                $digitos = str_split($n);
                foreach ($digitos as $digito) {
                    if (is_numeric($digito)) {
                        $suma += (int)$digito;
                    }
                }
                echo '<div class="Suma">La suma de los dígitos de <strong>' . htmlspecialchars($n) . '</strong> es: <span>' . $suma . '</span></div>';
            }
        }
        ?>
    </div>
</body>
</html>
</body>
</html>

</body>

</html>