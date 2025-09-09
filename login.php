<?php
include 'header.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: mishobbies.php');
    exit;
}

require_once 'database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($correo)) {
        $errors[] = 'Por favor, ingrese su correo electrónico.';
    }

    if (empty($password)) {
        $errors[] = 'Por favor, ingrese su contraseña.';
    }

    if (empty($errors)) {
        $sql = "SELECT id, password FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Comparación directa de contraseña en texto plano
            if ($password === $user['password']) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                header('Location: mishobbies.php');
                exit;
            } else {
                $errors[] = 'La contraseña es incorrecta.';
            }
        } else {
            $errors[] = 'No se encontró ningún usuario con ese correo electrónico.';
        }
    }
}
?>

<div class="main">
    <h2>Iniciar Sesión</h2>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <div>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>