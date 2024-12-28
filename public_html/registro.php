<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once RAIZ_APP . '/includes/Usuario.php';

$titulo = 'Registro OINK!';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validación CSRF
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token inválido.");
    }

    // Validación y sanitización de entradas
    $usuario = htmlspecialchars(trim($_POST['usuario']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $clave = trim($_POST['clave']);

    if (!$email) {
        $mensaje = "<h3>El correo electrónico no es válido.</h3>";
    } elseif (Usuario::buscaUsuario($usuario)) {
        // Usuario ya existe
        $mensaje = "<h2>El usuario ya está registrado. Por favor, elija otro nombre de usuario.</h2>";
    } else {
        // Registro del usuario con contraseña hasheada
        $hashedPassword = password_hash($clave, PASSWORD_DEFAULT);
        Usuario::insertaUsuario($usuario, $email, $hashedPassword);
        $mensaje = "<h3>Registro completado con éxito.</h3>";

        // Se cambia la redirección por un mensaje o por un flag de éxito.
        $mensaje .= "<p><a href='" . RUTA_APP . "/public_html/login.php'>LOGIN</a></p>";
    }
}

// Generación de token CSRF
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;

// Aquí se renderiza el contenido del formulario con el mensaje
$contenido = <<<EOS
    <article>
        <section>
            <div id='login'>
                <h1>REGISTRO</h1>
                <div id="mensaje">$mensaje</div>
                <form action="" method="post">
                    <input type="hidden" name="csrf_token" value="$csrf_token">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="clave">Clave:</label>
                    <input type="password" id="clave" name="clave" required>
                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </section>
    </article>
EOS;

// Se incluye el template, que es responsable de renderizar el contenido
require_once RAIZ_APP . '/includes/template.php';
?>
