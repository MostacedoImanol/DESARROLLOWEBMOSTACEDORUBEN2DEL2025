<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datos del formulario</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            background-color: #f0f8ff;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .grid-item {
            background-color: #e0f7fa;
            padding: 15px;
            border-radius: 8px;
            text-align: left;
            font-size: 1.1em;
        }
        h1 {
            text-align: center;
        }
    </style>

</head>
<body>
    <h1>Datos recibidos del formulario</h1>
    <div class="grid-container">
        <div class="grid-item">
            <strong>Nombre:</strong><br>
            <?php echo htmlspecialchars($_POST["nombre"] ?? ""); ?>
        </div>
        <div class="grid-item">
            <strong>Apellido:</strong><br>
            <?php echo htmlspecialchars($_POST["apellido"] ?? ""); ?>
        </div>
        <div class="grid-item">
            <strong>Sexo:</strong><br>
            <?php echo htmlspecialchars($_POST["sexo"] ?? ""); ?>
        </div>
        <div class="grid-item">
            <strong>Dirección:</strong><br>
            <?php echo htmlspecialchars($_POST["direcciones"] ?? ""); ?>
        </div>
        <div class="grid-item">
            <strong>Correo:</strong><br>
            <?php echo htmlspecialchars($_POST["correo"] ?? ""); ?>
        </div>
        <div class="grid-item">
            <strong>Celular:</strong><br>
            <?php echo htmlspecialchars($_POST["celular"] ?? ""); ?>
        </div>
    </div>

    
</body>
</html>