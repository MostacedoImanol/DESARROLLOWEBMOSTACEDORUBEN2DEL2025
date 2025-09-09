<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datos del formulario</title>
    <style>
        <STYle>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: #2196F3;
            padding: 10px;
        }
        .grid-item{
            padding: 20px;
            text-align: center;
            
        }
        .item1{
            background-color:#ffda6f;
            bachground-color:#ffd6a5;
            background-colo:#fdffb6;
            background-color:#caffbf;
            background-color:#9bf6ff;
        }
        

    </style>

</head>
<body>
    <h1>Datos recibidos del formulario</h1>
    <div class = "grid-container">
        <div class = "grid-item1">
            <strong>Nombres:</strong><br>
            <?php echo htmlspecialchars( $_POST["nombres"]); ?>

        </div>

        <div class = "grid-item2">
            <strong>Apellidos:</strong><br>
            <?php echo htmlspecialchars( $_POST["apellidos"]); ?>
        </div>
        <div class  = "grid-item3">
            <strong>Correo:</strong><br>
            <?php echo htmlspecialchars( $_POST["correo"]); ?>
        </div>
        <div class = "grid-item4">
            <strong>Teléfono:</strong><br>
            <?php echo htmlspecialchars( $_POST["telefono"]); ?>

        </div>
        <div class = "grid-item5">
            <strong>Dirección:</strong><br>
            <?php echo htmlspecialchars( $_POST["direccion"]); ?>
        </div>
        <div class = "grid-item6">
            <strong>Celular:</strong><br>
            <?php echo htmlspecialchars( $_POST["celular"]); ?>
        </div>
        <div class = "grid-item7">
            <strong>Correo:</strong><br>
            <?php echo htmlspecialchars( $_POST["correo"]); ?>
        </div>

    </div>

    
</body>
</html>