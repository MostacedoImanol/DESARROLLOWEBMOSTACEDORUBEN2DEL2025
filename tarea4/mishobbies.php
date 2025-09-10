<?php
session_start();
require_once 'database.php';

$sql = "SELECT * FROM hobbies";
$result = $conn->query($sql);
$hobbies = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $hobbies[] = $row;
    }
}

$is_loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<?php include 'header.php'; ?>

<div class="main">

    <?php if ($is_loggedin): ?>
        <div class="admin-actions">
            <a href="create.php">Crear Hobby</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php else: ?>
        <div class="admin-actions">
            <a href="login.php">Iniciar Sesión</a>
        </div>
    <?php endif; ?>

    <div class="hobbies-grid">
        <?php if (!empty($hobbies)): ?>
            <?php foreach ($hobbies as $hobby): ?>
                <div class="hobby-card">
                    <img src="<?php echo htmlspecialchars($hobby['fotografia']); ?>" alt="<?php echo htmlspecialchars($hobby['nombres']); ?>">
                    <h3><?php echo htmlspecialchars($hobby['nombres']); ?></h3>
                    <?php if ($is_loggedin): ?>
                        <div class="hobby-actions">
                            <a href="edit.php?id=<?php echo $hobby['id']; ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $hobby['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este hobby?');">Eliminar</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay hobbies para mostrar. ¡Crea uno nuevo!</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
