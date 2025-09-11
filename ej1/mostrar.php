<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    
</head>
<body>

    <form action="datos.php" method="post" autocomplete="on">
        <label for="nombres">Nombre:</label><br>
        <input type="text" id="nombres" name="nombre" required><br>

        <label for="apellidos">Apellido:</label><br>
        <input type="text" id="apellidos" name="apellido" required><br>

        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo" required>
            <option value="">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select><br>

        <label for="direcciones">Dirección:</label><br>
        <input type="text" id="direcciones" name="direcciones" required><br>

        <label for="correos">Correo:</label><br>
        <input type="email" id="correos" name="correo" required><br>

        <label for="celulares">Celular:</label><br>
        <input type="tel" id="celulares" name="celular" pattern="[0-9]{8,15}" required><br>

        <button type="submit">Enviar</button>
    </form>


    
</body>
</html>