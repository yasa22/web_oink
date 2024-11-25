<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $titulo; ?></title>
    <link rel="icon" href="<?= RUTA_IMG ?>/logo mini.png">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_INCLUDES?>/css/estilos.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <header>
        <?php 
            require_once isset($cabecera2) ? 'comun/cabecera2.php' : 'comun/cabecera.php';
        ?>
    </header>

    <main>
        <?= $contenido ?>
    </main>

    <footer>
        <?php require_once 'comun/pie.php' ?>
    </footer>
</body>
</html>