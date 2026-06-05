<?php
session_start();
require 'config/database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare(
        "SELECT * FROM usuarios WHERE email = ?"
    );

    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {

        if (password_verify($password, $usuario['password'])) {

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol'];

            if ($usuario['rol'] === 'admin') {

                header("Location: admin/index.php");
                exit;

            } else {

                header("Location: dashboard.php");
                exit;
            }
        }
    }

    $error = "Correo o contraseña incorrectos";
}
?>

<?php include 'includes/header.php'; ?>

<h1>Iniciar Sesión</h1>

<br>

<form method="POST">

    <input
        type="email"
        name="email"
        placeholder="Correo electrónico"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Contraseña"
        required
    >

    <?php if(!empty($error)): ?>
        <p style="color:red;">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <button type="submit">
        Entrar
    </button>

</form>

</main>
</body>
</html>
