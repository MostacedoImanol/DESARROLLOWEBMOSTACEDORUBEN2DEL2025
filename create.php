<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $fotografia = $_FILES['fotografia'] ?? null;

    if (empty($nombre)) {
        $errors[] = 'Por favor, ingrese el nombre del hobby.';
    }

    if ($fotografia && $fotografia['error'] === UPLOAD_ERR_OK) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($fotografia["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($fotografia["tmp_name"]);
        if ($check === false) {
            $errors[] = "El archivo no es una imagen.";
        }

        // Check file size
        if ($fotografia["size"] > 500000) {
            $errors[] = "Lo sentimos, tu archivo es demasiado grande.";
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $errors[] = "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }

        if (empty($errors) && move_uploaded_file($fotografia["tmp_name"], $target_file)) {
            $sql = "INSERT INTO hobbies (nombres, fotografia) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $nombre, $target_file);

            if ($stmt->execute()) {
                header('Location: mishobbies.php');
                exit;
            } else {
                $errors[] = 'Ocurrió un error al crear el hobby.';
            }
        } else {
            $errors[] = "Lo sentimos, hubo un error al subir tu archivo.";
        }
    } else {
        $errors[] = 'Por favor, seleccione una imagen.';
    }
}
?>

<?php include 'header.php'; ?>

<div class="main">
    <h2>Crear Hobby</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="create.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="fotografia">Fotografía:</label>
            <input type="file" id="fotografia" name="fotografia" required>
        </div>
        <button type="submit">Crear</button>
    </form>
</div>

<?php include 'footer.php'; ?>
