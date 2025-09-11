<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'database.php';

$errors = [];
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: mishobbies.php');
    exit;
}

$sql = "SELECT * FROM hobbies WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$hobby = $result->fetch_assoc();

if (!$hobby) {
    header('Location: mishobbies.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? $hobby['nombres'];
    $fotografia = $_FILES['fotografia'] ?? null;

    if (empty($nombre)) {
        $errors[] = 'Por favor, ingrese el nombre del hobby.';
    }

    if ($fotografia && $fotografia['error'] === UPLOAD_ERR_OK) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($fotografia["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($fotografia["tmp_name"]);
        if ($check === false) {
            $errors[] = "El archivo no es una imagen.";
        }

        if ($fotografia["size"] > 500000) {
            $errors[] = "Lo sentimos, tu archivo es demasiado grande.";
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $errors[] = "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }

        if (empty($errors) && move_uploaded_file($fotografia["tmp_name"], $target_file)) {
            $sql = "UPDATE hobbies SET nombres = ?, fotografia = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssi', $nombre, $target_file, $id);

            if ($stmt->execute()) {
                header('Location: mishobbies.php');
                exit;
            } else {
                $errors[] = 'Ocurrió un error al actualizar el hobby.';
            }
        } else {
            $errors[] = "Lo sentimos, hubo un error al subir tu archivo.";
        }
    } else {
        $sql = "UPDATE hobbies SET nombres = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $nombre, $id);

        if ($stmt->execute()) {
            header('Location: mishobbies.php');
            exit;
        } else {
            $errors[] = 'Ocurrió un error al actualizar el hobby.';
        }
    }
}
?>

<?php include 'header.php'; ?>

<div class="main">
    <h2>Editar Hobby</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $hobby['nombres']; ?>" required>
        </div>
        <div>
            <label for="fotografia">Fotografía:</label>
            <input type="file" id="fotografia" name="fotografia">
            <p>Actual: <img src="<?php echo $hobby['fotografia']; ?>" width="100"></p>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>

<?php include 'footer.php'; ?>
