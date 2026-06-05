<?php
session_start();
require 'config/database.php';

$mensaje = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $check = $pdo->prepare(
        "SELECT id FROM usuarios WHERE email = ?"
    );

    $check->execute([$email]);

    if ($check->fetch()) {

        $error = "Ya existe una cuenta con ese correo";

    } else {

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $pdo->prepare(
            "INSERT INTO usuarios
            (nombre, email, password)
            VALUES (?, ?, ?)"
        );

        if (
            $stmt->execute([
                $nombre,
                $email,
                $passwordHash
            ])
        ) {

            $mensaje = "Usuario registrado correctamente";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Crear Cuenta</h1>

<br>

<form method="POST">

    <input
        type="text"
        name="nombre"
        placeholder="Nombre completo"
        required
    >

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

    <?php if(!empty($mensaje)): ?>
        <p style="color:lightgreen;">
            <?php echo $mensaje; ?>
        </p>
    <?php endif; ?>

    <button type="submit">
        Registrarse
    </button>

</form>

</main>
</body>
</html>
