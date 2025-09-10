<?php
include 'header.php';
require_once 'database.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($correo)) {
        $errors[] = 'Por favor, ingrese su correo electrónico.';
    }

    if (empty($password)) {
        $errors[] = 'Por favor, ingrese su contraseña.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Las contraseñas no coinciden.';
    }

    if (empty($errors)) {
        $sql = "SELECT id FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = 'Ya existe un usuario con este correo electrónico.';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (correo, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $correo, $hashed_password);

            if ($stmt->execute()) {
                $success = '¡Usuario registrado con éxito! Ahora puede <a href="login.php">iniciar sesión</a>.';
            } else {
                $errors[] = 'Ocurrió un error al registrar el usuario.';
            }
        }
    }
}
?>

<div class="main">
    <h2>Registrarse</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php else: ?>
        <form action="register.php" method="post">
            <div>
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
