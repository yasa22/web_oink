<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $titulo; ?></title>
    <link rel="icon" href="<?= RUTA_IMG ?>/logo mini.png">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_INCLUDES?>/estilos.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <header>
        <?php require_once 'cabecera.php' ?>
    </header>

    <main>
        <?= $contenido ?>
    </main>

    <footer>
        <?php require_once 'pie.php' ?>
    </footer>
</body>
</html>