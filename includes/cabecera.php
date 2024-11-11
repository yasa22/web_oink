<div class="cabecera">
    <div id='logoOink'>
        <a href="<?= RUTA_APP . '/index.php' ?>">
            <img src="<?= RUTA_IMG . '/logo rosa.png' ?>" alt="Logo">
        </a>
    </div>
    <nav class='indice'>
        <ul>
            <!--<button onclick="location.href='<?= RUTA_APP . '/index.php' ?>'">Principal</button>-->
            <button onclick="location.href='<?= RUTA_PAGINAS . '/nosotros.php' ?>'">Nosotros</button>
            <button onclick="location.href='<?= RUTA_PAGINAS . '/tienda.php' ?>'">Tienda</button>
            <button onclick="location.href='<?= RUTA_PAGINAS . '/galeria.php' ?>'">Galeria</button>
            <button onclick="location.href='<?= RUTA_PAGINAS . '/contacto.php' ?>'">Contacto</button>
        </ul>
    </nav>
    <div id='redes'>
        <a href="https://www.instagram.com/oinkporkwear/" target="_blank">
            <img src="<?= RUTA_IMG . '/instaLogo.png' ?>" alt="Instagram">
        </a>
        <p></p>
        <a href="<?= RUTA_PAGINAS . '/login.php' ?>">
            <img src="<?= RUTA_IMG . '/loginLogo.png' ?>" alt="Login">
        </a>
    </div>
</div>