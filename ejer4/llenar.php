<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Palabras</title>
</head>
<body>
    <?php 
    $numeroPalabras = $_POST['numeroPalabras'];
    ?>
    <h2>Ingrese <?php echo $numeroPalabras; ?> palabras</h2>
    <form action="ordenar.php" method="post">
        <input type="hidden" name="numeroPalabras" value="<?php echo $numeroPalabras; ?>">
        <?php
        for ($i = 1; $i <= $numeroPalabras; $i++) {
            echo "<label>Palabra $i: <input type='text' name='palabra$i' required></label><br>";
        }
        ?>
        <input type="submit" value="Ordenar">
    </form>
</body>
</html>