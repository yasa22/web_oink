<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Login OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='login'>
                    <h1>LOGIN</h1>
                    <form action="login.php" method="post">
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>
                        <label for="clave">Clave:</label>
                        <input type="password" id="clave" name="clave" required>
                        <input type="submit" value="Entrar">
                    </form>
                    <h2>Si aun no tienes cuenta, registrate <a href="registro.php">aquí</a></h2>
                </div>
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';