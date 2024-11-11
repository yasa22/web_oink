<?php
require_once dirname(__DIR__) . '/includes/config.php';

$titulo = 'Galería OINK!';
$contenido = <<<EOS
        <article>
            <section>
                <h1>GALERIA</h1>       
            </section>
        </article>
    EOS;
    require_once RAIZ_APP . '/includes/template.php';