<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Registro OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <div id='registro'>
                    <h1>REGISTRO</h1>
                    <form action="login.php" method="post">
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>
                        <label for="clave">Clave:</label>
                        <input type="password" id="clave" name="clave" required>
                        <input type="submit" value="Entrar">
                    </form>
                </div>
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';