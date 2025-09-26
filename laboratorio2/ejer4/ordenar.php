<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Palabras Ordenadas</title>
    <style>
        .palabras-ordenadas {
            border: 2px solid red;
            background-color: yellow;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    function ordenarPalabras($palabras) {
        sort($palabras);
        return $palabras;
    }

    $numeroPalabras = $_POST['numeroPalabras'];
    $palabras = [];

    // Recoger todas las palabras
    for ($i = 1; $i <= $numeroPalabras; $i++) {
        $palabras[] = $_POST["palabra$i"];
    }

    // Ordenar palabras
    $palabrasOrdenadas = ordenarPalabras($palabras);
    ?>

    <div class="palabras-ordenadas">
        <h2>Palabras Ordenadas</h2>
        <ul>
            <?php
            foreach ($palabrasOrdenadas as $palabra) {
                echo "<li>$palabra</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>