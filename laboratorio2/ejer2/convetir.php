<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos2.css">
    <title>Document</title>


</head>
<body>
    

<?php

$temperatura = floatval($_POST['temperatura']);
$grados = $_POST['grados'];

if(!isset($temperatura)){
    echo '<h1 class="error">tiene que haber un valor en temperat</h1>';
}



switch ($grados) {
    case 'celsius':
        $celsius = $temperatura;
        $fahrenheit = ($temperatura * 9 / 5) + 32;
        $kelvin = $temperatura + 273.15;
        break;

    case 'fahrenheit':
        $celsius = ($temperatura - 32) * 5 / 9;
        $fahrenheit = $temperatura;
        $kelvin = ($temperatura - 32) * 5 / 9 + 273.15;
        break;

    case 'kelvin':
        $celsius = $temperatura - 273.15;
        $fahrenheit = ($temperatura - 273.15) * 9 / 5 + 32;
        $kelvin = $temperatura;
        break;
}



?>
<footer>

<?php
// echo "<h2>Resultados de la conversión:</h2>";
// echo "<table> <th>";<th>
// echo "<th>Unidad</th><th>Temperatura</th></tr>";
// echo "<tr><td>Celsius (°C)</td><td>".$celsius."</td></tr>";
// echo "<tr><td>Fahrenheit (°F)</td><td>".$fahrenheit."</td></tr>";
// echo "<tr><td>Kelvin (K)</td><td>".$kelvin."</td></tr>";
// echo "</table>";

// echo "<h2>Resultados de la conversión:</h2>";
// echo "<table> <th>";
// echo "<th>Unidad</th><th>Temperatura<th>";
echo "<tr><td>Celsius (°C)<td>". $celsius."<tr>";
// echo "<tr><td>Fahrenheit (°F)<td>".$fahrenheit."<td>";
// echo "<tr><td>Kelvin (K)<td>".$kelvin."<td><tr>";
// echo "</table>";



?>
    

</footer>
    
</body>
</html>